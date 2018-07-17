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
    <h4 style="text-align:left;font-weight:bold">Details of Car Models Inventory </h2> 
	<h5 id="response"></h5> <br>
<div class="row">
	<div class="col-md-10">
	<table width="100%" border="1">
	<thead>
		<tr>
	<th>Serial Number</th>
	<th>Manufacturer Name</th>
	<th>Model Name</th>
	<th>Count</th>
	<th>View</th>
	</tr>
	</thead>

<?php	
	$sql="select name, tbl_manufacturer_id, count(id) as totalcount from tbl_model group by tbl_manufacturer_id, name";
		//$sql="select * from tbl_model";
		$result = $conn->query($sql);
		$i=0;
		while($view = $result->fetch_assoc()) {
		$i++;
		$findsql="SELECT * FROM `tbl_manfacturer` where id='".$view['tbl_manufacturer_id']."' ";
		$findresult = $conn->query($findsql);
		$manufacture = $findresult->fetch_assoc();
		$manufactureName=$manufacture['name'];
		?>
		
	<tr>
	<td><?php echo $i;?></div></td>
	<td><?php echo $manufactureName;?></td>
	<td><?php echo $view['name'];?></td>
	<td><?php echo $view['totalcount'];?></td>
	<td><a href="#"type="button" class="btn" data-toggle="modal" data-target="#myModal<?php echo $view['name'];?>">View Details</a>
	
<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $view['name'];?>" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Car Model Details</h4>
        </div>
        <div class="modal-body">
		<table width="100%" border="1">
		<tr>
		<th>#</th>
		<th>Name</th>
			<th>Manufacturer Name</th>
			<th>Registration No</th>
			<th>Colour</th>
			<th>Note</th>
			<th>Sold</th>
			<th>Click Here for sold</th>
			</tr>
		<?php		
		$sqldata="select * from tbl_model where tbl_manufacturer_id='".$view['tbl_manufacturer_id']."' AND name='".$view['name']."' ";
		$resultdata = $conn->query($sqldata);
		$j=0;
		while($viewdata = $resultdata->fetch_assoc()) {
		$j++;
		
		$findsql="SELECT * FROM `tbl_manfacturer` where id='".$viewdata['tbl_manufacturer_id']."' ";
		$findresult = $conn->query($findsql);
		$manufacture = $findresult->fetch_assoc();
		$manufactureName=$manufacture['name'];
		?>
			<tr><td><?php echo $j;?></td>
			<td><?php echo $view['name'];?></td>
			<td><?php echo $manufactureName;?></td>
			<td><?php echo $viewdata['registration_number'];?></td>
			<td><?php echo $viewdata['color'];?></td>
			<td><?php echo $viewdata['note'];?></td>
			<td><?php echo $viewdata['sold'];?></td>
			
			<form id="formid">
			<?php if ($viewdata['sold']=="no"){?>
			<td><input type="hidden" name="modelid" value="<?php echo $viewdata['id'];?>"><button type="submit" name="submit" class="">Click Here for Sold</button></td>
			<?php }?>
			</form>
			</tr>
		
		<?php }?>
		</table>
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
      </div>
      
    </div>
  </div>
	</tr>	
			<?php }?>
			</table>
		
	</div>
</div>
  </div>
</div>

<?php include 'footer.php';?>
<script>
$(document).ready(function(){
$('#formid').submit(function(){
	$.ajax({
		type: 'POST',
		url: 'ajaxsold.php',
		data: $(this).serialize()
	})
		.done(function(data){
			location.reload();
		// $("#divid").load(" #divid");
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

