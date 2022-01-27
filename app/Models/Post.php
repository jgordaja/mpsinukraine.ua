<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    //запрещено массовое назначение
    protected $guarded = [
        'id',
    ];

    //акцессор для изменения формата выводимой даты
    public function getDateAttribute($value)
    {
        $date = Carbon::parse($value);

        return $date->format('d.m.Y');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function top(): BelongsTo
    {
        return $this->belongsTo(Top::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
