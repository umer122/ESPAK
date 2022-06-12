<?php
    include 'navbar.html';
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ESPAK </title>

     <style>
          table,
          th {
               border-collapse: collapse;
               font-family: arial, sans-serif;
          }

          th {
               background: lightblue;
          }

          td,
          th {
               border: 1px solid black;
               padding: 10px;
               font-size: 14px;
          }

          tr:nth-child(even) {
               background-color: #dddddd;
          }

          button a {
               color: white;
               text-decoration: none;
          }

          button a:hover {
               text-decoration: none;
               color: white;
          }

          a {
               text-decoration: none;
          }

          button {
               background-color: #57b857;
               border: none;
               width: 100px;
               height: 30px;
               border-radius: 7px;
               color: white;
               cursor: pointer;
          }
    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">Search Product By Product Name</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Product Name" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch_search_product.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
