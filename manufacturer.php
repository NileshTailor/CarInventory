
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'header.php';?>
</head>

<body>
	<?php include 'menu.php';?>

<div class="jumbotron">
  <div class="container text-center">
    <h4 style="text-align:left;font-weight:bold">Add Manufacturer </h2> 
	<h5 id="response"></h5> <br>
	<form id='formid'>
<div class="row">
	<div class="col-md-10">	
		<div class="col-md-3">Manufacturer Name</div>
		<div class="col-md-2"><input type="text" required name="name"	 placeholder=""></div>
		<div class="col-md-2"><button type="submit" name="submit">Submit</div>
	</div>
</div>


	</form>	
  </div>
</div>

<?php include 'footer.php';?>
<script>
$(document).ready(function(){
$('#formid').submit(function(){
$('#response').html("<b>Loading response...</b>");
	$.ajax({
		type: 'POST',
		url: 'ManufacturerHandler.php',
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

