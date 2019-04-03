<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>
<script>
function discat()
{
  var theatre=document.getElementById('theatre').value;
  var screen=document.getElementById('screen').value;
  var data=new FormData();
  data.append('theatre',theatre);
  data.append('screen',screen);
	$.ajax({
    method:'post',
    url:"<?php echo site_url("usercontroller/districtselect"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
		//alert(result);
			 var r=JSON.parse(result);
			 //alert(r[0]);
			 $('#district').html("<option value=0>"+"Select District"+"</option>");

			 for(i=0;i<r.length;i++){
				 $('#district').append("<option value="+r[i].id+">"+r[i].value+"</option>");
			 }
				 //$('#district').append("<option value="+result+">"+result+"</option>");
				 //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
				}
  });

}
</script>
<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto;">

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

      <!-- <script type="text/javascript">
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
      </script> -->


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
      	</div>
      	<div class="col-md-3" style="height: auto;"><br>
        <center>
           <!-- <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br> -->
      <h1><b><?php echo $fname ?> </b></h1></center><br>
    <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:25px">Show Time</label></div>
<form action="" method="post">
    <div class="form-group">
       <label class="col-md-4 control-label" align="right">Theatre</label>
       <div class="col-md-8 inputGroupContainer">
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>

            <select name="theatre" id="theatre" class="form-control" required>
                  <option>-- Select --</option>
                  <?php
                  $screen;
                    foreach ($theatre as $key)
                    {
                      $id=$key->tid;
                      $name=$key->theatre_name;
                      $screen=$key->t_screens;
                      echo '<option value="'.$id.'">'.$name.'</option>';
                    }

                  ?>
            </select>
            </div>
       </div>
    </div>

    <div class="form-group">
       <label class="col-md-4 control-label" align="right">Screen</label>
       <div class="col-md-8 inputGroupContainer">
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>

            <select name="screen" id="screen" class="form-control" onchange="discat()">
                  <option>-- Select --</option>
                  <?php
                  for ($i=1; $i <=$screen ; $i++)
                  {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                  }
                  ?>
            </select>
            </div>
       </div>
    </div>

    <div class="form-group">
       <label class="col-xs-4 control-label">Category</label>
       <div class="col-xs-8 inputGroupContainer">
         <p id="vcaregory" style="color:red;"></P>
           <!-- <input type="hidden" name="categories" id="categories">
           <?php
           $i=1;
           foreach ($cat as $row)
           {
             $value=$row->cid;
             $catname=$row->catname;
           ?>
          <input type="checkbox" name="caregory[]" id="caregory" value="<?php echo $value ?>" style="margin:2%;font:18px"><b><?php echo $catname ?></b>
          <?php
          if($i==4)
          {
            echo "<br>";
            $i=0;
          }
          $i++;
           }
           ?> -->

        </div>
       </div>


  <?php
  // for ($i=1; $i<= ; $i++)
  // {
    ?>
    <!-- <div class="form-group" id="show<?php echo $i ?>" >
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
    </div> -->
<?php
  // }
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
