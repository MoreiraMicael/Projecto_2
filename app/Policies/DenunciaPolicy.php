<?php

namespace App\Policies;

use App\User;
use App\Denuncia;
use Illuminate\Auth\Access\HandlesAuthorization;

class DenunciaPolicy
{
  use HandlesAuthorization;

  /**
  * Create a new policy instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  public function destroy(User $user, Denuncia $denuncia)
  {
    return $user->id == $denuncia->user_id;
  }
}
