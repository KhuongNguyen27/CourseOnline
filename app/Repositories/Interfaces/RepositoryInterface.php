<?php
namespace App\Repositories\Interfaces;

interface RepositoryInterface{
    function all($request = []);
    function find($id);
    function store($request);
    function update($request,$id);
    function destroy($id);
    function paginate($limit,$request = []);
}
?>