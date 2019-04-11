<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>
<script>
function show()
{
  var theatre=document.getElementById('theatre').value;
  document.getElementById("vtheatre").innerHTML="";
  if(theatre=="")
  {
    //alert("Select theatre");
    document.getElementById("vtheatre").innerHTML="Select theatre";
    return false;
  }
  var screen=document.getElementById('screen').value;
  document.getElementById("vscreen").innerHTML="";
  if(screen=="")
  {
    //alert("Select theatre");
    document.getElementById("vscreen").innerHTML="Select screen";
    return false;
  }
  document.getElementById("vtheatrec").innerHTML="";
  var Category = [];
  $.each($("input[id='caregory']:checked"), function(){
      Category.push($(this).val());
  });

  var categories=Category.join(",");
  //document.getElementById("categories").value=categories;
  var len=Category.length;
  if(len==0)
  {
    document.getElementById("vtheatrec").innerHTML="Please select Show";
      return false;
  }
}
function discat()
{
  var theatre=document.getElementById('theatre').value;
  document.getElementById("vtheatre").innerHTML="";
  if(theatre=="")
  {
    //alert("Select theatre");
    document.getElementById("vtheatre").innerHTML="Select theatre";
    return false;
  }
  var screen=document.getElementById('screen').value;
  var data=new FormData();
  data.append('theatre',theatre);
  data.append('screen',screen);
	$.ajax({
    method:'post',
    url:"<?php echo site_url("tcontroller/showtime"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
		//alert(result);
			 var r=JSON.parse(result);
			 //alert(r[0].dname);
			 $('#cat').html("")
			 for(var i=0;i<10;i++)
       {
         // alert(i);
         // alert(r[i].shows);
				 $('#cat').append('<input type="checkbox" name="caregory[]" id="caregory" value="'+r[i].stid+'" style="margin:2%;font:18px"><h4 style="display:inline-block"><b>'+r[i].dname+'</b></h4>- '+r[i].show_time+'<br>');
			 }
		}
  });

}
</script>
<div style="background-image:url(<?php echo base_url('images/distributorhome.jpg');?>);height:auto;width:auto;">

  <?php
  if(!$show)
  {
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
      	<div class="col-xs-8 " style="height: auto">
      		<div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
            <img src="<?php echo base_url('images/movie/cover/').$cover_pic ?>" style="width:100%">
      			<div class="col-xs-12" style="height: 78%">

      			</div>
            <div class="col-xs-12 scrollmenu">
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
      	</div>
      	<div class="col-md-4" style="height: auto;"><br>
        <center>
           <!-- <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br> -->
      <h1><b><?php echo $fname ?> </b></h1></center><br>
    <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:25px">Show Time</label></div>
<form action="<?php echo site_url("tcontroller/showtimeinsert"); ?>" method="post">
    <div class="form-group">
       <label class="col-md-4 control-label" align="right">Theatre</label>
       <div class="col-md-8 inputGroupContainer">
         <p id="vtheatre" style="color:red"></p>
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
            <select name="theatre" id="theatre" class="form-control" required>
                  <option value="">-- Select --</option>
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
         <p id="vscreen" style="color:red"></p>
          <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>

            <select name="screen" id="screen" class="form-control" required onchange="return discat()">
                  <option value="">-- Select --</option>
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

    <div class="">
       <center><label class="col-md-12 control-label"><h4>Select Show times</h4></label></center>
<p id="vtheatrec" style="color:red"></p>
           <div class="col-md-12 input-group" name="cat" id="cat"></div>
       </div>
  <input type="hidden" name="mid" value="<?php echo $fid ?>">
  <input type="submit" name="add" value="Add" onclick="return show()" style="background:#FF8D1B;color:white;padding:3px 50%;border:hidden;border-radius:5px">
  </form>
	</div>
  <?php

   ?>
</div>

<?php
}
}
else
{
  foreach($show as $row1)
  {
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
    $theatre_name=$row1->theatre_name;
    $screen=$row1->screen;
    $showtime=explode(",",$row1->showstime);
  ?>
  <div class="col-xs-12" style="background: #F8F8F8">
    <div class="col-xs-8 " style="height: auto">
      <div align="center" class="col-xs-12" style="height: 90%;width: 100%;background-size:cover"><br>
        <img src="<?php echo base_url('images/movie/cover/').$cover_pic ?>" style="width:100%">
        <div class="col-xs-12" style="height: 78%">

        </div>
        <div class="col-xs-12 scrollmenu">
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
    </div>
    <div class="col-md-4" style="height: auto;"><br>
    <center>
       <!-- <img src="<?php echo base_url('images/movie/poster/').$poster_pic ?>" style="width:60%"><br> -->
  <h1><b><?php echo $fname ?> </b></h1></center><br>
<div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:25px">Show Time</label></div>
<form action="<?php echo site_url("tcontroller/showtimeinsert"); ?>" method="post">
<div class="form-group">
   <label class="col-md-4 control-label" align="right">Theatre</label>
   <div class="col-md-8 inputGroupContainer">
     <p id="vtheatre" style="color:red"></p>
      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
        <input name="theatre" id="theatre" class="form-control" value="<?php echo $theatre_name ?>" disabled>
        </div>
   </div>
</div>

<div class="form-group">
   <label class="col-md-4 control-label" align="right">Screen</label>
   <div class="col-md-8 inputGroupContainer">
     <p id="vscreen" style="color:red"></p>
      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
        <input name="theatre" id="theatre" class="form-control" value="<?php echo $screen ?>" disabled>
        </div>
   </div>
</div>

<div class="">
   <center><label class="col-md-12 control-label"><h4>Select Show times</h4></label></center>
<p id="vtheatrec" style="color:red"></p>
       <div class="col-md-12 input-group" name="cat" id="cat"></div>
       <table class="table table-borderless" style="color:black">
       <?php
       for ($i=0; $i <sizeof($showtime) ; $i++)
       {
         $a=$showtime[$i];
         $b['c']=$CI->showt($a);
         foreach ($b['c'] as $key)
         {?>
           <tr>
             <td><h4><b><?php echo $key->dname ?></b></h4></td>
             <td><?php echo " - " ?></td>
             <td><?php echo $key->show_time ?></td>
           <!-- echo $key->dname." - ".$key->show_time."<br>"; -->
         <?php
       }
       }
        ?>
      </table>
   </div>
   <br>
<input type="hidden" name="mid" value="<?php echo $fid ?>">
<input type="submit" name="Edit" value="Edit"  style="background:#FF8D1B;color:white;padding:3px 50%;border:hidden;border-radius:5px" disabled>
</form>
</div>
<?php

?>
</div>
<?Php
}
}
}
?>

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
