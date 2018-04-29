
function createItem() {
    var shop = document.getElementById("");
    var itemname = "seas";
    var itemimage = "path";
    var cost = 25;
    var bought = false;
    var wearing = false;

    var element = "<div class='shopinhalt_elem'>";

    element += "<span style='margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute'>" + itemname + "</span>";

    //Kaufen Button
    if (!bought) {
        element += "<button style='margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: limegreen; font-size: 2em;' class='MouseHover'> Kaufen </button>";
    } else {
        element += "<button style='margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #2c25aa; font-size: 2em;' class='MouseHover'> Gekauft </button>";
    }

    //Angezogen button
    if (!wearing) {
        element += "<button style='margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;' class='MouseHover'>Anziehen</button>";
    } else {
        element += "<button style='margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #1f20ff; font-size: 2em;' class='MouseHover'>Angezogen</button>";
    }

    //Kosten des Items
    element += "<span style='margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em'>" + cost + " Coins</span>";

    //Item Image<
    element+= "<img src='"+ itemimage +"' style='width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;'/>";

    //Element complete
    element += "</div>";

    return element;
}