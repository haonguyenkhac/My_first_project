$( function() {
  $(".table").sortable({handle: '.move'});});


$(document).ready(function(){
  var item = document.querySelector(".item"),
      form = document.querySelector("form");
  form.addEventListener("submit",function(){
      if (item.value =="") {
         alert("You must write something!");
       }
       else{
      $("ul").prepend(
        $('<li>'
            +'<span class="move"></span>'
            +'<input type="checkbox" class="checkbox">'
            +'<label id="myP" contenteditable="false">'+item.value+'</label>'
            +'<button class="delete">Delete</button>'
            +'<button class="ok">Unedit</button>'
            +'<button class="edit">Edit</button>'
            +'</li>'));
        $(".delete").click(function(){ var t=this.parentElement;
      var h=t.parentNode;
      h.removeChild(t); store();
      });
        store();
        item.value=""; 
      }});

  $(".add").click(function(){
    if (item.value =="") {
      alert("You must write something!");}
    else{
      $("ul").prepend(
        $('<li>'
            +'<span class="move"></span>'
            +'<input type="checkbox" class="checkbox">'
            +'<label id="myP" contenteditable="false">'+item.value+'</label>'
            +'<button class="delete">Delete</button>'
            +'<button class="ok">Unedit</button>'
            +'<button class="edit">Edit</button>'
            +'</li>'));
      $(".delete").click(function(){ 
        var t=this.parentElement;
        var h=t.parentNode;
        h.removeChild(t); store();});
      store();
      item.value=""; 
      }});
      $(".remove").click(function(){
      $("ul").empty(); remove();});
      $(".delete").click(function(){ 
       var t=this.parentElement;
       var h=t.parentNode;
       h.removeChild(t); store();
       }); 
     });

$(document).on("click", '.edit', function () {
    $(this).closest("li").find("label").prop("contenteditable", true).focus();
    return false;
  });
$(document).on("click", '.ok', function () {
    $(this).closest("li").find("label").prop("contenteditable", false).focus();
    store();
    return false;
  });
    
function store() {
  var table=document.querySelector(".table");
  localStorage.myitems = table.innerHTML;}

function remove(){
  if (confirm("Are you sure to remove all task of List???" )){
    table=document.querySelector(".table");
    localStorage.removeItem("myitems");}}

function getValues() {
  var table=document.querySelector(".table");
  var storedValues = localStorage.myitems;
  if (!storedValues) {
    "<li>Make a to do list</li>";} 
  else {
    table.innerHTML = storedValues;
  }
}
getValues();
