function addFirst(a) {
  a[0] = a[0] + 5;
}
var myArray = [10, 20, 30];
addFirst(myArray);
console.log("myArray is changed to " + myArray);