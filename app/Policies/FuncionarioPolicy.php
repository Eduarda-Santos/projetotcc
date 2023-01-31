<?php

namespace App\Policies;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Facades\UserPermissions;

class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user) {
        return UserPermissions::isAuthorized('funcionarios.index');
    }
    public function view(User $user, Funcionario $funcionario) {
        return UserPermissions::isAuthorized('funcionarios.show');
    }
    public function create(User $user) {
        return UserPermissions::isAuthorized('funcionarios.create');
    }
    public function update(User $user, Funcionario $funcionario) {
        return UserPermissions::isAuthorized('funcionarios.edit');
    }
    public function delete(User $user, Funcionario $funcionario) {
        return UserPermissions::isAuthorized('funcionarios.destroy');
    }
}
