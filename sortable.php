<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<script src="jquery-3.3.1.min.js"></script>
  <script src="jquery-ui/jquery-ui.js"></script>
  <script type="text/javascript">
    $( function() {
    $(".table").sortable();
    $(".table").disableSelection();
    });
  </script>
  <style type="text/css">
  body {
  background: #eee;
  color: #444;
  font-family: 'Helvetica', arial, sans-serif;
}

.container {
  background: #fff;
  max-width: 600px;
  width: 100%;
  display: table;
  margin: 0 auto;
  margin-top: 40px;
  border: 1px solid #cfcbcc;
}

input {
  border: none;
  display: block;
  width: 98.4%;
  line-height: 1.5;
  padding: 8px 0 8px 10px;
  border-bottom: 1px solid #cfcbcc;
  outline: 0;
}
button {
  background: none;
  border: 0px;
  color: #888;
  font-size: 15px;
  width: 60px;
  margin: 10px 0 0;
  font-family: Lato, sans-serif;
  cursor: pointer;
}
button:hover {
  color: #333;
}
li > .delete:hover {
  color: #CF2323;
}

h1, h2 {
  text-align: center;
  margin-bottom: 0px;
  line-height: 1;
}

h2 {
  color: gray;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
ul li {
  
  font-weight: 400;
  border-bottom: 1px solid #cfcbcc;
  line-height: 1.5;
  padding: 8px 0;
}
ul li label:before {
  content: "\25A1";
  padding: 10px 10px;
  font-size: 20px;
}
ul li label:hover {
  text-decoration: line-through;
  cursor: pointer;
}
ul li label:last-child {
  border-bottom: none;
}

.checked {
  color: green;
}
.checked:before {
  content: "\2713";
  padding: 10px 10px;
  font-size: 20px;
}
.checked:hover {
  text-decoration: none;
}
.checked:hover:after {
  
  color: tomato;
  text-align: right;
}
  </style>
</head>
<body><center>
  <div class="container">
    <h1>TO DO LIST</h1>
  <form>

    <input type="text"  name="item" class="item" id="item">
    <input type="button" name="" class="add" value="Add">
    <button class="remove">Remove All</button>
  </form>
  <div class="task-list">
  <ul class="table" >
  </ul>
  </div>
  </div>
  <script type="text/javascript">
    
    $(document).ready(function(){
      var item = document.querySelector(".item");

     $(".add").click(function(){
      if (item.value =="") {
         alert("You must write something!");
      }else{
      $("ul").prepend(
        $('<li>'+'<label id="myP" contenteditable="true">'+item.value+'</label>'
          +'<button class="edit" onclick="editable(this);" >Edit</button>'
          +'<button class="delete">Delete</button>'
          +'</li>'));


        $(".delete").click(function(){ var t=this.parentElement;
      var h=t.parentNode;
      h.removeChild(t); store();
        
      
      });
        $("label").click(function(e){ var li=e.target;
      li.classList.add("checked"); store();
     });
        store();
        item.value=""; 
      }});

     $("label").click(function(e){ var li=e.target;
      li.classList.add("checked"); store();
     });

     $(".remove").click(function(){
      $("ul").empty(); remove();});

     $(".delete").click(function(){ 
      var t=this.parentElement;
      var h=t.parentNode;
      h.removeChild(t); store();
      }); 
    });

    function editable(button) {
      var x =document.getElementById("myP");
      if (x.contentEditable == "true") {
        x.contentEditable = "false";
        button.innerHTML = "OK";
      } else {
        x.contentEditable = "true";
        button.innerHTML = "Edit";
  }
}
    
    function store() {
      var table=document.querySelector(".table");
      localStorage.myitems = table.innerHTML;
  }

    function remove(){
      table=document.querySelector(".table");
      localStorage.removeItem("myitems");}

  function getValues() {
    var table=document.querySelector(".table");
    var storedValues = localStorage.myitems;
    if (!storedValues) {
      "<li>Make a to do list</li>";
      
    } else {
      table.innerHTML = storedValues;
    }
  }
  getValues();
  </script>
</center>
</body>
</html>
