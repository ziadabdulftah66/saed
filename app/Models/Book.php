<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Book extends Model
{
    use HasFactory;
    protected $table='books';
    protected $fillable=['name','price'];
}
