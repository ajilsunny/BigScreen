<?php

$CI =& get_instance();
 $a= $CI->sessionin(1) ;
if($a==1)
{
  if($mid &&$tid &&$runid)
  {
	include('user_header.php');
?>
<script>
  function daytime(did,i)
  {
    var date=document.getElementById('but'+i).value;
    var mid=document.getElementById('mid').value;
    var tid=document.getElementById('tid').value;
    var runid=document.getElementById('runid').value;
    var screen=document.getElementById('screen').value;

    var data=new FormData();
    data.append('mid',mid);
    data.append('tid',tid);
    data.append('runid',runid);
    data.append('did',did);
    data.append('screen',screen);
  	$.ajax({
      method:'post',
      url:"<?php echo site_url("ucontroller/showtime"); ?>",
      processData: false,
      contentType: false,
      data: data,
      success:function(result){
  		//alert(result);
  			 var r=JSON.parse(result);
  			 //alert(r[0]);
  			 $('#showtime').html("");
         if(r==0)
         {
           $('#showtime').html('<h1><label style="color:red">No shows</lable></h1>');
         }
         else
         {
           for(i=0;i<r.length;i++)
           {
    				 $('#showtime').append('<form class="col-xs-1 center-block" action="<?php echo site_url("ucontroller/theatreseating")?>" method="post"><input type="hidden" name="tid" id="tid" value="'+tid+'"><input type="hidden" name="mid" id="mid" value="'+mid+'"><input type="hidden" name="screen" id="screen" value="'+screen+'"><input type="hidden" name="bookdate" id="bookdate" value="'+date+'"><input type="hidden" name="booktime" id="booktime" value="'+r[i]+'"><input class="btn btn-success" style="padding:10px 20px;border-radius:10px;color:white;display:inline-block;margin-left:10px;div_hover:black" type="submit" value="'+r[i]+'"></form>');
    			 }
         }

  		}
    });

  }
</script>
<div  style=";height:auto;width:auto;overflow-y: scroll;" >
  <div class="col-xs-12 well" style="padding-left:10%">
  <?php
  $now = date('d-m-Y');
  $start_date = strtotime($now);
  for ($i=0; $i <7 ; $i++)
  {
    $end_date = strtotime("+$i day", $start_date);
    $name = date('D', strtotime(date('d-m-Y', $end_date)));
    $nameOfDay = date('w', strtotime(date('d-m-Y', $end_date)));
    $datee=date('d-m-Y', $end_date);

    ?>
    <button  style="background:none;border:none;" name="but<?php echo $i ?>" id="but<?php echo $i ?>" value="<?php echo $datee ?>" onclick="daytime(<?php echo $nameOfDay+1 ?>,<?php echo $i ?>)">
      <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
      <input type="hidden" name="runid" id="runid" value="<?php echo $runid ?>">
      <input type="hidden" name="runid" id="runid" value="<?php echo $runid ?>">
      <input type="hidden" name="runid" id="runid" value="<?php echo $runid ?>">
      <input type="hidden" name="mid" id="mid" value="<?php echo $mid ?>">
      <input type="hidden" name="screen" id="screen" value="<?php echo $screen ?>">
    <div style="background:#e43202;padding:10px 20px;border-radius:30px;color:white;display:inline-block;margin-left:10px;div_hover:black">
      <?php echo date('d-m-Y', $end_date)." - ".$name; ?>
     </div>
</button>

    <?php
  }

   ?>
</div>
<center>
<div class="row" name="showtime" id="showtime">

</center>
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
