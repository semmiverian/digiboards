@extends('template')
@section('classHome')
  class="active"  
@stop
@section('content')
<script src="https://maps.googleapis.com/maps/api/js"></script></script>
<script>
  function petaBillboard() {
    var mapCanvas = document.getElementById('peta');
    var mapOptions = {
      center: new google.maps.LatLng(-6.2019232,106.7798553),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)

  @foreach($data as $titik)
    var posisi = new google.maps.LatLng({{$titik->latitude}},{{$titik->longitude}});
    
    var marker = new google.maps.Marker({
      position: posisi,
      map: map,
      title: '{{$titik->nama}}',
      info: contentinfo
    });

    var contentinfo = '<h1>' + '{{$titik->nama}}' + '</h1>' +
  '<br />' +
  '<p>' +
    'Alamat: {{$titik->lokasi}}' + ' ' +
    '<br />' +
    'Ukuran: {{$titik->ukuran}}' +
    '<br />' +
    'Jenis: {{$titik->jenis}}'+
    '<br />' +
    'Status: {{$titik->status}} '+
    'Fasilitas: {{$titik->fasilitas}}' +
  '</p>' +
      '<p><a href="{{URL('auth/addToCart')}}">Add To Cart</a></p>';

    var infowindow = new google.maps.InfoWindow({
      content: contentinfo
    });// nama blm sesuai titiknya

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,this,marker);
    });

  @endforeach
  }
  google.maps.event.addDomListener(window, 'load', petaBillboard);
</script>

<body>
	<div style="margin-top:5%">
  		<div class="embed-responsive" id="peta" style="width:100%; margin:auto"></div>
    </div>
</body>

@stop