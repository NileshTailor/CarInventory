<?php include 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php';?>
</head>
<body>
	<?php include 'menu.php';?>

<div class="jumbotron">
  <div class="container text-center">
    <h4 style="text-align:left;font-weight:bold">Add Car Model</h2> <br>
		<h5 id="response"></h5> <br>

	<form id="formid">
	
<div class="row">
	<div class="col-md-12">	
		<div class="col-md-3">Model Name</div>
		<div class="col-md-2"><input type="text" required name="name" placeholder=""></div>
		<div class="col-md-3">Manufacturer Name</div>
		<div class="col-md-4">
		<select name="tbl_manufacturer_id" required style="width:200px;">
		<?php
		$sql="SELECT * FROM `tbl_manfacturer` ";
		$result = $conn->query($sql);
		while($manufacture = $result->fetch_assoc()) { ?>
		  <option value="<?php echo $manufacture['id'];?>"><?php echo $manufacture['name'];?></option>	
			<?php }?>
		</select>			
		</div>
	</div>
</div><br>

<div class="row">
	<div class="col-md-12">	
		<div class="col-md-3">Registration Number</div>
		<div class="col-md-2"><input required type="text" name="registration_number" placeholder=""></div>
	</div>
</div><br>


<div class="row">
	<div class="col-md-12">	
		<div class="col-md-3">Colour</div>
		<div class="col-md-2"><input required type="text" name="color" placeholder=""></div>
	</div>
</div><br>

<div class="row">
	<div class="col-md-12">	
		<div class="col-md-3">Note</div>
		<div class="col-md-2"><textarea required type="text" name="note" placeholder=""></textarea></div>
	</div>
	</div><br>
	
<div class="row">
	<div class="col-md-12">	
		<div class="col-md-3"></div>
		<div class="col-md-2"><button type="submit" name="submit">Submit</div>
	</div>
	</div><br>
	

	</form>	
  </div>
</div>
	<?php include 'footer.php';?>
	<script>
$(document).ready(function(){
$('#formid').submit(function(){
$('#').html("<b>Loading response...</b>");
	$.ajax({
		type: 'POST',
		url: 'ModelHandler.php',
		data: $(this).serialize()
	})
		.done(function(data){
		$('#response').html(data);
	})
		.fail(function() {
		alert( "Posting failed." );
	});
	return false;
});
});
</script>
</body>
</html>

