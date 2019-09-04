function getXMLHTTP() {
    var xmlhttp = false;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}
function getAjContent(strURL, divtarget) {
    var divs = divtarget.split("-");
    var req = getXMLHTTP();
    console.log(req);
    if (divs.length > 1) {
        for (var j = 0; j < divs.length; j++) {
            document.getElementById(divs[j]).innerHTML = '<img src="images/ajax-loader.gif" width="16px" height="16px">';
        }
    } else {
        if (divtarget != 'noRet') {
            document.getElementById(divtarget).innerHTML = '<img src="images/ajax-loader.gif" width="16px" height="16px">';
        }
    }
    if (req) {
        req.onreadystatechange = function () {

            if (req.readyState == 4) {
                if (req.status == 200) {
                    if (divs.length > 1) {
                        var texto = req.responseText.split("|");
                        for (var i = 0; i < divs.length; i++) {
                            document.getElementById(divs[i]).innerHTML = texto[i];
                        }
                    } else {
                        if (divtarget != 'noRet') {
                            document.getElementById(divtarget).innerHTML = req.responseText;
                        }
                    }
                } else {
                    alert("XMLHTTP ERR:\n" + req.statusText);
                }
            }
        }
        req.open("GET", strURL, true);
        req.send(null);
    }
}
