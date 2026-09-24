<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    //
    // صاحب التذكرة
public function user()
{
    return $this->belongsTo(User::class);
}

// الرسائل داخل التذكرة
public function messages()
{
    return $this->hasMany(TicketMessage::class, 'ticket_id');
}
}
