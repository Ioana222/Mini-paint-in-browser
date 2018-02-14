/**
 * In acest fisier este o functie de creeaza un call AJAX,
 * primeste ca raspuns un JSON cu sugestii de nume pentru login.
 */
function showHint(str) {
    var xhttp;

    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // daca statusului este OK
            var obj = JSON.parse(this.responseText); // se parseaza JSON trimis de server 
            document.getElementById("txtHint").innerHTML = obj;
        }
    };
    xhttp.open("GET", "hint.php?q=" + str, true); // se trimite catre server o cerere GET
    xhttp.send();
}