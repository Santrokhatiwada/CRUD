<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'header', 'body','is_active','slug','image'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
     }
    
}
 