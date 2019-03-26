
function  signup1()
{

document.getElementById("vname").innerHTML="";
document.getElementById("vemail").innerHTML="";
document.getElementById("vphone").innerHTML="";
document.getElementById("vplace").innerHTML="";
document.getElementById("vstate").innerHTML="";
document.getElementById("vdist").innerHTML="";
document.getElementById("vtype").innerHTML="";
document.getElementById("vpin").innerHTML="";
document.getElementById("vpass1").innerHTML="";
document.getElementById("vpass2").innerHTML="";


  var Name=document.getElementById('Name').value;
  if(Name=="")
  {
    document.getElementById("vname").innerHTML="Must fill name field";
    return false;
  }

  var Email=document.getElementById('Email').value;
  if(Email=="")
  {
    document.getElementById("vemail").innerHTML="Must fill email field";
    return false;
  }

  var Phone=document.getElementById('Phone').value;
  if(Phone=="")
  {
    document.getElementById("vphone").innerHTML="Must fill phone number field";
    return false;
  }

  var type=document.getElementById('Type').value;
  if(type==0)
  {
    document.getElementById("vtype").innerHTML="Please select your type";
    return false;
  }

  var state=document.getElementById('state').value;
  if(state == 0)
  {
    document.getElementById("vstate").innerHTML="Please select your state";
    return false;
  }

  var dist=document.getElementById('district').value;
  if(dist == 0)
  {
    document.getElementById("vdist").innerHTML="Please select your district";
    return false;
  }

  var Place=document.getElementById('Place').value;
  if(Place=="")
  {
    document.getElementById("vplace").innerHTML="Must fill place field";
    return false;
  }

  var Pin=document.getElementById('Pin').value;
  if(Pin=="")
  {
    document.getElementById("vpin").innerHTML="Must fill pin field";
    return false;
  }

  var psw1=document.getElementById('psw1').value;
  if(psw1=="")
  {
    document.getElementById("vpass1").innerHTML="Must fill password field";
    return false;
  }

  var psw2=document.getElementById('psw2').value;
  if(psw2=="")
  {
    document.getElementById("vpass2").innerHTML="Must fill confirm password field";
    return false;
  }

  if(psw1!=psw2)
  {
    document.getElementById("vpass2").innerHTML="Password are not match";
    return false;
  }
  if(type>1)
  {
    var file=document.getElementById('cpic').value;
    if(file=="")
    {
      document.getElementById("vfile").innerHTML="Must upload certificate";
      return false;
    }
  }
}
