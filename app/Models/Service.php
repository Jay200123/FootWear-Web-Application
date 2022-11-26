<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $table = 'services';

    public $timestamps = false;

    protected $fillable = ['description','cost_price','sell_price','service_image'];
}
