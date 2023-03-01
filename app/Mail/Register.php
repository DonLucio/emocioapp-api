<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class Register extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(user $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $clave = substr(str_shuffle($permitted_chars), 0, 10);

        $data = User::where('email', '=', $this->user->email)->first();
        $data->password = bcrypt($clave);
        $data->update();


        return $this
        ->subject('Registro de nuevo usuario emocioapp!')
        ->markdown('emails.register.user', [
            'nombres' => ucwords($this->user->nombres),
            'apellidos' => ucwords($this->user->apellidos),
            'clave' => $clave
        ]);
    }
}
