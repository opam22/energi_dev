var ajaxku=buatajax();
function ajaxplts(id){
	if(id == 'PLTS'){
      document.getElementById("plts_box").style.display='table-row';
    }else{
      document.getElementById("plts_box").style.display='none';
    }
}

function ajaxkota(id){
  var url="/prov/"+id+"?sid="+Math.random();
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkec(id){
  var url="/kab/"+id+"?sid="+Math.random();
  ajaxku.onreadystatechange=stateChangedKec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkel(id){
  var url="/kec/"+id+"?sid="+Math.random();
  ajaxku.onreadystatechange=stateChangedKel;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxdusun(id){
	if(id){
      document.getElementById("dusun_box").style.display='table-row';
    }else{
      document.getElementById("dusun_box").style.display='none';
    }
	// showCoordinate();
}

function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kab").innerHTML = data
    }else{
      document.getElementById("kab").value = "<option selected>Pilih Kota/Kab</option>";
    }
    document.getElementById("kab_box").style.display='table-row';
    document.getElementById("kec_box").style.display='none';
    document.getElementById("kel_box").style.display='none';
    document.getElementById("lat_box").style.display='none';
    document.getElementById("lng_box").style.display='none';
  }
}

function stateChangedKec(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kec").innerHTML = data
    }else{
      document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
    document.getElementById("kec_box").style.display='table-row';
    document.getElementById("kel_box").style.display='none';
    document.getElementById("lat_box").style.display='none';
    document.getElementById("lng_box").style.display='none';
  }
}

function stateChangedKel(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kel").innerHTML = data
    }else{
      document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    document.getElementById("kel_box").style.display='table-row';
    document.getElementById("lat_box").style.display='none';
    document.getElementById("lng_box").style.display='none';
  }
}

var map;
var geocoder;
var marker;
var markersArray = [];
function initialize() {
  geocoder = new google.maps.Geocoder();
  var myLatlng =new google.maps.LatLng(-6.176655999999999, 106.83058389999997);
  var mapOptions = {
    center: myLatlng,
    zoom: 14
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Jakarta'
  });  
  markersArray.push(marker);
  google.maps.event.addListener(marker,"click",function(){});  
}

function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray.length = 0;
}

