<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Hash;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','noIdentitas','jeniskelamin','alamat','pekerjaan','negara','forgotToken'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
    * Query validasi email yang di masukkin ketika forgot password
    *
    */
    public function findEmail($email){
      if(User::where('email','=',$email)->first() !=null){
        return true;
      }else{
        return false;
      }
    }

    /**
    * Query untuk masukkin token yang nanti bisa di akses buat forgot password
    *
    */
    public function insertForgotToken($forgotToken){
      $insertForgotToken = User::findOrFail(Auth::user()->id);
      $insertForgotToken->forgotToken=$forgotToken;
      $insertForgotToken->save();
    }

    public function tokenValidate($token)
    {
      if(User::where('forgotToken','=',$token)->first() !=null){
        return 'token Exist';
      }else{
        return 'False token';
      }

    }
}
