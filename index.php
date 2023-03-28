<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inc/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <script src="inc/script.js" ></script>
    <title>Document</title>
</head>
<body>
  
  <div class="flex-container">
    <div class="alert" id="warning1">
        <span class="closebtn">&times;</span>  
         Please enter clients first name!
      </div>
      <div class="alert" id="warning2">
        <span class="closebtn">&times;</span>  
         Please enter clients first name!
      </div>
      <div class="alert" id="warning3">
        <span class="closebtn">&times;</span>  
         Please enter clients first name!
      </div>
    </div>
    
    <table class="styled-table">
      <form id="form" form action="customers/create.php"  method="post"><thead><th>Add Client</th></thead>
        <tr><td><input type="text" id="client_id" name="client_id" placeholder="" disabled></td></tr>
        <tr><td><input type="text" id="fname" name="fname" placeholder="Client Firstname" required></td></tr>
        <tr><td><input type="text" id="lname" name="lname"placeholder="Client Lastname" required></td></tr>
        <tr><td><input type="text" id="address" name="address" placeholder="Client Address"></td></tr>
        <tr><td><input type="submit" onclick="storeCustomer()"></td></tr>
      
      </form>
      </table>
<script> fetchDataAll();</script>
<div class="flex-container" id="add_client_form">
  
<table class="styled-table">
<form id="form"><thead><th>Add Client</th></thead>
  <tr><td><input type="text" id="client_id" name="client_id" placeholder="" disabled></td></tr>
  <tr><td><input type="text" id="fname" name="fname" placeholder="Client Firstname" required></td></tr>
  <tr><td><input type="text" id="lname" name="lname"placeholder="Client Lastname" required></td></tr>
  <tr><td><input type="text" id="address" name="address" placeholder="Client Address"></td></tr>
  <tr><td><input type="button" id='submitData' onclick="CreateUser(),validation(event)" value="Submit"></td></tr>

</form>
</table>
<table class="styled-table">
  <form id="form"><thead><th>Update Client</th></thead>
    <tr><td><input type="text" id="client_id_update" name="client_id" placeholder="Client Id" required></td></tr>
    <tr><td><input type="text" id="fname_update" name="fname" placeholder="Client Firstname" required></td></tr>
    <tr><td><input type="text" id="lname_update" name="lname"placeholder="Client Lastname" required></td></tr>
    <tr><td><input type="text" id="address_update" name="address" placeholder="Client Address"></td></tr>
    <tr><td><input type="button" id='submitData' onclick="updateClient()" value="Submit"></td></tr>
  
  </form>
  <table class="styled-table">
    <form id="form" ><thead><th>Find Client</th></thead>
      <tr><td><input type="text" id="client_id_find" name="client_id" placeholder="Client Id"></td></tr>
      <tr><td><input type="text" id="fname" name="fname" placeholder="Client Firstname" disabled></td></tr>
      <tr><td><input type="text" id="lname" name="lname"placeholder="Client Lastname" disabled></td></tr>
      <tr><td><input type="text" id="address" name="address" placeholder="Client Address" disabled></td></tr>
      <tr><td><input type="button" id='submitData' onclick="fetchDataSingle()" value="Search"><input type="button" id='submitData' onclick="fetchDataAll()" value="Show all"></td></tr>
    
    </form>
    <table class="styled-table">
      <form id="form"><thead><th>Delete Client</th></thead>
        <tr><td><input type="text" id="client_id" name="client_id" placeholder="Client Id" required></td></tr>
        <tr><td><input type="text" id="fname" name="fname" placeholder="" disabled></td></tr>
        <tr><td><input type="text" id="lname" name="lname"placeholder="" disabled></td></tr>
        <tr><td><input type="text" id="address" name="address" placeholder=""disabled></td></tr>
        <tr><td><input type="button" id='submitData' onclick="CreateUser(),validation(event)" value="Submit"></td></tr>
      
      </form>
      </table>
</div>
       
    <div class="flex-container">
        
        <div>
        
        <table class="styled-table" id="customers_table">
            
        </table>
        
    </div>
        
      </div> 
      <div class="flex-container">
    </div>
    <script>
        var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}

function validation(e) {
var fname = document.getElementById("fname").value // Typo here ID should be Id.
var lname = document.getElementById("lname").value
var address = document.getElementById("address").value;

if (fname == "") {
  e.preventDefault();
  document.getElementById('fname').style.backgroundColor = "rgba(255,0,0, 1)";
  
}
/*
if (lname == "") {
  e.preventDefault();
  document.getElementById('warning2').style.display = 'block';
}
if (address == "") {
  e.preventDefault();
  document.getElementById('warning3').style.display = 'block';
}
*/
}
    </script>
    
    
</body>
</html>