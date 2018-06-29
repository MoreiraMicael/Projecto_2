<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = 'utente';
      $user->email = 'utente@exemplo.com';
      $user->password = bcrypt('utente');
      $user->save();

      $ps = new User();
      $ps->name = 'Profissional de Saúde';
      $ps->email = 'profissional@exemplo.com';
      $ps->password = bcrypt('profissional');
      $ps->save();

      $admin = new User();
      $admin->name = 'admin';
      $admin->email = 'admin@exemplo.com';
      $admin->password = bcrypt('123123');
      $admin->save();
    }
}
