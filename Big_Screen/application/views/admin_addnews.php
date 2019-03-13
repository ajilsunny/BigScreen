<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('admin_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/adminhome.jpg');?>);height:800px;width:auto;">


<?php

if(!$dis)
{
?>
	<div class="row col-xs-3 " style="width:100%;margin-top: 4%">
	<center>
	<h1  style="color: aliceblue;font-family: 'abril-fatface';font-size: 300%">Add New Film News</h1><br>
	<form action="<?php echo site_url('acontroller/newsupload');?>" method="post" enctype="multipart/form-data">
	<table><tr>
		<td align="center" style="width: 50%"><label class="lable1">Title: </label></td><td  style="width: 50%"><input type="text" class="text1" name="heading" placeholder="Enter File Name" required><br></td></tr>
		<tr>
		<td align="center" style="width: 50%"><label class="lable1">Image: </label></td><td style="width: 50%padding:0.5% 1%;"><input type="file" name="newsimage" class="file1"  style="display: inline-block;" accept=".png, .jpg, .jpeg,.JPG" required><br></td></tr>
		<tr>
		<td align="center" style="width: 50%"><label class="lable1" >Description: </label></td><td  style="width: 50%"><textarea class="textarea1" rows="5%" name="newsdescription" placeholder="Enter Description" required></textarea></td></tr>
		<tr>
			<td></td><td align="center"><input  type="submit" value="Add" class="submit1" ></td>
		</tr>
		<tr><td></td><td align="center" ><font color="#FF0004">
		<?php
			$msg=$this->session->flashdata('msg');
			echo($msg);
		?></font></td></tr>
	</table>
	</form>
	</center>
	</div>

<?php
}
else
{
	foreach($dis as $row)
		{
		$id=$row->nid;
		$heading=$row->heading;
		$description=$row->description;
		$photo=$row->photo;
?>
<div class="row col-xs-3 " style="width:100%;margin-top: 4%">
	<center>
	<h1  style="color: aliceblue;font-family: 'abril-fatface';font-size: 300%">Update Film News</h1><br>
	<form action="<?php echo site_url('acontroller/newsupdate');?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="head" value="<?php echo($heading); ?>">
	<table><tr>
		<td align="center" style="width: 50%"><label class="lable1">Title: </label></td><td  style="width: 50%"><input type="text" class="text1" name="heading" value="<?php echo($heading); ?>" ><br></td></tr>
		<tr>
		<td align="center" style="width: 50%"><label class="lable1">Image: </label></td><td style="width: 50%padding:0.5% 1%;"><input type="file" name="newsimage" class="file1"  style="display: inline-block;" accept=".png, .jpg, .jpeg,.JPG" height="388px" width="230px"><br></td></tr>
		<tr>
		<td align="center" style="width: 50%"><label class="lable1" >Description: </label></td><td  style="width: 50%"><textarea class="textarea1" rows="5%" name="newsdescription" required><?php echo($description);?></textarea></td></tr>
		<tr>
			<input type="hidden" name="nid" value="<?php echo($id); ?>">
			<td></td><td align="center"><input  type="submit" value="Update" class="submit1" ></td>
		</tr>
		<tr><td></td><td align="center" ><font color="#FF0004">
		<?php
			$msg=$this->session->flashdata('msg');
			echo($msg);
		?></font></td></tr>
	</table>
	</form>
	</center>
	</div>

<?php
		}
}
 ?>



</div>


<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
