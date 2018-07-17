<?php
	 //include 'ManufactureClass.php';
	 include 'config.php';
	 $name=$_POST['name'];
	 $tbl_manufacturer_id=$_POST['tbl_manufacturer_id'];
	 $color	=$_POST['color'];
	 $registration_number=$_POST['registration_number'];
	 $note=$_POST['note'];

			$sql="insert into `tbl_model`(tbl_manufacturer_id,name,color,registration_number,note) values('".$tbl_manufacturer_id."','".$name."','".$color."','".$registration_number."','".$note."') ";
			$result = $conn->query($sql);
			echo  'Model Added Successfully';
		
		  ?>
