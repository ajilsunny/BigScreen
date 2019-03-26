<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('admin_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/adminhome.jpg');?>); height:800px ;width:auto;">
<div align="center" style="font-size:18px;color:#000000;width:100%;height:100%;"><br><br>

  <?php
  		if(!$list)
  		{
  			echo '<center><h1 style="font-family:Times New Roman, Times, serif;font-size:36px;color:#FF0000" >No News...!!</h1></center>';
  		}
  		else
  		{
  		?>

		<table class="table-condensed divs">
		<tr>
		<th align="center"><font class="tblhead"><center>Title</center></th><th><font class="tblhead"><center>Image</center></center></center></th><th><font class="tblhead"><center>Description</th><th><font class="tblhead"><center>Updated Date</th><th><font class="tblhead"><center>Action</th></h3>
		</tr>
<?php
foreach($list as $row)
		{
		$id=$row->nid;
		$heading=$row->heading;
		$description=$row->description;
		$photo=$row->photo;
		$date=$row->ndate;
		$status=$row->nstatus;
?>
<form action="<?php echo site_url('acontroller/newsviewchange')?>" method="post" name="userlist">
	<input type="hidden" name="id" value="<?php echo $id?>">
	<input type="hidden" name="status" value="<?php echo $id?>">
		<tr>
		<td>
			<div style="width: 100%;color: crimson;'">
				<center><h3><font style="font-family:'cabin-condensed'"><?php echo($heading); ?></font></h3>
			</div>
		</td>
		<td width="10%">
			<div >
				<a><img src="<?php echo base_url('images/news/').$photo;?>" style="height: 100%;width: 100%"></a>
			</div>
		</td>
		<td>
			<div style="margin:3%; color: aliceblue;">
				<p align=center><font style="font-family: allerta;font-size:100%"><?php echo($description); ?></font></p>
			</div>
		</td>
		<td>
			<div align=center>
				<font style="color:gold;opacity: 0.9"><?php echo($date); ?></font>
			</div>
		</td>
		<td align="center">
		<input type="submit" name="edit" value="Edit" style="background-color:#FF6600;color: aliceblue;border: hidden;border-radius: 5px;font-family: 'abril-fatface';">
		<input type="submit" name="remove" value="Remove" style="display: inline-block;background-color:#FF6600;color: aliceblue;border: hidden;border-radius: 5px;font-family: 'abril-fatface';">
		</td>
		</tr></form>

<?php
		}
?>

</table>

<?php }?>
</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
