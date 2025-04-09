<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $fillable =[
        'titre',
        'description',
    ];
    public function user()
{
    return $this->belongsTo(User::class); // Un Post appartient à un User
}
public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
