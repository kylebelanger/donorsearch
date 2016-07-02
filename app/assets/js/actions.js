/*  queryAction
 *  Issues a GET request to actions.php script to query the database
 *
 *  @param String - Query Key, corrosponds to query operation in action.php
 *  @param String - Filter string
*/
function queryAction(query_key, filter) {
    // set up array to pass
    var query = [query_key, filter];

    // if query_key is changed, clear table from DOM
    if (query_key == "") {
        document.getElementById("organizations").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("recordCount").innerHTML = countRecords(xmlhttp.responseText);
                document.getElementById("organizations").innerHTML = xmlhttp.responseText;
            }
        };
        // Send the GET request
        xmlhttp.open("GET","../helpers/actions.php?q=" + JSON.stringify(query), true);
        xmlhttp.send();
    }
}

/*  countRecords
 *  Count child elements of string => DOM object to display record count
 *
 *  @param String - String containing HTML table object (i.e. "<table><tr></tr></table>")
*/
function countRecords(string) {
      // set variables
      var table = document.createElement('div'),
          rowCount = 0;

      // hide the table on DOM
      table.hidden = true;
      table.innerHTML = string;

      // count the number of rows
      rowCount = table.children[0].children[0].childElementCount - 1;
      return rowCount;
}

/*  eventListener
 *  Attach an event listener to document on load
 *
*/
document.addEventListener('DOMContentLoaded', function() {
    // Set initial table data
    queryAction("legal_name", null);
});
