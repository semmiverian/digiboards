@extends('template')
@section('content')
<body>
    <div class="col-md-offset-4">
        <div class="well well-lg" style="margin-top:10%; margin-left:1%; width:50%">
        <h3>Tambah Billboard</h3>
        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <form method="post" action="/auth/addBillboard">
            {{csrf_field()}}            
                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama">
                </div>
                <div class="from-group">
                    <label for="inputLokasi">Alamat</label>
                    <div>
                        <textarea  name="lokasi" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputLatitude">Latitude</label>
                    <input type="text" name="latitude"  class="form-control" id="inputLatitude" placeholder="Latitude">
                </div>
                <div class="form-group">
                    <label for="inputLongitude">Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="inputLongitude" placeholder="Longitude">
                </div> 
                <div class="form-group">
                    <label for="inputUkuran">Ukuran</label>
                    <input type="text" name="ukuran" class="form-control" id="inputUkuran" placeholder="Ukuran">
                </div> 
                <div class="form-group">
                    <label for="inputPermukaan">Jumlah Permukaan</label>
                    <input type="text" name="permukaan" class="form-control" id="inputPermukaan" placeholder="Jumlah Permukaan">
                </div>
                <div class="from-group">
                    <label for="inputStatus">Status</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="inputStatus" value="Disewa">
                        Disewa
                      </label>
                      <label>
                        <input type="radio" name="status" id="inputStatus" value="Kosong">
                        Kosong
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputView">View</label>
                    <input type="text" name="view" class="form-control" id="inputView" placeholder="View">
                </div>
                <div class="form-group">
                    <label for="inputJenis">Jenis Billboard</label>
                    <input type="text" name="jenis" class="form-control" id="inputJenis" placeholder="Jenis Billboard">
                </div>
                <div class="from-group">
                    <label for="inputFasilitas">Fasilitas</label>
                    <div>
                        <textarea  name="fasilitas" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="inputGambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="inputGambar" placeholder="Gambar">
                </div> -->
                </br>
                <div class="form-group">
                      <button type="submit" class="btn btn-info">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
