<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Replies extends Model
{
    protected $table = 'ticket_replies';
    protected $primaryKey = 'id';
    protected $fillable = ['id_Creator', 'id_Rep', 'id_ticket','messageRep','messageCli'];
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User_::class,'id_Creator');
    }

    public function rep()
    {
        return $this->belongsTo(User_::class,'id_Rep');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'id_ticket');
    }
    
}
