<?php

$CI =& get_instance();
 $a= $CI->sessionin(1) ;
if($a==1)
{
	include('user_header.php');
?>
<div  style="height:auto;width:auto;"><br><br>
  <center>

<div class="well" style="width:50%;height:auto">

  <div class="row">
      	<div class="col-md-12">
      		<div class="panel panel-default">
      			<div class="panel-heading">
      				<h1 class="panel"><strong>Booking summary</strong></h1>
      			</div>
            <div class="panel-heading">
              <table class="table ">
      				<tr><td><h4 class="panel-title"><strong>Name </td><td><h4 class="panel-title"><strong><?php echo $name ?></td></tr></strong></h4>
              <tr><td><h4 class="panel-title"><strong>Film Name </td><td><h4 class="panel-title"><strong><?php echo $fname ?></td></tr></strong></h4>
              <tr><td><h4 class="panel-title"><strong>Theatre Name </td><td><h4 class="panel-title"><strong><?php echo $tname ?></td></tr></strong></h4>
              <tr><td><h4 class="panel-title"><strong>Date </td><td><h4 class="panel-title"><strong><?php echo $date ?></td></tr></strong></h4>
              <tr><td><h4 class="panel-title"><strong>Time </td><td><h4 class="panel-title"><strong><?php echo $time ?></td></tr></strong></h4>
            </table>
            <hr size="50px" style="color:black;">
    					<table class="table table-condensed">
    						<thead>
                                <tr>

        							<td class="text-center"><strong>Seats</strong></td>
        							<td class="text-center"><strong>Details</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->


    							<tr>
    								<td class="thick-line text-center"><h3><strong><?php echo $seats ?></h3></strong></td>
    								<td class="thick-line text-center"><strong>Seat Amount</strong></td>
    								<td class="thick-line text-right">₹ <?php echo $total ?>.00</td>
    							</tr>
                  <?php
                    $gst=($total*18)/100;
                    $int=($total*6)/100;
                    $amount=$total+$gst+$int;
                  ?>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>GST@18%</strong></td>
    								<td class="no-line text-right">₹ <?php echo $gst ?>.00</td>
    							</tr>
                  <tr>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Internet Charge</strong></td>
                    <td class="no-line text-right">₹ <?php echo $int ?>.00</td>
                  </tr>
</table>
<hr>
<table class="table">
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><h3><strong>Total</strong></h3></td>
    								<td class="no-line text-right"><h4><strong>₹ <?php echo $amount ?>.00</strong></h4></td>
    							</tr>
                  <tr>
    								<td class="no-line"></td>
    								<td class="no-line text-center"></td>
    								<td class="no-line text-right">
                      <form action="<?php echo site_url("ucontroller/paymentpage"); ?>" method="post">
                        <input type="hidden" name="seatname" id="seatname" value="<?php echo $seats ?>">
                        <input type="hidden" name="seatid" id="seatid" value="<?php echo $sbid ?>">
                        <input type="hidden" name="totalamount" id="totalamount" value="<?php echo $amount ?>">

                      <input type="submit" value="Pay Now" class="btn btn-success" >
                    </form>
                    </td>
    							</tr>
    						</tbody>
    					</table>
    			</div>


</div>
</center>
</div>
<br><br>

<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
