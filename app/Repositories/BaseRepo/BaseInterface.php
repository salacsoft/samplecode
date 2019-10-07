<?php

namespace App\Repositories\BaseRepo;

Interface BaseInterface {

    public function find($id);
    public function all();
    public function create($request);
    public function update($request, $id);
    public function findByKeyValue($key,$value);
    public function destroy($id);
    public function restore($id);
    public function trash();

}
