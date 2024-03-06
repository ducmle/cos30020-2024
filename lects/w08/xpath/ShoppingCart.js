var xHRObject = false;

if (window.ActiveXObject) {
  xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}
else if (window.XMLHttpRequest) {
  xHRObject = new XMLHttpRequest();
}

function getBody(action) {
  var argument = "book=";
  argument += encodeURI(document.getElementById("book").innerHTML);
  argument += "&ISBN=";
  argument += encodeURI(document.getElementById("ISBN").innerHTML);
  argument += "&authors=";
  argument += encodeURI(document.getElementById("authors").innerHTML);
  argument += "&price=";
  argument += encodeURI(document.getElementById("price").innerHTML);
  argument += "&action=";
  argument += encodeURI(action);
  return argument;
}


function getData() {
  if ((xHRObject.readyState == 4) && (xHRObject.status == 200)) {
    if (window.ActiveXObject) {
      //Load XML
      var xml = xHRObject.responseXML;

      //Load XSL
      var xsl = new ActiveXObject("Microsoft.XMLDOM");
      xsl.async = false;
      xsl.load("Cart.xsl");

      //Transform
      var transform = xml.transformNode(xsl);
      var spanb = document.getElementById("cart");
      spanb.innerHTML = transform;
    }
    else {

      var xsltProcessor = new XSLTProcessor();

      //Load XSL
      xslStylesheet = document.implementation.createDocument("", "doc", null);
      xslStylesheet.async = false;
      xslStylesheet.load("Cart.xsl");
      xsltProcessor.importStylesheet(xslStylesheet);

      //Load XML
      xmlDoc = xHRObject.responseXML;

      //Transform
      var fragment = xsltProcessor.transformToFragment(xmlDoc, document);
      document.getElementById("cart").innerHTML = new XMLSerializer().serializeToString(fragment);
    }
  }
}

function AddRemoveItem(action) {
  var book = document.getElementById("book").innerHTML;
  var bodyofform = getBody(action);
  xHRObject.open("POST", "cartdisplay.php", true);
  xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xHRObject.onreadystatechange = getData;
  xHRObject.send(bodyofform);
}



