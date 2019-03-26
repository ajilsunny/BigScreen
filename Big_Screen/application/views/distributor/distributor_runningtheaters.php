<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('distributor_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:800px;width:auto;padding-top:5%">

  <?php
  if(!$dis)
  {
    echo '<center><h1 style="font-family:Times New Roman, Times, serif;font-size:36px;color:#FF0000" >No Film Selected...!!</h1></center>';
  }
  else {

  ?>
  <div class="col-xs-1"></div>
  <div class="col-xs-10" align=center height=auto width=70% style="background:#FF6600;">
  <table class="table table-striped tblstyle" style="color:#fff">
  <thead>
    <tr>
      <th style="color:#212121" scope="col">No</th>
      <th style="color:#212121" scope="col">Film</th>
      <th style="color:#212121" scope="col">THEATRE</th>
      <th style="color:#212121" scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach($dis as $row)
    {
      $mid=$row->mid;
      $lid=$row->lid;
      $fname=$row->film_name;
      $name=$row->name;
      $date=$row->date;
      $status=$row->status;
      $fid=$row->fs_id;
      ?>
  <form action="<?php echo site_url('usercontroller/filmapprove') ?>" method="post">
    <tr>
      <th style="color:#212121" scope="row"><?php echo $no; ?></th>
      <td style="color:#212121"><?php echo $fname; ?></td>
      <td style="color:#212121"><?php echo $name; ?></td>
      <td style="color:#212121"><?php echo $date; ?></td>
      <td style="color:#212121">
        <?php
        if($status==1)
        {
         ?>
        <input type="submit" value="Unpayed" class="btn-primary" style="background:#ff0000;border:hidden;color:black;border-radius: 5px;padding:2px 25px">
        <?php }
        elseif($status==2)
        {?>
          <input type="submit" value="payed" class="btn-primary" style="background:#00b300;border:hidden;color:black;border-radius: 5px;padding:2px 33px">
        <?php } ?>
      </td>
      <input type="hidden" id="status" name="status" value="<?php echo $status; ?>">
      <input type="hidden" id="fid" name="fid" value="<?php echo $fid; ?>">
    </tr>
  </form>
  <?php
   $no++;
  }
    ?>
  </tbody>
  </table>
  </div>
  <?php } ?>


</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
