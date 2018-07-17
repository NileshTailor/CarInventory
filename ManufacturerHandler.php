<?php
	 //include 'ManufactureClass.php';
	 include 'config.php';
	 $name=$_POST['name'];

		$sql="SELECT * FROM `tbl_manfacturer` where name='".$name."' ";
		$result = $conn->query($sql);
		$manufacture = $result->fetch_assoc();
		if($manufacture)
		{
			echo 'Already Added';
		}
		else
		{
			$sql="insert into `tbl_manfacturer`(name) values('".$name."') ";
			$result = $conn->query($sql);
			echo  'Manufacturer Name Added Successfully';
		}
	  
  ?>
