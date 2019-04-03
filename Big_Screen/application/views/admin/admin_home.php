<?php

$CI =& get_instance();
 $a= $CI->sessionin(0) ;
if($a==1)
{
	include('admin_header.php');
?>



<div  style="background-image:url(<?php echo base_url('images/adminhome.jpg');?>);height:800px;width:auto;">


</div>

<?php
	include('footer.php');
	}
	else
	{
		$CI->mainindex() ;
	}
	?>
