<?php
	 //include 'ManufactureClass.php';
	 include 'config.php';
	 echo $modelid=$_POST['modelid'];
exit;
		$sql="update `tbl_model` set sold='yes' where id='".$modelid."' ";
		$result = $conn->query($sql);
			echo 'Model has been sold';

  ?>
