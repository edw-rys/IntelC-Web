<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountabilityItems extends Model
{
    protected $table = 'accountability_items';
    protected $fillable = [
        'icon',
        'image',
        'description',
        'video_url',
        'status',
        'accountability_id'
    ];
    public function service()
    {
        return $this->belongsTo(Accountability::class, 'accountability_id');
    }
}
