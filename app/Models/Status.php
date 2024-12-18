<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;

    //запретить массовое назначение
    protected $guarded = [
        'id',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


}
