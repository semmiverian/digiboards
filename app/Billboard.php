<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    protected $fillable=['nama','lokasi','latitude','longitude','ukuran','permukaan','status','view','jenis','fasilitas' ];
}
