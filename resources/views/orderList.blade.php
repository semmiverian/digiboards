@extends('template')
@section('content')
<body>
  <div class="col-lg-12">
        <div class="well well-lg" style="margin-top:10%">
        <h3>Daftar Order Anda</h3>
        <a href="{{URL('auth/addBillboard')}}"><button type="button" class="btn btn-info btn-sm">Tambah Billboard</button></a>
      <div class="container; table-responsive">
        <table class="table table-bordered" border="1">
            <tr align="center">
              <td>Nama</td>
              <td>Lokasi</td>
              <td>Jenis</td>
              <td>Ukuran</td>
              <td>Jumlah Permukaan</td>
              <td>View</td>
              <td>Status</td>
              <td>Fasilitas</td>
              <td>Edit</td>
              <td>Delete</td>
            </tr> 
          @foreach($data as $detail)
            <tr>
              <td>{{ $detail->nama}}</td>
              <td>{{ $detail->lokasi}}</td>
              <td>{{ $detail->jenis}}</td>
              <td>{{ $detail->ukuran}}</td>
              <td align="center">{{ $detail->permukaan}}</td>
              <td>{{ $detail->view}}</td>
              <td align="center">{{ $detail->status}}</td>
              <td>{{ $detail->fasilitas}}</td>
              <td><a href="home/{{$detail->id}}/edit">Edit</a></td>
              <td><a href="billboardList/{{$detail->id}}/delete">Delete</a></td>
            </tr> 
        @endforeach
          </table>
      </div>
    </div>
  </div>
</body>
@stop