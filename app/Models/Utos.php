<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utos extends Model
{
    protected $fillable = ['utos_id', 'user_id', 'site_id'];
    public $timestamps = false;
    use HasFactory;
}
