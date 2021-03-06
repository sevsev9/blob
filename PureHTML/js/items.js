//Usage:
//  * id - document.getElementById("");
//  * itemname - "name of the item"
//  * itemimage - "path of itemimage"
//  * cost - int
//  * bought - boolean
//  * wearing - boolean

function createItem(id, itemname, itemimage, cost, bought, wearing,coins) {

    var element = "<div class='shopinhalt_elem'>";

    element += "<span style='margin-left: 2em; margin-top: 1em; font-size: 2em; position: absolute'>" + itemname + "</span>";

    //Kaufen Button

    if (!bought) {
        element += "<button style='display: block;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #cdc600; font-size: 2em;' class='MouseHover' id='btn_buy-"+ itemname +"' onclick='buy("+ cost +",\""+ itemname +"\"," + coins +")'> Kaufen </button>";
        element += "<button style='display: none;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_bought-"+ itemname +"'>                               Gekauft </button>";
        element += "<button style='display: none;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;' class='MouseHover' id='btn_wear-"+ itemname +"' onclick='wear(\""+itemname + "\",\"" + itemimage +"\")' >   Anziehen</button>";
        element += "<button style='display: none;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_wearing-"+ itemname +"' onclick='clearItem(\""+itemname + "\",\"" + itemimage +"\")'>                    Angezogen</button>";
    } else {
        //Angezogen button
        if (!wearing) {
            element += "<button style='display: none;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #cdc600; font-size: 2em;' class='MouseHover' id='btn_buy-"+ itemname +"' onclick='buy("+ cost +",\""+ itemname +"\"," + coins +")'> Kaufen </button>";
            element += "<button style='display: block;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_bought-"+ itemname +"'>                               Gekauft </button>";
            element += "<button style='display: block;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;' class='MouseHover' id='btn_wear-"+ itemname +"' onclick='wear(\""+itemname + "\",\"" + itemimage +"\")' >   Anziehen</button>";
            element += "<button style='display: none;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_wearing-"+ itemname +"' onclick='clearItem(\""+itemname + "\",\"" + itemimage +"\")'>                     Angezogen</button>";
        } else {
            element += "<button style='display: none;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #cdc600; font-size: 2em;' class='MouseHover' id='btn_buy-"+ itemname +"' onclick='buy("+ cost +",\""+ itemname +"\"," + coins +")'> Kaufen </button>";
            element += "<button style='display: block;margin-left: 1em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_bought-"+ itemname +"'>                               Gekauft </button>";
            element += "<button style='display: none;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: darkorange; font-size: 2em;' class='MouseHover' id='btn_wear-"+ itemname +"' onclick='wear(\""+itemname + "\",\"" + itemimage +"\")' >   Anziehen</button>";
            element += "<button style='display: block;margin-left: 6em; margin-top: 3.7em; position: absolute; height: 2em; background-color: #22aa00; font-size: 2em;' class='MouseHover' id='btn_wearing-"+ itemname +"' onclick='clearItem(\""+itemname + "\",\"" + itemimage +"\")'>                   Angezogen</button>";
        }
    }



    //Kosten des Items
    element += "<span style='margin-left: 14.5em; font-size: 3em; position: absolute; margin-top: 1.6em'>" + cost + " Coins</span>";

    //Item Image<
    element+= "<img src='"+ itemimage +"' style='width: 13.5em; margin-left: 84em; position: absolute; margin-top: 0.3em;'/>";

    //Element complete
    element += "</div>";

    id.innerHTML += element;
}