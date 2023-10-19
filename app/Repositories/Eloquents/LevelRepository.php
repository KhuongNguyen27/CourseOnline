<?php
namespace App\Repositories\Eloquents;

use App\Models\Level;
use App\Repositories\Interfaces\LevelRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;

class LevelRepository extends EloquentRepository implements LevelRepositoryInterface{
    function getModel(){
        return Level::class;
    }
    public function store($data)
    {

        return $this->model->create($data);
    }
    public function update($data, $id)
    {
        return $this->model->where('id', $id)->update($data);
        // return $this->model->where('id', $id)->update($data);
    }
    /* 
    - Lớp trừa tượng PostRepository kế thừa lớp EloquentRepository
    nên không cẩn phải triển lại các hàm trừa tượng của PostReponsitoryInterface
    - Khi thêm phương thức mới cần thêm ở PostReponsitory trước và triển khai lại ở đây
    - Có thể ghi đè lại
    */
    
}
?>