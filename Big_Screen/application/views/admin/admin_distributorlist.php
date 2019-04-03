<?php

$CI =& get_instance();
 $a= $CI->sessionin(0) ;
if($a==1)
{
	include('admin_header.php');
?>



<div style="background-image:url(<?php echo base_url('images/adminhome.jpg');?>);height:800px;width:auto;">
<br><br>
<?php
		if(!$distributor)
		{
			echo '<center><h1 style="font-family:Times New Roman, Times, serif;font-size:36px;color:#FF0000" >No Distributors...!!</h1></center>';
		}
		else
		{
		?>
    <div align="right" style="padding-right:12%;padding-bottom:1%">
    <form action="<?php echo site_url('acontroller/searchdistributorlist')?>" method="post">
      <input  type="text" placeholder="Search Name" name="search" id="search" onkeyup="this.value = this.value.toUpperCase();">
      <input  type="submit" style="background: #FF8D1B;border:none;color:white;padding:4px 10px" value="Search">
    </form>
    </div>
<div align="center" style="margin-top:;font-size:18px;color:#000000;width:100%;height:auto;">
		<table border="5" class="table-condensed col-xs-10" style="background-color:#66FFFF;margin-left:5%;margin-right:3%;opacity:0.7;border:5px #FF6600 solid">
		<tr >
		<th align="center">Name</th><th>Email</th><th>Phone</th><th>State</th><th>District</th><th>Place</th><th>Certificate</th><th>Action</th>
		</tr>
		<?php
		foreach($distributor as $row)
		{
      $name=$row->name;
  		$email=$row->email;
  		$phone=$row->phone;
      $state=$row->sname;
      $district=$row->dname;
  		$place=$row->place;
  		$certificate=$row->cpic;
  		$status=$row->lstatus;
		?>
		<form action="<?php echo site_url('acontroller/blockdistributoraction')?>" method="post" name="userlist">
  		<tr>
  		<input type="hidden" value="<?php echo $email ?>" id="blockid" name="blockid">
  		<input type="hidden" value="<?php echo $status ?>" id="blockstatus" name="blockstatus">
      <td><?php echo $name;?></td>
      <td width="15%"><?php echo $email;?></td>
      <td><?php echo $phone;?></td>
      <td><?php echo $state;?></td>
      <td><?php echo $district;?></td>
      <td><?php echo $place;?></td>
      <td align=center><img id="myImg" src="<?php echo base_url('images/certificate/').$certificate;?>" height="70px" width="120px" >
      </td>
      <td>
  		<?php
  		if($status==2)
  		{
  		echo '<input type="submit" value="Unblock" style="background-color:#00FF00">';
  		}
  		else
  		{
  		echo '<input type="submit" value="Block" style="background-color:#00FF00">';
  		}
  		?>
  		</td>
  		</tr>
    </form>
		 <?php
		}
		?>
		</table>
		</div>
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
