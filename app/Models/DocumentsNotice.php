<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentsNotice extends Model
{
    protected $table = 'accommodation';
    protected $fillable = [
        'title',
        'document_name',
        'short_description',
        'icon',
        'image',
        'description',
        'content',
        'status',
    ];
}
