<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
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
    ];

    public function getAttachmentCountAttribute($value)
    {
        return $this->attachments_count ?? 0;
    }
}
