<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_;

class Ticket extends Model
{   protected $table = 'ticket';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'topic_ticket', 'file_description','create_date','reopened_date','closed_date','id_creator','status','closedby'];
    use HasFactory;
   

    public function st()
    {
        return $this->belongsTo(Status::class,'status');
    }
    public function messagesT()
    {
        return $this->hasMany(Ticket_Replies::class, 'id', 'id_ticket');
    }
    public function creator()
    {
        return $this->belongsTo(User_::class,'id_creator');
    }

    public function closedBy()
    {
        return $this->belongsTo(User_::class);
    }

  

}
