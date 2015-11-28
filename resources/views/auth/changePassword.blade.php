@extends('template')
@section('content')
<body>
    <div class="col-md-offset-4">
        <div class="well well-lg" style="margin-top:10%; margin-left:1%; width:50%">
        <h3>Change Password</h3>
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
            <form method="post" action="changePassword">
              {{csrf_field()}}
              <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan Email Anda">
              </div>
              <div class="form-group">
                  <label for="inputOldPass">Password Lama</label>
                  <input type="password" name="oldPassword" class="form-control" id="inputOldPassword" placeholder="Masukkan Password Lama">
              </div>
              <div class="form-group">
                  <label for="inputNewPass">Password Baru</label>
                  <input type="password" name="newPassword" class="form-control" id="inputNewPassword" placeholder="Masukkan Password Baru">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Send</button>
              </div>
            </form>
        </div>
    </div>
</body>
@endsection
