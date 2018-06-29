<?php

namespace App\Http\Controllers;

use App\User;
use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function destroy($id)
  {
    //$user->authorize('destroy', $denuncia);
    //$id = $denuncia->id;
    //$denuncia = Denuncia::findOrFail('id', $id);
    //$denuncia->delete();
    //DB::table('denuncias')->where('id', $denuncia->id)->delete();
    $user = User::where('id', $id);
    $user->delete();
    return redirect('/admin');
  }

  public function roleChange($id, $role)
  {
    DB::table('users')
            ->where('id', $id)
            ->update(['role' => $role]);
    //$denuncia = Denuncia::where('id', $id);
    //$denuncia->update('aprovada', '1');
    //$denuncia->save();
    return redirect ('/menuAdmin')->with('success', 'Success');
  }

  public function update($id, $name, $email, $telefone, $sexo)
  {
    DB::table('users')
            ->where('id', $id)
            ->update(['nome' => $name]);
            ->update(['email' => $email]);
            ->update(['telefone' => $telefone]);
            ->update(['sexo' => $sexo]);
    //$denuncia = Denuncia::where('id', $id);
    //$denuncia->update('aprovada', '1');
    //$denuncia->save();
    return redirect ('/perfil')->with('success', 'Success');
  }
}
