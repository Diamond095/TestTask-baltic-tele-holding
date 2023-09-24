<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  public function scopeAvailable($query)
  {
    return $query->where('status', 'available');
  }
  protected $fillable = [
    'name', 'article', 'status'
  ];
  protected $casts = [
    'data' => 'array',
];

  
}
