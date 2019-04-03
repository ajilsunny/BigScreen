<?php

$CI =& get_instance();
 $a= $CI->sessionin(3) ;
if($a==1)
{
	include('distributor_header.php');
?>

<div  style="background-image:url(<?php echo base_url('images/distributorhome.jpg')?>);height:auto;width:auto;overflow-y: scroll;" >
<?php
  foreach($dis as $row)
  {

      $fname=$row->film_name;
      $poster_pic=$row->poster_pic;
      $cover_pic=$row->cover_pic;

      $Director=$row->director;
      $Directors = explode(',',$Director);

      $Director_pic=$row->director_pic;
      $Director_pics = explode(',',$Director_pic);

      $producer=$row->producer;
      $producers = explode(',',$producer);

      $producer_pic=$row->producer_pic;
      $producer_pics = explode(',',$producer_pic);

      $mdirector=$row->mdirector;
      $langu=$row->language;
      $language=$CI->language($langu);
      $category=$row->categories;
      $categories=explode(',',$category);
      $actor=$row->actor;
      $actors = explode(',',$actor);

      $actor_pic=$row->actor_pic;
      $actor_pics = explode(',',$actor_pic);

      $actress=$row->actress;
      $actresss = explode(',',$actress);

      $actress_pic=$row->actress_pic;
      $actress_pics = explode(',',$actress_pic);

      $description=$row->description;
      $price=$row->price;
      $fid=$row->mid;
    ?> 
<div class="col-xs-12" style="background: #F8F8F8">
	<div class="col-xs-9 " style="height: auto">
		<div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
      <img src="<?php echo base_url('images/movie/cover/').$cover_pic ?>" style="width:100%">
			<div class="col-xs-12" style="height: 78%">

			</div>
			<div class="col-xs-12" style="padding-right: 10%;">
        <?php for ($i=0; $i < sizeof($Director_pics); $i++)
        {
          ?>
          <div style="display:inline-block;" align="center" >
            <img class="imgcircle bod"  src="<?php echo base_url('images/movie/director/').$Director_pics[$i] ?>">
          </div>
        <?php
        }
        ?>
        <?php for ($i=0; $i < sizeof($producer_pics); $i++)
        {
          ?>
          <div style="display:inline-block;" align="center" >
            <img class="imgcircle bod"  src="<?php echo base_url('images/movie/producer/').$producer_pics[$i] ?>">
          </div>
        <?php
        }
        ?>
        <?php for ($i=0; $i < sizeof($actor_pics); $i++)
        {
          ?>
          <div style="display:inline-block;" align="center" >
            <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actor/').$actor_pics[$i] ?>">
          </div>
        <?php
        }
        ?>
        <?php for ($i=0; $i < sizeof($actress_pics); $i++)
        {
          ?>
          <div style="display:inline-block;" align="center" >
            <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actress/').$actress_pics[$i] ?>">
          </div>
        <?php
        }
        ?>

			</div>
		</div>
    <div align=left class="col-xs-12 tblstyle1">
      <br>
          <?php echo $description ?>
    <br><BR>
    </div>
	</div>
	<div class="col-md-3" style="height: auto;"><br>
  <center>  <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br>
<h1><b><?php echo $fname ?> </b></h1></center><br>
<table class="table tblstyle" style="color:black">
    <tbody>
      <tr>
        <td >Director </td>
        <td >:
          <?php
          for ($i=0; $i < sizeof($Directors); $i++)
          {
          echo $Directors[$i];
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Producer </td>
        <td>:
          <?php
          for ($i=0; $i < sizeof($producers); $i++)
          {
          echo $producers[$i];
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Music director</td>
        <td>: <?php echo $mdirector ?></td>
      </tr>
      <tr>
        <td>Actor </td>
        <td>:
          <?php
          for ($i=0; $i < sizeof($actors); $i++)
          {
          echo $actors[$i]." <br>   ";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Actress</td>
        <td>:
          <?php
          for ($i=0; $i < sizeof($actresss); $i++)
          {
          echo $actresss[$i]."  <br> ";
          }
          ?>
      </td>
      </tr>
      <tr>
        <td>Language </td>
        <td>: <?php echo $language ?></td>
      </tr>
      <tr>
        <td>Category </td>
        <td>:
          <?php
          $cat=array();
          for ($i=0; $i < sizeof($categories) ; $i++)
          {
            $cat=$CI->category($categories[$i]);
            echo $cat." <br>  ";
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Price </td>
        <td>: ₹25000</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <form action="<?php echo site_url('usercontroller/filmviewdistributor');?>" method="post">
        <input type="hidden" name="mid" value="<?php echo $fid ?>">
        <td><input type="submit" value="Edit" style="background:#FF8D1B;color:white;padding:0px 30%;border:hidden;border-radius:5px" disabled></td>
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
		$CI->mainindex() ;
	}
	?>
