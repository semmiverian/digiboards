<!DOCTYPE html>
<html>
<head>
	<title>Form Insert</title>
</head>
<body>

<form method="post" action="{{url('page1')}}">
{{csrf_field()}}
	<label>nama</label>
	<input type="text" name="nama">
	
	<label>lokasi</label>
	<input type="text" name="lokasi">

	<label>ukuran</label>
	<input type="text" name="ukuran">

	<input type="submit">

</form
</body>
</html>