<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_History extends Model
{
    protected $table = 'ticket_history';
    protected $primaryKey = 'id';
    protected $fillable = ['id_ticket', 'nbrTimeOpened'];
    use HasFactory;
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
