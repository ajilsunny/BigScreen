<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
var x=[];

var name[];

var rows=[];

var price=[];

var f=0;
function val(z)
{

  for (var i = 0; i < x.length; i++)
  {
    if(z==x[i])
    {
      document.getElementById(z).style.backgroundColor = "";
      var index = x.indexOf(z);
      if (index > -1)
      {
        x.splice(index, 1);
        f--;
      }
      return false;
    }
  }
  document.getElementById(z).style.backgroundColor = "red";
  x[f]=z;
  f++;
  return false;

}
function vals()
{
  var num=document.getElementById('no_of_seatcategory').value;
  for (var i = 1; i <= num; i++) {
      name[i]=document.getElementById('cat_name'+i).value;
      rows[i]=document.getElementById('cat_start'+i).value;
      price[i]=document.getElementById('cat_price'+i).value;
  }

var data=new FormData();

data.append('seat',x);
data.append('catname',name);
data.append('catrow',rows);
data.append('catprice',price);
$.ajax({
 method:'post',
 url:"<?php echo site_url("tcontroller/theatresetseats"); ?>",
 processData: false,
 contentType: false,
 data: data,
 success:function(result){
   //alert(result);
 window.location.href = 'display.php';
 }
});
}

function Categorys()
{
  $('#catdiv').html('');
  var num=document.getElementById('no_of_seatcategory').value;
  // alert(num);
  for (var i = 1; i <= num; i++)
  {
  $('#catdiv').append('<tr class="form-group"><td><label>Seat Categorys Name '+i+': </label></td><td><input type="text" name="cat_name'+i+'" id="cat_name'+i+'"></td></tr><tr><td><label></lable></td></tr><tr><td><label>Seat start row '+i+': </label></td><td><input type="text" name="cat_start'+i+'" id="cat_start'+i+'"></td></tr><tr><td></td></tr><tr><td><label></lable></td></tr><tr><td><label>Seat price '+i+': </label></td><td><input type="text" name="cat_price'+i+'" id="cat_price'+i+'"></td></tr><tr><td></td></tr><tr><td><label></lable></td></tr>');

  }
  $('#catdiv').append('<input type="button" value="Set Seating" id="add" style="background-color:blue;width:200px;color:white"  onclick="return vals()">');
}
</script>

<div class="col-md-12 " style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:auto;;width:100%;">
  <center class=" well">
    <form action="#" method="post">
      Rows<input type="text" name="rows" id="rows" required>
      cols<input type="text" name="cols" id="cols" required>
      <input type="submit" name="show" id="show" value="show seating">
    </form>
  </center>

      <?php
      if(isset($_POST['show']))
      { ?>
        <div class="col-md-12 well" style="height:auto">
        <div class="col-md-8 well" style="overflow-x: scroll;" class="well form-horizontal">
          <center>
            <div style="" id="main">
              <input type="button" value="screen" id="red" style="background-color:yellow;width:600px">
              <table>
                  <?php
                  $r=$_POST['rows'];
                  $c=$_POST['cols'];
                  $s="A";
                  for($i=1;$i<=$r;$i++)
                  {
                    echo"<tr>";
                    for($j=1;$j<=$c;$j++)
                    {?>
                      <th>

                        <input type="button" name="seat" value="<?php echo($s.$j) ;?>" id="<?php echo($i.'-'.$j) ;?>" style="padding:5px;font-size:9px;" onclick="return val(this.id)">

                      </th>
                    <?php
                    }
                      $s++;
                      echo "</tr>";
                  }

                   ?>
            </table>
          </div>
            <!-- <input type="button" value="Set Seating" id="add" style="background-color:blue;width:200px" onclick="return vals()"> -->
        </center>
      </div>
      <div class="col-md-4 well">
          <div class="col-xs-12" align="center" style="padding-bottom:5px"><label style="font-size:30px">Seating Categorys</label></div>
          <label>Number of seating Categorys</label>
          <input type="number" name="no_of_seatcategory" id="no_of_seatcategory" min="0" onchange="Categorys()">
          <br>
          <br>
          <div name="catdiv" id="catdiv">
          </div>
      </div>
     </form>
   </div>
   <?php } ?>
</div>
<?php
	include('footer.php');
	}
	else
	{
		$CI->index() ;
	}
	?>
