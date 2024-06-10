<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'location', 'type', 'user_id', 'end_time'];

    protected $dates = ['date', 'end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
