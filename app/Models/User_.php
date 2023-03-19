<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class User_ extends Model
{
   
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['fullname', 'email', 'password','adresse','phone','role','image'];
    use HasFactory;

    public function messagesCli()
    {
        return $this->hasMany(Ticket_Replies::class, 'id_Creator','id');
    }
    public function messagesRep()
    {
        return $this->hasMany(Ticket_Replies::class, 'id_Rep','id');
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_creator','id');
    }
}
