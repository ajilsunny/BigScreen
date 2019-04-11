<?php

$CI =& get_instance();
 $a= $CI->sessionin(1) ;
if($a==1)
{
  if($dis)
  {
	include('user_header.php');
?>

<div  style=";height:auto;width:auto;overflow-y: scroll;" >
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

		</div>
    <div align=left class="col-xs-12 tblstyle1">
      <br>
          <?php echo $description ?>
    <br><br>
    </div>
    <div class="col-xs-11 scrollmenu">
    <div class="col-xs-12" style="padding-right: 10%;">
      <?php for ($i=0; $i < sizeof($Director_pics); $i++)
      {
        ?>

        <div style="display:inline-block;" align="center" >
          <img class="imgcircle bod"  src="<?php echo base_url('images/movie/director/').$Director_pics[$i] ?>">
          <div>
            <label><?php echo $Directors[$i]; ?></label><br>
            <h5>Director</h5>
          </div>
        </div>

      <?php
      }
      ?>
      <?php for ($i=0; $i < sizeof($producer_pics); $i++)
      {
        ?>
        <div style="display:inline-block;margin-left:2%" align="center" >
          <img class="imgcircle bod"  src="<?php echo base_url('images/movie/producer/').$producer_pics[$i] ?>">
          <div>
            <label><?php echo $producers[$i]; ?></label><br>
            <h5>Producer</h5>
          </div>
        </div>
      <?php
      }
      ?>
      <?php for ($i=0; $i < sizeof($actor_pics); $i++)
      {
        ?>
        <div style="display:inline-block;margin-left:2%" align="center" >
          <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actor/').$actor_pics[$i] ?>">
          <div>
            <label><?php echo $actors[$i]; ?></label><br>
            <h5>Actor</h5>
          </div>
        </div>
      <?php
      }
      ?>
      <?php for ($i=0; $i < sizeof($actress_pics); $i++)
      {
        ?>
        <div style="display:inline-block;margin-left:2%" align="center" >
          <img class="imgcircle bod"  src="<?php echo base_url('images/movie/actress/').$actress_pics[$i] ?>">
          <div>
            <label><?php echo $actresss[$i]; ?></label><br>
            <h5>Actress</h5>
          </div>
        </div>
      <?php
      }
      ?>

    </div>
  </div>
	</div>
	<div class="col-md-3" style="height: auto;"><br>
  <center>  <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br>
<h1><b><?php echo $fname ?> </b></h1></center><br>
<center>
  <form action="<?php echo site_url('ucontroller/theatre_selection') ?>" method="post">
    <input type="hidden" name="mid" id="mid" value="<?php echo $fid ?>">
  <input type="submit" class="btn btn-primary" value="BOOK TICKETS" style="max-width: 238px;padding: 2% 25%;color: #fff;border:none">
</form>
</center>
<br>
<img src="https://tpc.googlesyndication.com/simgad/10050203127778980225">
<br><br><br>
        <center><h3><label style="color:black">Language </label></h3><br>
        <div style="background:#ff0000;color:white;width:50%;padding:5px 2px;border-radius:20px"><center><?php echo $language ?></center></div>
      <br>
        <h3><label style="color:black">Category </label></h3><br>
        <td>
          <?php
          $cat=array();
          for ($i=0; $i < sizeof($categories) ; $i++)
          {
            $cat=$CI->category($categories[$i]);
            echo "<div style='background:#ff4000;color:white;width:50%;border-radius:20px;padding:5px 2px''><center>".$cat."</center></div> <br>  ";
          }
          ?>
      </center>

	</div>
</div>

<?php }?>

</div>
<br><br>
<?php
	include('footer.php');
}
else
{
  $CI->userhome() ;
}
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
