<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'to_email',
        'subject',
        'message',
        'status',
        'sent_at',
        'attachment_count'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'attachment_count' => 'integer'
    ];
}
