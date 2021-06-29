<?php

namespace ZigKart\Models;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboxMessage extends Model
{
    use HasFactory;
    
    protected $table ='inbox_message';
    protected $fillable = [
        'inbox_id',
        'sender_id',
        'receiver_id',
        'message',
        'is_receiver_read'
    ];

}
