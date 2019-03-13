<?php

$CI =& get_instance();
 $a= $CI->sessionin() ;
if($a==1)
{
	include('theatre_header.php');
?>
<script type="text/javascript">
function bookrequest()
{
  var mid=document.getElementById("mid").value;
  var lid=document.getElementById("lid").value;
  var button=document.getElementById("request").value;
  var data=new FormData();
  data.append('mid',mid);
  data.append('lid',lid);
  if(button=='Request')
  {
  $.ajax({
    method:'post',
    url:"<?php echo site_url("usercontroller/filmbookrequest"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
    if(result=='0')
    {
      document.getElementById('request').value='Request Send';
    }
    }
  });
}
else {
  $.ajax({
    method:'post',
    url:"<?php echo site_url("usercontroller/filmbookrequestcancel"); ?>",
    processData: false,
    contentType: false,
    data: data,
    success:function(result){
    //alert(result);
    if(result=='0')
    {
      document.getElementById('request').value='Request';
    }
    }
  });
}
}

function bookcancel()
{

}
</script>
<div style="background-image:url(<?php echo base_url('images/theaterhome.jpg');?>);height:800px;width:auto;">
<?php
  foreach($dis as $row)
  {
      $lid=$this->session->userdata('id');
      $mid=$row->mid;
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

    ?>
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
    <div align=left class="col-xs-12 tblstyle1">
      <br>
          <?php echo $description ?>
    <br><BR>
    </div>
  </div>
  <div class="col-xs-3" style="height: auto"><br>
  <center>  <img src="../../images/movie/poster/<?php echo $poster_pic ?>" style="width:60%"><br>
  <h1><b><?php echo $fname ?> </b></h1></center><br>
  <table class="table tblstyle" style="color:black;">
    <tbody>
      <tr>
        <td >Director </td>
        <td >:<label id='director'> <?php echo $directer ?></label></td>
      </tr>
      <tr>
        <td>Producer </td>
        <td>:<label id='producer'> <?php echo $producer ?></label></td>
      </tr>
      <tr>
        <td>Music director</td>
        <td>:<label id='mdirector'> <?php echo $mdirector ?></label></td>
      </tr>
      <tr>
        <td>Actor </td>
        <td>:<label id='actor'> <?php echo $actor ?></label></td>
      </tr>
      <tr>
        <td>Actress</td>
        <td>:<label id='actress'> <?php echo $actress ?></label></td>
      </tr>
      <tr>
        <td>Language </td>
        <td>:<label id='language'> <?php echo $language ?></label></td>
      </tr>
      <tr>
        <td>price </td>
        <td>:<label id='price'> ₹<?php echo $price ?></label></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>
          <input type="hidden" id='mid' value="<?php echo $mid; ?>">
          <input type="hidden" id='lid' value="<?php echo $this->session->userdata('id'); ?>">
        </td>
        <td>
          <?php
            $a= $CI->bookstatus($mid,$lid) ;
            if($a=='0')
            {
          ?>
          <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Request send" onclick="bookrequest()">
        <?php
            }
            elseif ($a=='1')
            {
          ?>
          <form action="<?php echo site_url('usercontroller/bankpayment');?>" method="post">
              <input type="hidden" name="mid" value="<?php echo $mid ?>">
              <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Buy Now">
          </form>
          <?php
            }
            elseif ($a=='2')
            {
          ?>
              <input type="submit" id='request' style="background:#a2d246;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Payed" disabled>
          <?php
            }
            else
            {
              ?>
          <input type="submit" id='request' style="background:#FF8D1B;color:white;padding:0px 35%;border:hidden;border-radius:5px" value="Request" onclick="bookrequest()">
        <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
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
