<?php
    include 'navbar.html';

?>
<!DOCTYPE html>
<html>
<style>
        .main-div{
            background-color: white;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
            margin-top: 10px;
            padding: 40px 60px;
           padding-bottom: 20px;
            margin-bottom: 80px;
            min-height: 500px;
            width: 60%;
            background: #00c16e;
        }
        input,select{
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid #56ab2f ;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
        }
        .w3-container{
            background-color: #00c16e;
            box-shadow: 0px 0px 6px 1px rgb(88 80 80);
            margin-bottom: 40px;
            text-align: center;
            border-radius: 10px;
            color: white;
        }
        label{
            font-size: 16px;
            color: black;
            font-weight: 500;
        }
        .button{
            background-color: #ffff;
            width: 180px;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            color: #00c16e;
            font-size: 18px;
            text-transform: capitalize;
            font-weight: 600;
        }
        .logo{
            text-align: center;
        }
    </style>
  <body>
  <div class="logo">
<img src="./images/espaklogo.png " >   
</div> 
<div class="main-div">
	<form method="post" action="add_admin_php.php">
		First name:<br>
		<input type="text" name="first_name">
		<br>
		Password:<br>
		<input type="password" name="password">
		<br>
		Email Id:<br>
		<input type="email" name="email">
		<br>Phone Number:<br>
		<input type="text" name="phone">
		<br>
        Address:<br>
		<input type="text" name="address">
		<br>
        Date Of Birth:<br>
		<input type="date" name="dob">
		<br>
		<input class="button" type="submit" name="save" value="submit">
	</form>
	</div>
  </body>
</html>