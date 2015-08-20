<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 05/08/15
 * Time: 23:13
 */

namespace App\Services;


use App\Repositories\UserRepository;

class UserService {

    private $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findAllPaginate()
    {
        return $this->repository->findAllPaginate();
    }

    public function findAllMedicos()
    {
        return $this->repository->findAllMedicos();
    }

    public function findAllMedicosPaginate(){
        return $this->repository->findAllMedicosPaginate();
    }

    public function findById($id)
    {
        $user = $this->repository->findById($id);

        if(is_null($user)){
            return abort(404);
        }
        return $user;
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

    public function findByCRM($crm){

        if(is_null($crm)) abort(404);
        return $this->repository->findByCRM($crm);
    }
}