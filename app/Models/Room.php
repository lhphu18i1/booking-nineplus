<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $table = 'rooms';
    protected $fillable = [
        'title',
        'date',
        'time_start',
        'time_end',
        'amount_of_people',
        'user_id',
        'room_list_id',
    ];
    protected $primaryKey = 'id';

    public function room_list()
    {
        return $this->belongsTo(Room_list::class, 'room_list_id', 'id');
    }


}
