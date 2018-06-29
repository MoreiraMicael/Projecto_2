<?php

use Illuminate\Database\Seeder;
use App\Denuncia;

class DenunciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $denuncia = new Denuncia();
      //$user_id = Auth::user()->id;
      $denuncia->user_id = '1';
      $denuncia->local = 'Denuncia Anonima';
      $denuncia->descricao = ('Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sunt in culpa qui officia deserunt mollit anim id est laborum.');
      $denuncia->anonimo = 'on';
      $denuncia->save();

      $denuncia2 = new Denuncia();
      //$user_id = Auth::user()->id;
      $denuncia2->user_id = '1';
      $denuncia2->local = 'Denuncia Nao Anonima';
      $denuncia2->descricao = ('Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sunt in culpa qui officia deserunt mollit anim id est laborum.');
      $denuncia2->anonimo = 'off';
      $denuncia2->save();
    }
}
