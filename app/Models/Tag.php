<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Tags\Tag as Model;

class Tag extends Model
{
    use HasFactory;

    protected $connection = 'main';
}
