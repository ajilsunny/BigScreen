<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
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
  <form action="<?php echo site_url('tcontroller/add_screens_time');?>" method="post">
  <div class="well" style="width:25%">
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
