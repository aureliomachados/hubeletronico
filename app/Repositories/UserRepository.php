<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 05/08/15
 * Time: 23:09
 */

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository {

    public function findAll()
    {
        return User::all();
    }

    public function findAllMedicos()
    {
        User::where('type', '=', 'Médico')->get();
    }

    public function findAllMedicosPaginate(){
        User::where('type', '=', 'Médico')->paginate(3);
    }

    public function findAllPaginate()
    {
        return User::paginate(3);
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function save($data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => 'Médico',
            'crm' => $data['crm'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function update($data, $id)
    {
        $user = $this->findById($id);

        return $user->update($data);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function findByCRM($crm){
        return User::where('crm', 'like', $crm)->get();
    }
}