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
    *@var string email
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
    *@var string forgotToken
    */
    public function insertForgotToken($forgotToken){
      $insertForgotToken = User::findOrFail(Auth::user()->id);
      $insertForgotToken->forgotToken=$forgotToken;
      $insertForgotToken->save();
    }
    /**
    * Query untuk Validate token waktu get url buat reset password
    * @var string token
    */
    public function tokenValidate($token)
    {
      if(User::where('forgotToken','=',$token)->first() !=null){
        return 'token Exist';
      }else{
        return 'False token';
      }
    }


    /**
    * Query untuk change password
    * @var string email
    * @var string oldPassword
    * @var string newPassword
    */
    public function changePassword($email , $oldPassword , $newPassword){
      $user = User::where('email','=',$email)->first();
      // pertama ngecek old password yang dimasukin sama ga sama email dia
      if(Hash::check($oldPassword,Auth::user()->password)){
        // kalau berhasil maka bakal update password nya dengan password baru
        $user->password = bcrypt($newPassword);
        $user->save();
        return 'Berhasil ganti password';
      }else{
        // kalau old password yang dimasukin salah
        return 'Old Password does not match';
      }
    }
}
