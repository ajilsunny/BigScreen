
var director=0;
var producer=0;
var actor=0;
var actress=0;

function adddirector()
{
  director++
  $('#directoradd').append('<div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vdirector'+director+'" style="color:red;"></p><div class="input-group"><span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span><div><input style="display:inline-block;width:100%"  id="Director'+director+'" name="Director'+director+'" placeholder="Director Name" class="form-control" Director type="text"></div></div></div></div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vdirectorpic'+director+'" style="color:red;"></P><div class="input-group"><input id="Directorpic'+director+'" name="Directorpic'+director+'" accept=".png, .jpg, .jpeg,.JPG"  type="file" style="font-size: 120%"></div></div></div></div>');
  document.getElementById('numdirector').value=director;
}

function addproducer()
{
  producer++
  $('#produceradd').append('<div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vproducer'+producer+'" style="color:red;"></p><div class="input-group"><span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span><div><input style="display:inline-block;width:100%"  id="producer'+producer+'" name="producer'+producer+'" placeholder="Producer Name" class="form-control"  type="text"></div></div></div></div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vproducerpic'+producer+'" style="color:red;"></p><div class="input-group"><input id="producerpic'+producer+'" name="producerpic'+producer+'" accept=".png, .jpg, .jpeg,.JPG" type="file" style="font-size: 120%"></div></div></div></div>');
  document.getElementById('numproducer').value=producer;
}

function addactor()
{
  actor++
  $('#actoradd').append('<div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vactor'+actor+'" style="color:red;"></p><div class="input-group"><span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span><div><input style="display:inline-block;width:100%"  id="actor'+actor+'" name="actor'+actor+'" placeholder="Actor Name" class="form-control" type="text"></div></div></div></div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vactorpic'+actor+'" style="color:red;"></p><div class="input-group"><input id="actorpic'+actor+'" name="actorpic'+actor+'" accept=".png, .jpg, .jpeg,.JPG" type="file" style="font-size: 120%"></div></div></div></div>');
  document.getElementById('numactor').value=actor;
}

function addactress()
{
  actress++
  $('#actressadd').append('<div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vactress'+actress+'" style="color:red;"></p><div class="input-group"><span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span><div><input style="display:inline-block;width:100%"  id="actress'+actress+'" name="actress'+actress+'" placeholder="Actress Name" class="form-control" type="text"></div></div></div></div><div class="form-group"><label class="col-md-4 control-label"></label><div class="col-md-8 inputGroupContainer"><p id="vactresspic'+actress+'" style="color:red;"></p><div class="input-group"><input id="actresspic'+actress+'" name="actresspic'+actress+'" accept=".png, .jpg, .jpeg,.JPG" type="file" style="font-size: 120%"></div></div></div></div>');
  document.getElementById('numactress').value=actress;
}

function  adddetailes()
{
  // alert("hi");

//film name
  document.getElementById("vfilm").innerHTML="";
  var filmName=document.getElementById('filmName').value;
  if(filmName=="")
  {
    document.getElementById("vfilm").innerHTML="Must fill film Name field";
    return false;
  }

//film poster pic
  document.getElementById("vposterpic").innerHTML="";
  var filmposterpic=document.getElementById('filmposterpic').value;
  if(filmposterpic=="")
  {
    document.getElementById("vposterpic").innerHTML="Must select film poster pic field";
    return false;
  }

//file cover pic
  document.getElementById("vcoverpic").innerHTML="";
  var coverpic=document.getElementById('coverpic').value;
  if(coverpic=="")
  {
    document.getElementById("vcoverpic").innerHTML="Must select cover pic field";
    return false;
  }

//film directors
  var numdirector=document.getElementById('numdirector').value;
  for (var i = 0; i <= numdirector; i++)
  {
    var Director=new Array();
    document.getElementById('vdirector'+i).innerHTML="";
    Director[i]=document.getElementById('Director'+i).value;
    if(Director[i]=="")
    {
      document.getElementById('vdirector'+i).innerHTML="Please fill director name field";
      return false;
    }
    var Directorpic=new Array();
    document.getElementById('vdirectorpic'+i).innerHTML="";
    Directorpic[i]=document.getElementById('Directorpic'+i).value;
    if(Directorpic[i]=="")
    {
      document.getElementById('vdirectorpic'+i).innerHTML="Please select director pic";
      return false;
    }
  }

//film producer
  var numproducer=document.getElementById('numproducer').value;
  for (var i = 0; i <= numproducer; i++)
  {
    var Producer=new Array();
    document.getElementById('vproducer'+i).innerHTML="";
    Producer[i]=document.getElementById('producer'+i).value;
    if(Producer[i]=="")
    {
      document.getElementById('vproducer'+i).innerHTML="Please fill producer name field";
      return false;
    }
    var Producerpic=new Array();
    document.getElementById('vproducerpic'+i).innerHTML="";
    Producerpic[i]=document.getElementById('producerpic'+i).value;
    if(Producerpic[i]=="")
    {
      document.getElementById('vproducerpic'+i).innerHTML="Please select producer pic";
      return false;
    }
  }

  //film actors
  var numactor=document.getElementById('numactor').value;
  for (var i = 0; i <= numactor; i++)
  {
    var Actor=new Array();
    document.getElementById('vactor'+i).innerHTML="";
    Actor[i]=document.getElementById('actor'+i).value;
    if(Actor[i]=="")
    {
      document.getElementById('vactor'+i).innerHTML="Please fill actor name field";
      return false;
    }
    var Actorpic=new Array();
    document.getElementById('vactorpic'+i).innerHTML="";
    Actorpic[i]=document.getElementById('actorpic'+i).value;
    if(Actorpic[i]=="")
    {
      document.getElementById('vactorpic'+i).innerHTML="Please select actor pic";
      return false;
    }
  }

  //film actress
  var numactress=document.getElementById('numactress').value;
  for (var i = 0; i <= numactress; i++)
  {
    var Actress=new Array();
    document.getElementById('vactress'+i).innerHTML="";
    Actress[i]=document.getElementById('actress'+i).value;
    if(Actress[i]=="")
    {
      document.getElementById('vactress'+i).innerHTML="Please fill actress name field";
      return false;
    }
    var Actresspic=new Array();
    document.getElementById('vactresspic'+i).innerHTML="";
    Actresspic[i]=document.getElementById('actresspic'+i).value;
    if(Actresspic[i]=="")
    {
      document.getElementById('vactresspic'+i).innerHTML="Please select actress pic";
      return false;
    }
  }


//film music directors
document.getElementById("vmusic").innerHTML="";
var Mdirector=document.getElementById('mdirector').value;
if(Mdirector=="")
{
  document.getElementById("vmusic").innerHTML="Must fill Music director Name field";
  return false;
}

//film language
document.getElementById("vlanguage").innerHTML="";
var Language=document.getElementById('language').value;
if(Language==0)
{
  document.getElementById("vlanguage").innerHTML="Please select Language field";
  return false;
}

//film Category
document.getElementById("vcaregory").innerHTML="";
var Category = [];
$.each($("input[id='caregory']:checked"), function(){
    Category.push($(this).val());
});

var categories=Category.join("-");
//document.getElementById("categories").value=categories;
var len=Category.length;
if(len==0)
{
  document.getElementById("vcaregory").innerHTML="Please select Category";
    return false;
}




//film Description
document.getElementById("vdescription").innerHTML="";
var Description=document.getElementById('description').value;
if(Description=="")
{
  document.getElementById("vdescription").innerHTML="Please fill description field";
  return false;
}

//film cost
document.getElementById("vcost").innerHTML="";
var Cost=document.getElementById('cost').value;
if(Cost=="")
{
  document.getElementById("vcost").innerHTML="Please fill Cost field";
  return false;
}


}
