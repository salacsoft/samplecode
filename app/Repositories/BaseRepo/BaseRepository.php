<?php
namespace App\Repositories\BaseRepo;

class BaseRepository implements BaseInterface {

    protected $model;

    /**
     * Get 1 record from the table
     * @param [integer] $id
     * @return JSON
     */
    public function find($id) {
        return $this->model->findOrFail($id);
    }

    /** Get All the records from the table
     * return JSON
    */
    public function all() {
        return $this->model->all();
    }

    /** Store record on the table
     * @param [resource] $request
     * @return JSON
     */
    public function create($request) {
        return $this->model->create($request->only($this->model->getFillable()));
    }

    /** Update record on the table
     * @param [resource] $request
     * @return [boolean]
     */
    public function update($request, $id) {
        $data = $request->only($this->model->getFillable());
        return $this->model->findOrFail($id)->update($data);
    }

    /** Get record using key value pair
     * @param [string] $key
     * @param [mixed] $value
     * @return JSON
     */
    public function findByKeyValue($key,$value) {
        $this->model->where($key, $value)->get();
    }

    /** Removed record from the table (soft delete)
     * @param [integer] $id
     * @return [boolean] no content
     */
    public function destroy($id) {
        $this->model->findOrFail($id);
        return $this->model->destroy($id);
    }

    /** Restore soft deleted record from the table
     * @param [integer] $id
     * @return [boolean]
     */
    public function restore($id) {
        $data = $this->model->withTrashed()->findOrFail($id);
        $restored =  $data->restore();
        if ($restored)
            return $this->model->findOrFail($id);
    }

    /** Get all the soft deleted records from the table
     * @return JSON
     */
    public function trash() {
        return $this->model->onlyTrashed()->get();
    }

}
