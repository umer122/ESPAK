<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Multiple Inline Insert into Mysql using Ajax JQuery in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">Multiple Inline Insert into Mysql using Ajax JQuery in PHP</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="13%">Item Name</th>
      <th width="13%">Item Category</th>
      <th width="13%">Quantity</th>
      <th width="13%">Buying Price</th>
      <th width="13%">Selling Price</th>
      <th width="13%">Supplier</th>
      <th width="13%">Minimum Quantity</th>
     </tr>
     <tr>
      <td contenteditable="true" class="product_title"></td>
      <td contenteditable="true" class="product_category"></td>
      <td contenteditable="true" class="product_quantity"></td>
      <td contenteditable="true" class="buying_price"></td>
      <td contenteditable="true" class="selling_price"></td>
      <td contenteditable="true" class="supplier"></td>
      <td contenteditable="true" class="minimum_quantity"></td>

      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var count = 1;
 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";
   html_code += "<td contenteditable='true' class='product_title'></td>";
   html_code += "<td contenteditable='true' class='product_category'></td>";
   html_code += "<td contenteditable='true' class='product_quantity'></td>";
   html_code += "<td contenteditable='true' class='buying_price' ></td>";
   html_code += "<td contenteditable='true' class='selling_price' ></td>";
   html_code += "<td contenteditable='true' class='supplier' ></td>";
   html_code += "<td contenteditable='true' class='minimum_quantity' ></td>";

   html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
   html_code += "</tr>";  
   $('#crud_table').append(html_code);
 });
 
 $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
 
 $('#save').click(function(){
  var product_title = [];
  var product_category = [];
  var product_quantity = [];
  var buying_price = [];
  var selling_price = [];
  var supplier = [];
  var minimum_quantity = [];

  $('.product_title').each(function(){
    product_title.push($(this).text());
  });
  $('.product_category').each(function(){
    product_category.push($(this).text());
  });
  $('.product_quantity').each(function(){
    product_quantity.push($(this).text());
  });
  $('.buying_price').each(function(){
    buying_price.push($(this).text());
  });
  $('.selling_price').each(function(){
    selling_price.push($(this).text());
  });
  $('.supplier').each(function(){
    supplier.push($(this).text());
  });
  $('.minimum_quantity').each(function(){
    minimum_quantity.push($(this).text());
  });
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:{product_title:product_title, product_category:product_category, product_quantity:product_quantity, buying_price:buying_price, selling_price:selling_price, supplier:supplier, minimum_quantity:minimum_quantity},
   success:function(data){
    alert(data);
    $("td[contentEditable='true']").text("");
    for(var i=2; i<= count; i++)
    {
     $('tr#'+i+'').remove();
    }
    fetch_item_data();
   }
  });
 });
 
 function fetch_item_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#inserted_item_data').html(data);
   }
  })
 }
 fetch_item_data();
 
});
</script>

