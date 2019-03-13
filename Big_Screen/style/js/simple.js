function bookrequest()
{
  alert('hello');
  var mid=document.getElementById("mid").value;
  var lid=document.getElementById("lid").value;
  // var status=0;
  // var astatus=0;

  var data=new FormData();
  data.append('mid',mid);
  data.append('lid',lid);
  // data.append('status',status);
  // data.append('astatus',astatus);

  $ajax({
    method:'post',
    url:'<?php echo base_url("usercontroller/filmbookrequest"); ?>',
    processData: false,
		contentType: false,
		data: data,
    success:function(result){
      alert(result);
			//window.location.assign("login.php");
    }
  });
}
