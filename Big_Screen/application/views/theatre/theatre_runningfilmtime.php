<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>

<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;padding:3%">

  <?php
  if(!$dis)
  {
    echo '<center><h1 style="font-family:Times New Roman, Times, serif;font-size:36px;color:#FF0000" >No Theatres...!!</h1></center>';
  }
  else
  {

  foreach($dis as $row)
  {
    $tid=$row->tid;
    $propic=$row->t_pro_pic;
    $name=$row->theatre_name;
    ?>

    <form action="<?php echo site_url('tcontroller/theatre_screens_time');?>" method="post">
      <input type="hidden" name="tid" value="<?php echo $tid; ?>" >
    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" >
    <div class="w3_agile_featured_movies" >
      <div class="col-md-2 w3l-movie-gride-agile" >
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
}
   ?>

</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
