@extends('template')
@section('content')
<body>
    <div class="col-md-offset-4">
        <div class="well well-lg" style="margin-top:10%; margin-left:1%; width:50%">
        <h3>Daftar Sebagai Perusahaan Advertising</h3>
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
            <form>
            {{csrf_field()}}
                <div class="form-group">
                    <label for="inputCoEmail">Alamat Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Alamat Email">
                </div>
                <div class="form-group">
                    <label for="inputCoPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputCoConfirmPassword">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Konfirmasi Password">
                </div>
                <div class="form-group">
                    <label for="idNoPenunjuk">Nomor Penunjukan</label>
                    <input type="text" class="form-control" id="idNoPenunjuk" placeholder="Nomor Penunjukan">
                </div>
                <div class="form-group">
                    <label for="inputCompanyName">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="inputCompanyName" placeholder="Nama Perusahaan">
                </div>
                <div class="from-group">
                    <label for="inputCompanyAddress">Alamat Perusahaan</label>
                    <div>
                        <textarea class="form-control" rows="3"></textarea>
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