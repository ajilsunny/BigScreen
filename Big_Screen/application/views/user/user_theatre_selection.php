<?php

$CI =& get_instance();
 $a= $CI->sessionin(1) ;
if($a==1)
{
  if($dis && $mid)
  {
	include('user_header.php');
?>
<script>
function dist()
{
	var state=document.getElementById('state').value;
  var data=new FormData();
  data.append('sid',state);
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
			 $('#district').html("<option value=0>"+"-- Select District --"+"</option>");

			 for(i=0;i<r.length;i++){
				 $('#district').append("<option value="+r[i].id+">"+r[i].value+"</option>");
			 }
				 //$('#district').append("<option value="+result+">"+result+"</option>");
				 //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
				}
  });
}

function theaters(mid)
{
  var district=document.getElementById('district').value;
  var data=new FormData();
  data.append('district',district);
  data.append('mid',mid);
	$.ajax({
    method:'post',
    url:"<?php echo site_url("ucontroller/theatreselect"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
		//alert(result);
			 var r=JSON.parse(result);
			 //alert(r[0]);
			 $('#theaterlist').html("");
       //
			 for(i=0;i<r.length;i++)
       {
         $('#theaterlist').append('<form action="<?php echo site_url('ucontroller/dateandtime_selection') ?>" method="post"><input type="hidden" name="tid" value="'+r[i].tid+'" ><input type="hidden" name="runid" value="'+r[i].runid+'" ><input type="hidden" name="mid" value="'+r[i].mid+'" ><input type="hidden" name="screen" value="'+r[i].screen+'" ><div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" ><div class="w3_agile_featured_movies" ><div class="col-md-2 w3l-movie-gride-agile" ><button  style="background:none;border:none" type="submit" href="" name="submit" class="hvr-shutter-out-horizontal" ><img src="<?php echo base_url('images/theatreprofile/')?>'+r[i].t_pro_pic+'" title="View Theatre Detailes" class="img-responsive" alt=" " /><div class="w3l-action-icon"><i class="glyphicon glyphicon-film " aria-hidden="true" ></i></div></a><div class="w3l-movie-text" style="background-color: black;padding: 5%;border-radius: 10px"><h6 ><a href=""  style="color: gold">'+r[i].theatre_name+'</a></h6></div><div class="w3l-movie-text" style="padding: 5%;border-radius: 10px"><h5><b><a href="" style="color: black">'+r[i].t_place+'</a></b></h5></div><div class="clearfix"></div></div></div></div></form>');

			 }
				 //$('#file').append('<input id="cpic" accept=".png, .jpg, .jpeg,.JPG" name="cpic"  type="file" style="font-size: 120">');
				}
  });
}
</script>
<div  style=";height:auto;width:auto;overflow-y: scroll;height:800px" >
<div class="col-xs-12" style="padding-top:5%;align:center">
  <div class="col-xs-3 col-md-push-3">
    <select class="form-control" onchange="dist()" name="state" id="state">
      <option value="">-- Select State --</option>
      <?php
      foreach($dis as $row)
        {
          $id=$row->id;
          $name=$row->sname;
          ?>
          <option value="<?php echo $id;?>"><?php echo $name ?></option>
        <?php
        }

        ?>
    </select>
  </div>
  <div class="col-xs-3 col-md-push-3">
    <select class="form-control" name="district" id="district" onchange="theaters(<?php echo $mid ?>)">
      <option>-- Select District --</option>
    </select>
  </div>
</div>

<div name="theaterlist" id="theaterlist" class="col-xs-12" style="padding:2% 4%">

  <!-- <form action="" method="post">
    <input type="hidden" name="tid" value="" >
  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" >
  <div class="w3_agile_featured_movies" >
    <div class="col-md-2 w3l-movie-gride-agile" >
    <button  style="background:none;border:none" type="submit" href="" name="submit" class="hvr-shutter-out-horizontal" ><img src="<?php echo base_url('images/m1.jpg')?>" title="View Theatre Detailes" class="img-responsive" alt=" " />
        <div class="w3l-action-icon"><i class="glyphicon glyphicon-film " aria-hidden="true" ></i></div>
      </a>
      <div class="w3l-movie-text" style="background-color: black;padding: 5%;border-radius: 10px">
          <h6 ><a href=""  style="color: gold">CVCCCCCC</a></h6>
      </div>
      <div class="w3l-movie-text" style="padding: 5%;border-radius: 10px">
          <h5 ><a href=""  style="color: black">CVCCCCCC</a></h5>
      </div>
          <div class="clearfix"></div>

      </div>
    </div>
  </div>
  </form> -->



</div>




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
