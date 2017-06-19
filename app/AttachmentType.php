<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachmentType extends Model
{
    public function attachments()
    {
        return $this->hasMany('App\Attachment');
    }
}
