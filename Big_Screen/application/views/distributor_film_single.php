<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('distributor_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto;">
<?php
  foreach($dis as $row)
  {

      $fname=$row->film_name;
      $poster_pic=$row->poster_pic;
      $cover_pic=$row->cover_pic;
      $Director=$row->Director;
      $Director_pic=$row->Director_pic;
      $producer=$row->producer;
      $producer_pic=$row->producer_pic;
      $mdirector=$row->mdirector;
      $language=$row->language;
      $actor=$row->actor;
      $actor_pic=$row->actor_pic;
      $actress=$row->actress;
      $actress_pic=$row->actress_pic;
      $description=$row->description;
      $price=$row->price;
      $fid=$row->mid;
    ?>
<div class="col-xs-12" style="background: #F8F8F8">
	<div class="col-xs-9 " style="height: auto">
		<div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
      <img src="../../images/movie/cover/<?php echo $cover_pic ?>" style="width:100%">
			<div class="col-xs-12" style="height: 78%">

			</div>
			<div class="col-xs-12" style="padding-right: 40px">
			<div class="col-xs-3" align="center" >
        <img class="imgcircle bod"  src="../../images/movie/actor/<?php echo $actor_pic ?>">
      </div>
      <div class="col-xs-3" align="center" >
        <img class="imgcircle bod"  src="../../images/movie/actress/<?php echo $actress_pic ?>">
      </div>
      <div class="col-xs-3" align="center" >
        <img class="imgcircle bod"  src="../../images/movie/Director/<?php echo $Director_pic ?>">
      </div>
      <div class="col-xs-3" align="center" >
        <img class="imgcircle bod"  src="../../images/movie/producer/<?php echo $producer_pic ?>">
      </div>
			</div>
		</div>
    <div align=left class="col-xs-12 tblstyle1">
      <br>
          <?php echo $description ?>
    <br><BR>
    </div>
	</div>
	<div class="col-xs-3" style="height: auto"><br>
  <center>  <img src="../../images/movie/poster/<?php echo $poster_pic ?>" style="width:60%"><br>
<h1><b><?php echo $fname ?> </b></h1></center><br>
<table class="table tblstyle" style="color:black">
    <tbody>
      <tr>
        <td >Director </td>
        <td >: <?php echo $Director ?></td>
      </tr>
      <tr>
        <td>Producer </td>
        <td>: <?php echo $producer ?></td>
      </tr>
      <tr>
        <td>Music director</td>
        <td>: <?php echo $mdirector ?></td>
      </tr>
      <tr>
        <td>Actor </td>
        <td>: <?php echo $actor ?></td>
      </tr>
      <tr>
        <td>Actress</td>
        <td>: <?php echo $actress ?></td>
      </tr>
      <tr>
        <td>Language </td>
        <td>: <?php echo $language ?></td>
      </tr>
      <tr>
        <td>Price </td>
        <td>: ₹<?php echo $price ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <form action="<?php echo site_url('usercontroller/filmviewdistributor');?>" method="post">
        <input type="hidden" name="mid" value="<?php echo $fid ?>">
        <td><input type="submit" value="Edit" style="background:#FF8D1B;color:white;padding:0px 50%;border:hidden;border-radius:5px"></td>
        </form>
      </tr>
    </tbody>
  </table>
	</div>
</div>

<?php } ?>

</div>
<br><br>
<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
