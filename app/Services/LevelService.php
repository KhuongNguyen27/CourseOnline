<?php
namespace App\Services;

use App\Services\Interfaces\LevelServiceInterface;

use App\Repositories\Interfaces\LevelRepositoryInterface;

class LevelService implements LevelServiceInterface{
    protected $levelRepository;

    function __construct(LevelRepositoryInterface $levelRepository){
        $this->levelRepository = $levelRepository;
    }
    
    function paginate($limit,$request=null){
        return $this->levelRepository->paginate($limit,$request);
    }

    function all($request){
        return $this->levelRepository->all($request);
    }

    function find($id){
        return $this->levelRepository->find($id);
    }

    function store($request){
        return $this->levelRepository->store($request);
    }

    function update($request, $id){
        return $this->levelRepository->update($request, $id);
    }

    function destroy($id){
        return $this->levelRepository->destroy($id);
    }
}