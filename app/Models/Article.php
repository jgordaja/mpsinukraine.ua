<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    //запрещено массовое назначение
    protected $guarded = [
        'id',
    ];

    public function top(): BelongsTo
    {
        return $this->belongsTo(Top::class);
    }
}
