<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $table = 'mensagens';

    protected $fillable = ['mensagem'];


    public function users()
    {
    return $this->belongsToMany(User::class, 'mensagem_user', 'mensagem_id', 'user_id');
    }
}
