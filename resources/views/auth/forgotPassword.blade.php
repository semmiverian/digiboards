@extends('template')
@section('content')
<body>
	<div style="margin-top:7%; margin-left:7%; margin-right:7%">
        <div class="jumbotron">
        <div class="container">
           <form method="post" action="forgotPassword">
              {{csrf_field()}}
              <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan Email Anda">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Send</button>
              </div>
          </form>
          </div>
        </div>
    </div>
</body>
@stop
