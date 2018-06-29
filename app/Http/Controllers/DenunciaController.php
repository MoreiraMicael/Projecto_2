<?php

namespace App\Http\Controllers;

use App\User;
use App\Denuncia;
use Auth;
use DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidateDenuncia;

class DenunciaController extends Controller
{
  public function index(){
    $denuncia = \App\Denuncia::all();
    return view('denuncia', ['denuncia' => $denuncia]);
  }

  public function show(denuncia $id)
  {
    return view('denuncia', ['denuncia' => $id]);
  }

  public function create()
  {
    return view('novaDenuncia');
  }

  public function validator(Request $request){
    return Validator::make($request, [
      'user_id' => 'required',
      'local' => 'required|string|max:255',
      'descricao' => 'required|string|max:255',
    ]);
  }

  public function store()
  {
    $denuncia = new Denuncia;
    $denuncia->user_id = Auth::user()->id;
    $denuncia->local = request('localOcorrencia');
    $denuncia->descricao = request('descricaoOcorrencia');
    $denuncia->anonimo = request('anonimo');
    $denuncia->save();
    return redirect('/');
  }

  public function destroy($id)
  {
    //$user->authorize('destroy', $denuncia);
    //$id = $denuncia->id;
    //$denuncia = Denuncia::findOrFail('id', $id);
    //$denuncia->delete();
    //DB::table('denuncias')->where('id', $denuncia->id)->delete();
    $denuncia = Denuncia::where('id', $id);
    $denuncia->delete();
    return redirect('/denuncia');
  }

  public function aprove($id)
  {
    DB::table('denuncias')
            ->where('id', $id)
            ->update(['aprovada' => "aprovada"]);
    //$denuncia = Denuncia::where('id', $id);
    //$denuncia->update('aprovada', '1');
    //$denuncia->save();
    return redirect ('/denuncia')->with('success', 'Success');
  }
  public function deaprove($id)
  {
    DB::table('denuncias')
            ->where('id', $id)
            ->update(['aprovada' => "naoAprovada"]);
    return redirect ('/denuncia')->with('success', 'Success');
  }

  public function takeCharge($id)
  {
    DB::table('denuncias')
            ->where('id', $id)
            ->update(['ps_id' => Auth::user()->id]);
    return redirect ('/denunciaApropriadas')->with('success', 'Success');
  }

  /*public function getClone($id) {
  $denuncia = Denuncia::where('id', $id);
  $denuncia_aprovada = $denuncia->replicate();
  $denuncia_aprovada->save();

  return redirect ('/denuncia')->with('success', 'Success');

}*/
}
