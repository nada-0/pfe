<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'category_user');
    }
}
