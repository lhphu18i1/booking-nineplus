<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room_List extends Model
{
    use HasFactory;

    public $table = 'room_lists';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';

    /**
     * Get all of the comments for the Room_list
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room(): HasMany
    {
        return $this->hasMany(Room::class, 'room_list_id', 'id');
    }
}
