window.addEventListener(
    'load',
    function () {
        var registerfader = generateFader(document.getElementById("login_form"));
        var loginfader = generateFader(document.getElementById("reg_form"));

        document.getElementById('registerfade').addEventListener(
            'click',
            function () {
                registerfader(200);
                loginfader(200);
            }
        );

        document.getElementById('loginfade').addEventListener(
            'click',
            function () {
                loginfader(200);
                registerfader(200);
            }
        );
    }
);



function generateFader(elem) {
    var t = null, goal, current = 0, inProgress = 0;
    if (!elem || elem.nodeType !== 1) throw new TypeError('Expecting input of Element');
    function visible(e) {
        var s = window.getComputedStyle(e);
        return +!(s.display === 'none' || s.opacity === '0');
    }
    function fader(duration) {
        var step, aStep, fn, thisID = ++current, vis = visible(elem);
        window.clearTimeout(t);
        if (inProgress) goal = 1 - goal; // reverse direction if there is one running
        else goal = 1 - vis;             // else decide direction
        if (goal) {                      // make sure visibility settings correct if hidden
            if (!vis) elem.style.opacity = '0';
            elem.style.display = 'block';
        }
        step = goal - +window.getComputedStyle(elem).opacity;
        step = 20 * step / duration;     // calculate how much to change by every 20ms
        if (step >= 0) {                 // prevent rounding issues
            if (step < 0.0001) step = 0.0001;
        } else if (step > -0.0001) step = -0.0001;
        aStep = Math.abs(step);          // cache
        fn = function () {
            // console.log(step, goal, thisID, current); // debug here
            var o = +window.getComputedStyle(elem).opacity;
            if (thisID !== current) return;
            if (Math.abs(goal - o) < aStep) {            // finished
                elem.style.opacity = goal;
                if (!goal) elem.style.display = 'none';
                inProgress = 0;
                return;
            }
            elem.style.opacity = (o + step).toFixed(5);
            t = window.setTimeout(fn, 20);
        }
        inProgress = 1; // mark started
        fn();           // start
    }
    return fader;
}