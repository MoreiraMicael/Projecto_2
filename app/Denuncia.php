<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{

  protected $fillable = [
        'local', 'descricao', 'anonimo', 'aprovada', 'ps_id',
    ];

    protected $hidden = [
        'id', 'user_id',
    ];


  public function user(){ //$denuncia->user->name
    return $this->belongsTo(User::class);
  }
}
