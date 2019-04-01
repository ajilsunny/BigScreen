<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;padding:3%">

<?php
foreach($dis as $row)
{
  $tid=$row->tid;
  $propic=$row->t_pro_pic;
  $name=$row->theatre_name;
  ?> 

  <form action="<?php echo site_url('tcontroller/viewtheatre');?>" method="post">
  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" >
  <div class="w3_agile_featured_movies" >
    <div class="col-md-2 w3l-movie-gride-agile" >
      <input type="hidden" name="tid" value="<?php echo $tid; ?>" >
    <button type="submit" href="" name="submit" class="hvr-shutter-out-horizontal" ><img src="<?php echo base_url('images/theatreprofile/').$propic?>" title="View Theatre Detailes" class="img-responsive" alt=" " />
        <div class="w3l-action-icon"><i class="glyphicon glyphicon-film " aria-hidden="true" ></i></div>
      </a>
      <div class="w3l-movie-text" style="background-color: black;padding: 5%;border-radius: 10px">
          <h6 ><a href=""  style="color: gold"><?php echo $name ?></a></h6>
      </div>
          <div class="clearfix"></div>

      </div>
    </div>
  </div>
  </form>

  <?php
}
 ?>

  <form action="<?php echo site_url('tcontroller/addtheatre');?>" method="post">
  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" >
  <div class="w3_agile_featured_movies" >
    <div class="col-md-2 w3l-movie-gride-agile" >
      <input type="hidden" name="fid" value="" >
    <button type="submit" href="" name="submit" class="hvr-shutter-out-horizontal" ><img src="<?php echo base_url('images/add.png')?>" title="Add Theatre" class="img-responsive" alt=" " />
        <div class="w3l-action-icon"><i class="glyphicon glyphicon-plus" aria-hidden="true" ></i></div>
      </a>
      <!-- <div class="w3l-movie-text" style="background-color: black;padding: 5%;border-radius: 10px">
          <h6 ><a href=""  style="color: gold"></a></h6>
      </div> -->
          <div class="clearfix"></div>

      </div>
    </div>
  </div>
  </form>




</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
