<?php
namespace App\Services;

use App\Services\Interfaces\CategoryServiceInterface;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    
    function paginate($limit,$request=null){
        return $this->categoryRepository->paginate($limit,$request);
    }

    function all($request=null){
        return $this->categoryRepository->all($request);
    }

    function find($id){
        return $this->categoryRepository->find($id);
    }

    function store($request){
        return $this->categoryRepository->store($request);
    }

    function update($request, $id){
        return $this->categoryRepository->update($request, $id);
    }

    function destroy($id){
        return $this->categoryRepository->destroy($id);
    }
}

?>