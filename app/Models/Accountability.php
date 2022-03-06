<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accountability extends Model
{
    protected $table = 'accountability';
    protected $fillable = [
        'title',
        'short_description',
        'icon',
        'image',
        'background',
        'description',
        'video_url',
        'content',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(AccountabilityItems::class, 'accountability_id');
    }
}
