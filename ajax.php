<script>

var getHttpRequest = function () {
  var httpRequest = false;

  if (window.XMLHttpRequest) { // Mozilla, Safari,...
    httpRequest = new XMLHttpRequest();
    if (httpRequest.overrideMimeType) {
      httpRequest.overrideMimeType('text/xml');
    }
  }
  else if (window.ActiveXObject) { // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (!httpRequest) {
    alert('Erreur : Impossible de générer une instance XMLHTTP');
    return false;
  }

  return httpRequest
} 

xmlHttpRequest = getHttpRequest()
<?php

if ($_GET['p'] == 'graphique')
{
?>
xmlHttpRequest.open("GET", "chart.js")
}
</script>