<?php
namespace App\Services;

use App\Services\Interfaces\CustomerServiceInterface;

use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepository;

    function __construct(CustomerRepositoryInterface $customerRepository){
        $this->customerRepository = $customerRepository;
    }
    
    function paginate($limit,$request=null){
        return $this->customerRepository->paginate($limit,$request);
    }

    function all($request){
        return $this->customerRepository->all($request);
    }

    function find($id){
        return $this->customerRepository->find($id);
    }

    function store($request){
        return $this->customerRepository->store($request);
    }

    function update($request, $id){
        return $this->customerRepository->update($request, $id);
    }

    function destroy($id){
        return $this->customerRepository->destroy($id);
    }
}

?>