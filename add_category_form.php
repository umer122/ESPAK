<?php
include 'navbar.html';
?>
<!DOCTYPE html>
<head>
	<style>
		 label{
            font-size: 18px;
            color: black;
            font-weight: 500;
        }
		.main-div{
            background-color: white;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
            margin-top: 10px;
            padding: 40px 60px;
           padding-bottom: 20px;
            margin-bottom: 80px;
            min-height: 100px;
            width: 30%;
            background: #00c16e
        }
        input{
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid #56ab2f ;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
			border-radius: 10px;
        }
		.logo{
            text-align: center;
        }
		.button{
            background-color: #ffff;
            width: 50%;
            margin-top: 20px;
            border: none;
			cursor: pointer;
            border-radius: 10px;
            color: #00c16e;
            font-size: 18px;
            text-transform: capitalize;
            font-weight: 600;
        }
	</style>
</head>
<html>
  <body>
  <div class="logo">
<img src="./images/espaklogo.png " >   
</div> 
	<div class="main-div">
	<form method="post" action="add_category_php.php">
		<label> Category:</label>
		<input type="text" name="category">
	
		<input class="button" type="submit" name="save" value="submit">
	</form>
	</div>
  </body>
</html>