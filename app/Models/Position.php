<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $table = 'positions';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';
}
