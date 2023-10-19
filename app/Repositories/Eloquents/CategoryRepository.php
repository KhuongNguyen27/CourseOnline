<?php
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Eloquents\EloquentRepository;
use Illuminate\Support\Facades\Storage;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface{

    function getModel(){
        return Category::class;
    }

    function store($data){
        if (isset($data['image_url']) && $data['image_url']->isValid()) {
            $path = $data['image_url']->store('public/category');
            $url = Storage::url($path);
            $data['image_url'] = $url;
        } else {
            $data['image_url'] = 'assets/apple-touch-icon.png';
        }
        return $this->model->create($data);
    }

    function destroy($id){
        $item = $this->model->find($id);
        // $get_img = $item->image_url;
        // if (file_exists($get_img)) {
        //     unlink($get_img);
        // }
        return $item->delete();
    }

    function update($data, $id){
        if (isset($data['image_url']) && $data['image_url']->isValid()) {
            $path = $data['image_url']->store('public/category');
            $url = Storage::url($path);
            $data['image_url'] = $url;
        } else {
            $data['image_url'] = 'assets/apple-touch-icon.png';
        }
        return $this->model->where('id', $id)->update($data);
    }
    /* 
    - Lớp trừa tượng PostRepository kế thừa lớp EloquentRepository
    nên không cẩn phải triển lại các hàm trừa tượng của PostReponsitoryInterface
    - Khi thêm phương thức mới cần thêm ở PostReponsitory trước và triển khai lại ở đây
    - Có thể ghi đè lại
    */
    
}
?>