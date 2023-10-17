<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface{
    function getModel(){
        return Category::class;
    }

    /* 
    - Lớp trừa tượng PostRepository kế thừa lớp EloquentRepository
    nên không cẩn phải triển lại các hàm trừa tượng của PostReponsitoryInterface
    - Khi thêm phương thức mới cần thêm ở PostReponsitory trước và triển khai lại ở đây
    - Có thể ghi đè lại
    */
    
}
?>