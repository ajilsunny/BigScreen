<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:auto;width:auto;">
<?php
  foreach($dis as $row)
  {
    $tname=$row->theatre_name;
    $t_pro_pic=$row->t_pro_pic;
    $t_cov_pic=$row->t_cov_pic;
    $t_email=$row->t_email;
    $t_phone=$row->t_phone;
    $t_district=$row->t_district;
    //$sname=$row->sname;
    $t_place=$row->t_place;
    $t_description=$row->t_description;
    $t_screens=$row->t_screens;

?>

<div class="col-xs-12" style="background: #F8F8F8">
	<div class="col-xs-9 " style="height: auto">
		<div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
      <img src="<?php echo base_url('images/theatreprofile/').$t_cov_pic ?>" style="width:100%">
			<div class="col-xs-12" style="height: 78%">

			</div>

		</div>
    <div align=left class="col-xs-12 tblstyle1">
      <br>
          <?php echo $t_description ?>
    <br><br>
    </div>
	</div>
	<div class="col-md-3" style="height: auto;"><br>
  <center>  <img src="<?php echo base_url('images/theatreprofile/').$t_pro_pic ?>" style="width:60%"><br>
<h1><b><?php echo $tname ?> </b></h1></center><br>
<table class="table tblstyle" style="color:black">
    <tbody>
      <tr>
        <td >Email </td>
        <td >:
          <?php

          echo $t_email;
          ?>
        </td>
      </tr>
      <tr>
        <td>Phone </td>
        <td>:
          <?php
          echo $t_phone;
          ?>
        </td>
      </tr>
      <tr>
        <td>District </td>
        <td>: <?php echo $t_district ?></td>
      </tr>
      <tr>
        <td>Place </td>
        <td>:
          <?php
          echo $t_place;
          ?>
        </td>
      </tr>
      <tr>
        <td>Screen </td>
        <td>:
          <?php
          echo $t_screens;
          ?>
      </td>
      </tr>


      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <form action="<?php echo site_url('usercontroller/filmviewdistributor');?>" method="post">
        <input type="hidden" name="mid" value="<?php echo "" ?>">
        <td><input type="submit" value="Edit" style="background:#FF8D1B;color:white;padding:0px 30%;border:hidden;border-radius:5px" disabled></td>
        </form>
      </tr>
    </tbody>
  </table>
	</div>
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
