@extends('template')
@section('content')
<body>
    <div class="col-md-offset-4">
        <div class="well well-lg" style="margin-top:10%; margin-left:1%; width:50%">
        <h3>Daftar Sebagai Pengguna</h3>
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
            <form method="post" action="register">
            {{csrf_field()}}            
                <div class="form-group">
                    <label for="inputEmail">Alamat Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="inputConfirmPassword" placeholder="Konfirmasi Password">
                </div>
                <div class="form-group">
                    <label for="idNumber">Nomor Identitas</label>
                    <input type="text" name="noIdentitas"  class="form-control" id="idNumber" placeholder="KTP/SIM">
                </div>
                <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Nama">
                </div>
                <div class="from-group">
                    <label for="inputGender">Jenis Kelamin</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="jeniskelamin" id="inputGender" value="pria">
                        Pria
                      </label>
                      <label>
                        <input type="radio" name="jeniskelamin" id="inputGender" value="wanita">
                        Wanita
                      </label>
                    </div>
                </div>
                <div class="from-group">
                    <label for="inputAddress">Alamat</label>
                    <div>
                        <textarea  name="alamat" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <label for="inputJob">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" id="inputJob" placeholder="Pekerjaan">
                </div>
                <div class="from-group">
                    <label for="inputNationality">Kewarganegaraan</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="negara" id="inputNationality" value="wna">
                        WNA
                      </label>
                      <label>
                        <input type="radio" name="negara" id="inputNationality" value="wni">
                        WNI
                      </label>
                    </div>
                </div>
                </br>
                <div class="form-group">
                      <button type="submit" class="btn btn-info">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
