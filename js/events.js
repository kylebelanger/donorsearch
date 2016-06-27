/*  processFile
 *  Initial processing of file for data validation
 *
 *  @param el - event object
*/
function processFile(el) {
    // get file value
    var value = el.value,
        split = el.value.split(".");

    // if file appears to be valid
    if (value !== "" && split[split.length - 1] === "txt") {
        // disable input field
        el.disabled = true;
        // display processing message
        document.getElementById("processing").innerHTML = "[ processing... ]";
    }
    else {
        // return error message
        document.getElementById("processing").innerHTML = "Invalid file type. Please select a <code>.txt</code> file.";
        // clear file from input
        el.value = "";
    }
}
