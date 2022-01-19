<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    //use HasFactory;
    // protected $table = 'wifi';
    protected $table = 'wifi';

    protected $fillable = ['id_wifi', 'nama_wifi','lokasi','status'];
}
