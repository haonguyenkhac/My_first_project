$( function() {
  $(".table").sortable({handle: '.move'});
});


$(document).ready(function(){
  var item = document.querySelector(".item");
  $(".add").click(function(){
    if (item.value =="") {
      alert("You must write something!");}
    else{
      $("ul").prepend(
        $('<li>'
            +'<span class="move"></span>'
            +'<input type="checkbox" class="checkbox">'
            +'<label id="myP" contenteditable="false">'+item.value+'</label>'
            +'<button class="edit">Edit</button>'
            +'<button class="delete">Delete</button>'
            +'</li>'));

      $('.edit').click(function(){
        editable(this);store();
      });

      $(".delete").click(function(){
        var t=this.parentElement;
        var h=t.parentNode;
        h.removeChild(t); store();});

      store();
      item.value=""; 
      }
});

      $('.edit').click(function(){
        editable(this);
      });
  
      $(".remove").click(function(){
      $("ul").empty(); remove();
      });

      $(".delete").click(function(){
        var t=this.parentElement;
        var h=t.parentNode;
        h.removeChild(t); store();
      });
});

function editable(button) {
  $(button).prev('label').attr('contenteditable','true');
}
    
function store() {
  var table=document.querySelector(".table");
  localStorage.myitems = table.innerHTML;}

function remove(){
  if (confirm("Are you sure to remove all task of List???" )){
    table=document.querySelector(".table");
    localStorage.removeItem("myitems");
  }
}

function getValues() {
  var table=document.querySelector(".table");
  var storedValues = localStorage.myitems;
  if (!storedValues) {
    "<li>Make a to do list</li>";
  } 
  else {
    table.innerHTML = storedValues;
  }
}
getValues();
