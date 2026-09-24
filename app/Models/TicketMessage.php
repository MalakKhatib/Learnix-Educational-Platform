<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    //
    // التذكرة
public function ticket()
{
    return $this->belongsTo(Support::class, 'ticket_id');
}

// المرسل
public function sender()
{
    return $this->belongsTo(User::class, 'sender_id');
}
}
