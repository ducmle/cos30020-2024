var xhr = createRequest();

function getDoc() {
  if (xhr) {
    xhr.open("GET", "classes.txt", true);
    xhr.onreadystatechange = function () {
      if ((xhr.readyState == 4) && (xhr.status == 200)) {
        var jsonResp = xhr.responseText;
        jsonObj = eval("(" + jsonResp + ")"); // jsonResp is now represented by  a Javascript object
        findClass(jsonObj); //the function findClass is on the next slide
      }
    }
    xhr.send(null);
  }
}

function findClass(jsonTxt) {
  for (i = 0; i < jsonTxt.class1.length; i++) {
    var title = jsonTxt.class1[i].title; var req = jsonTxt.class1[i].req;
    var myEl = document.createElement('p');
    var newText = title + " is the name of a course in the Computer Science department.";
    var myTx = document.createTextNode(newText);
    myEl.appendChild(myTx);
    var course = document.getElementById('title');
    course.appendChild(myEl);
    if (req == 'yes') {
      var addlText = " This is a required course.";
      var addlText2 = document.createTextNode(addlText);
      myEl.appendChild(addlText2);
    }
    else {
      var addlText = " This is not a required course.";
      var addlText2 = document.createTextNode(addlText);
      myEl.appendChild(addlText2);
    }
  }
}
