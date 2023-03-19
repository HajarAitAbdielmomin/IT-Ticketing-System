<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{   
    protected $table = 'ticket_status';
    protected $primaryKey = 'id';
    protected $fillable = ['status'];
    use HasFactory;

    public function ticketsStatus(){
        return $this->hasMany(Ticket::class, 'id', 'status');
    }
}
