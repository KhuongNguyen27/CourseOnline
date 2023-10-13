<?php
namespace App\Repositories\Eloquents;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryInterface{
    function getModel(){
        return Customer::class;
    }

    /* 
    - Lớp trừa tượng PostRepository kế thừa lớp EloquentRepository
    nên không cẩn phải triển lại các hàm trừa tượng của PostReponsitoryInterface
    - Khi thêm phương thức mới cần thêm ở PostReponsitory trước và triển khai lại ở đây
    - Có thể ghi đè lại
    */
    
}
?>