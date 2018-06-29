<?php

namespace App;

use App\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function denuncia(){ //$denuncia->user->name
      return $this->hasMany(Denuncia::class);
    }

    // A user can send a message
    public function sent()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // A user can also receive a message
    public function received()
    {
        return $this->hasMany(Message::class, 'sent_to_id');
    }

    //Auth::user()->sendMessageTo($request->recipient, $request->subject, $request->body);

    public function sendMessageTo($recipient, $message, $subject)
    {
      Auth::user()->sendMessageTo($request->recipient, $request->subject, $request->body);

        return $this->sent()->create([
            'body'       => $message,
            'subject'    => $subject,
            //'sender_id'  => Auth::user()->id,
            'sent_to_id' => $recipient,
        ]);
    }

    /*public function is($roleName)
    {
        foreach (Auth::user()->role as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }*/
}
