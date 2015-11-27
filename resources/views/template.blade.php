<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Ku</title>
<link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" />

<!--code map-->
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">

<style>
    h1{
      text-align: center;
    }
    #peta {
      height: 574px;
      width: 1000px;
      margin:auto;
      
    }
</style>
</head>

<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="row col-lg-1 col-lg-4">
    <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{URL('home')}}">
            <img id="brand-image" alt="Brand" class="img-rounded" src="{{('image/logoWeb.png')}}">
          </a>
        </div>
    </div>
    </div>
    <div class="row col-lg-7 co-xs-6">
      <div class="container">
        <ul class="nav nav-pills" style="margin:1%">
              
          <li role="presentation" @yield('classHome')><a href="{{URL('home')}}"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
          <li role="presentation" @yield('classAboutUs')><a href="{{URL('aboutUs')}}"><span class="glyphicon glyphicon-phone"></span> Tentang Kami</a></li>
                
                @if(!Auth::user())
                <!-- kalau ini yang belum login -->
                <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Masuk <b class="caret"></b></a>
                 <ul class="dropdown-menu" style="width:300%">
                  <div style="margin:5%">
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
                       <form method="post" action="auth/login">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline"><input type="checkbox" value="">Ingatkan Saya</label>
                                <a href="{{URL('auth/forgotPassword')}}">Lupa Password?</a>
                            </div>
                            <div class="form-group">
                                  <button type="submit" class="btn btn-success">Masuk</button>
                            </div>
                       </form>
                       <div class="form-group">
                        <li role="separator" class="divider"></li>
                        <li><label>Daftarkan Diri Anda</label></li>
                        <li><a href="{{URL('auth/register')}}">Registrasi</a></li>
                       </div>
                   </div>
                 </ul>
              </li>
              @elseif(Auth::user()->role=='member')
               <!--  ini nampilin nama user yang udah login -->
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> {{Auth::user()->name}} <b class="caret"></b></a>
                 <ul class="dropdown-menu" style="width:300%">
                        <li><a href="{{URL('auth/changePassword')}}">Change Password</a></li>
                        <li><a href="{{URL('auth/upgradeAccount')}}">Upgrade Account</a></li>
                        <li><a href="{{URL('orderList')}}">Order List</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="{{URL('auth/logout')}}">Logout</a></li>
                 </ul>
              </li>
              @elseif(Auth::user()->role=='merchant')
               <!--  ini nampilin nama user yang udah login -->
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> {{Auth::user()->name}} <b class="caret"></b></a>
                 <ul class="dropdown-menu" style="width:300%">
                        <li><a href="{{URL('auth/changePassword')}}">Change Password</a></li>
                        <li><a href="{{URL('orderList')}}">Order List</a></li>
                        <li><a href="{{URL('billboardList')}}">Billboard List</a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="{{URL('auth/logout')}}">Logout</a></li>
                 </ul>
              </li>
              @else
               <!--  ini nampilin nama user yang udah login -->
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> {{Auth::user()->name}} <b class="caret"></b></a>
                 <ul class="dropdown-menu" style="width:300%"><!-- 
                        <li><a href="{{URL('auth/changePassword')}}">Change Password</a></li>
                        <li><a href="{{URL('auth/upgradeAccount')}}">Upgrade Account</a></li>
                        <li><a href="{{URL('orderList')}}">Order List</a></li>
                        <li><a href="{{URL('billboardList')}}">Billboard List</a></li> -->

                        <li role="separator" class="divider"></li>
                        <li><a href="{{URL('auth/logout')}}">Logout</a></li>
                 </ul>
              </li>
              @endif
      </ul>
      </div>
    </div>
    <div class="row col-xs-12 col-md-4">
        <div class="container" style="margin:1%; margin-left:45%">
          <form class="navbar-form" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Cari">
          </div>
          <button type="submit" class="btn btn-default">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari
                </button>
      </form>
        </div>
    </div>    
  </nav>
    
<!-- include javascript, jQuery FIRST -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</header>

<section>
  @yield('content')
</section>

<footer>
</footer>

</html>