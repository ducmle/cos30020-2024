var xhr = createRequest();

function myRequest() {
  if (window.overrideMimeType) { request.overrideMimeType("text/xml"); }
  if (xhr) {
    xhr.open("GET", "array.php", true);
    xhr.onreadystatechange = function () {
      if ((xhr.readyState == 4) && (xhr.status == 200)) {
        var jsonResp = xhr.responseText;
        jsonObj = eval("(" + jsonResp + ")");
        var display1 = document.getElementById('display');
        display1.innerHTML = "Before eval: " + jsonResp + "<br>After eval: " + jsonObj;
      }
    }
    xhr.send(null);
  }
}
