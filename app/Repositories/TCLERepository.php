<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 07/08/15
 * Time: 01:36
 */

namespace App\Repositories;


use App\TCLE;

class TCLERepository {

    public function findAll()
    {
        return TCLE::all();
    }

    public function findAllByUserId($user_id){
        return TCLE::where('user_id', '=', $user_id)->paginate(3);
    }

    public function findAllPaginate()
    {
        return TCLE::paginate(3);
    }

    public function findById($id)
    {
        return TCLE::find($id);
    }

    public function save($data){
        return TCLE::create($data);
    }

    public function update($data, $id)
    {
        $tcle = $this->findById($id);

        return $tcle->update($data, $id);
    }

    public function delete($id)
    {
        return TCLE::destroy($id);
    }

    public function findByNome($paciente){
        return TCLE::where('paciente', 'like', $paciente . '%')->get();
    }
}