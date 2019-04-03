<?php

$CI =& get_instance();
 $a= $CI->sessionin(2) ;
if($a==1)
{
	include('theatre_header.php');
?>
<script>
  function display()
  {
    $('#times').html('')
    var n=document.getElementById('no_of_shows').value;
    for (var i = 1; i <n; i++)
    {
      var k=i+1
      $('#times').append('<tr><td><label> Show time '+k+' :</lable></td><td><input class="form-control" type="time" name="showtime'+i+'" id="showtime'+i+'" required></td><tr>')
    }
    // $('#times').append('')
  }
  function show()
  {
     document.getElementById('time').style.display="block";
  }

  function timeform()
  {
    var s=[];
    var n=document.getElementById('no_of_shows').value;
    for (var i = 0; i <n; i++)
    {
      var inputEle  =document.getElementById('showtime'+i).value;
  var timeSplit = inputEle.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  s[i]=hours + ':' + minutes + ' ' + meridian;

}
document.getElementById('shows').value=s;
  }
</script>
<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;padding:4%">
<center>
  <div class="well" style="width:100%">
    <?php
    $s=$this->session->userdata('msg');
    if($s!="")
    { echo "<font color='#FF0000'>".$s."</font>";
    }
    ?>
    <table>
  <?php
  if($dis)
  {
    foreach ($dis as $row)
    {
      $dayid=$row->did;
      $dayname=$row->dname;
      $show_time=$row->show_time;
      $show_times = explode(',',$show_time);
      ?>


          <tr>
            <td style="padding:20px"><div style="background:#ffb300;padding:10px 20px;border-radius:30px;color:white"><?php echo $dayname ?></div></td>
            <td style="padding:20px"><?php
              for ($i=0; $i <sizeof($show_times) ; $i++)
              {
              echo '<div style="background:#e43202;padding:10px 20px;border-radius:30px;color:white;display:inline-block;margin-left:10px">'.$show_times[$i].'</div>';
              }

            ?>
          </td>
          </tr>


      <?php
    }
  }
   ?>
   </table>
   <div style="float:center" >
     <div style="background: #ff6600;width:25%;padding:8px 15px;border-radius:20px"><a style="color:white" href="" data-toggle="modal" data-target="#myModal">Add show time</a></div>
   </div>
   </div>


   <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           Add Show Time
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">

           <div class="form">
             <form action="<?php echo site_url('tcontroller/add_screens_time');?>" method="post">
               <div class="well" style="width:100%">
                 <select name="day" id="day" class="form-control" required onchange="show()">
                   <option value="">-- Select Day --</option>
                   <?php
                   $day=$CI->days();
                   foreach ($day as $row)
                   {
                     $dayid=$row->did;
                     $dayname=$row->dname;
                     echo "<option value=".$dayid.">$dayname</option>";
                   }
                   ?>
                 </select>
                 <br>
                 <div id="time" name="time" style="display:none">
                   <table>
                     <tr>
                       <td>
                         <label>Select No of shows :</lable>
                         </td>
                         <td>
                           <input class="form-control" type="number"  name="no_of_shows" id="no_of_shows" min="1" required max="8" value="1" onchange="display()">
                         </td>
                       </tr>
                     </table>
                     <!-- <tr><td><lable></lable></td></tr> -->
                     <table>
                       <tr>
                         <td colspan="1">
                           <label> Show time 1 :</lable>
                           </td>
                           <td>
                             <input class="form-control" type="time" name="showtime0" id="showtime0" required>
                           </td>
                         </tr>
                       </table>
                       <div id="times" style="width:100%"></div>
                       <br>
                       <input type="hidden" name="shows" id="shows">
                       <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
                       <input type="hidden" name="screen" id="screen" value="<?php echo $screen ?>">
                       <input type="submit" class="btn btn-primary" value="Add" onclick="timeform()">
                     </div>
                   </div>
                 </form>

               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>



</center>
</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
