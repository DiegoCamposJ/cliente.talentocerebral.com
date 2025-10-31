<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class UsuariosNotificaciones extends Command
{

  protected $signature = 'notificaciones:usuarios';


  protected $description = 'Email a usuarios';


  public function __construct()
  {
    parent::__construct();
  }


  public function handle()
  {

    $nombre ="Fernando Campos";
    $ci="1715930168";
    $email="diegocamposj@hotmail.com";

    $details = [
        'nombre'    => $nombre,
        'password'  => $ci,
        'email'     => $email,
     ];

     \Mail::to($email)
        ->cc('diegocamposec@gmail.com')
        ->send(new \App\Mail\UsuarioCreado($details));


  }
}
