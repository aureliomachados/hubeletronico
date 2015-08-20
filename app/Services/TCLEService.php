<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 07/08/15
 * Time: 01:36
 */

namespace App\Services;


use App\Repositories\TCLERepository;

class TCLEService {

    private $repository;

    public function __construct(TCLERepository $repository){
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findAllByUserId($user_id){
        return $this->repository->findAllByUserId($user_id);
    }

    public function findAllPaginate()
    {
        return $this->repository->findAllPaginate();
    }

    public function findById($id)
    {

        $tcle = $this->repository->findById($id);

        if(is_null($tcle)){
            return abort(404);
        }

        return $tcle;
    }

    public function save($data){
        return $this->repository->save($data);
    }

    public function update($data, $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function findByNome($paciente){

        if(is_null($paciente)) abort(404);

        return $this->repository->findByNome($paciente);
    }
}