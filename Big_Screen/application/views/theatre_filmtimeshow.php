<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto;">

  <?php
    foreach($dis as $row)
    {
        $fid=$row->mid;
        $fname=$row->film_name;
        $poster_pic=$row->poster_pic;
        $cover_pic=$row->cover_pic;
        $directer=$row->directer;
        $directer_pic=$row->directer_pic;
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
        $no_of_shows=$row->no_of_shows;
        $time1=$row->time1;
        $time2=$row->time2;
        $time3=$row->time3;
        $time4=$row->time4;
        $time5=$row->time5;
      ?>

      <script type="text/javascript">
        function dis()
        {

          var num= document.getElementById('shows').value;
          for (var i = 1; i <=<?php echo $no_of_shows ?>; i++)
          {
            document.getElementById("show"+i+"").style.visibility = "hidden";
          }
          for (var i = 1; i <=num; i++)
          {
            document.getElementById("show"+i+"").style.visibility = "visible";
              document.getElementById("noofshows").value=num;
          }
        }
      </script>


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
        <img class="imgcircle bod"  src="../../images/movie/directer/<?php echo $directer_pic ?>">
      </div>
      <div class="col-xs-3" align="center" >
        <img class="imgcircle bod"  src="../../images/movie/producer/<?php echo $producer_pic ?>">
      </div>
			</div>
		</div>
	</div>
  <div class="col-xs-3" style="height: auto"><br>
    <?php
      ?>
    <center><h1><b><?php echo $fname ?> </b></h1></center><br>
    <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:25px">Show Time</label></div>
<form action="" method="post">
    <div class="form-group">
       <label class="col-md-4 control-label" align="right">Shows</label>
       <div class="col-md-8 inputGroupContainer">
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
            <select name="shows" id="shows" class="form-control" disabled>
                  <option><?php echo $no_of_shows ?></option>
            </select>
            </div>
       </div>
    </div>

  <?php
  for ($i=1; $i<=$no_of_shows ; $i++)
  {
    ?>
    <div class="form-group" id="show<?php echo $i ?>" >
       <label class="col-md-4 control-label" align="right"><?php echo $i ?> Show</label>
       <div class="col-md-8 inputGroupContainer">
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
            <select name="time<?php echo $i ?>" class="form-control" disabled>
              <?php
                $time="time".$i;
                  ?>
                  <option value="<?php echo ${$time} ?>"><?php echo ${$time} ?></option>

            </select>
            </div>
       </div>
    </div>
<?php
  }
  ?>
  <input type="hidden" name="noofshows" id="noofshows" >
  <input type="hidden" name="mid" value="<?php echo $fid ?>">
  <input type="submit" name="edit" value="Edit" style="background:#FF8D1B;color:white;padding:3px 50%;border:hidden;border-radius:5px">
  </form>
	</div>
  <?php

   ?>
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
