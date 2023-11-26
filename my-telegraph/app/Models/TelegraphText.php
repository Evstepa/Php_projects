<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegraphText extends Model
{
    use HasFactory;

    /**
     * @var array <string>
     */
    protected $fillable = [
        'title',
        'text'
    ];

    /**
     * Обратная связь между вторичной (текущей) и первичной моделями
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
