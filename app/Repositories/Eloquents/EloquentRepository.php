<?php
namespace App\Repositories\Eloquents;

// use App\Repositories\Interfaces\Interfaces;
use App\Repositories\Interfaces\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface{
    protected $model;
    
    function __construct(){
        $this->setModel();
    }

    abstract function getModel();
    
    function setModel(){
        $this->model = app()->make($this->getModel());
    }

    function all($request){
        $result = $this->model->all();
        return $result;
    }

    function paginate($limit,$request = []){
        return $this->model->paginate($limit);
    }

    function find($id){
        return $this->model->find($id);
    }

    function store($data){
        return $this->model->create($data);
    }
    
    function update($data, $id){
        return $this->model->findOrFail($id)->update($data);
    }

    function destroy($id){
        return $this->model->destroy($id);
    }
}
?>