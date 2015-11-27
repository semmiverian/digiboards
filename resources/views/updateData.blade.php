<!DOCTYPE html>
<html>
<head> 
  <title>CARIKODE</title>
</head>
<body>
  <form method="post" action="../{{$detail->id}}" enctype="multipart/form-data">
		
		<!-- default -->
		<input	type="hidden" value="PATCH" name="_method">
		{{csrf_field()}}

		<!-- otak atik -->
		<label>nama</label>
		<input type="text" name="nama" value="{{$detail->nama}}">
		<label>lokasi</label>
		<input type="text" name="lokasi" value="{{$detail->lokasi}}"> 
		<label>ukuran</label>
		<input type="text" name="ukuran" value="{{$detail->ukuran}}" >
		<input	type="submit">Submit
	</form>
</body>
</html>