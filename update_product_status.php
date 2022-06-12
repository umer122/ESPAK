<?php
include_once 'config.php';
include 'navbar.html';
if (    mysqli_query($conn,"UPDATE products set status='0' WHERE status='1'  ")
){
    ?>
	<script type="text/javascript">
	window.location.href = 'welcome.php';
	</script>}
    <?php
}
else{
    echo 'Failed';
}

//$message = "Record Modified Successfully";
//header('Location:ban_admin_form.php');



?>