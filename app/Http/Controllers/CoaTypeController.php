<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\coatypes\CoaTypeInterface;
use App\Http\Requests\StoreCoaTypeRequest;
use App\Http\Requests\UpdateCoaTypeRequest;

class CoaTypeController extends Controller
{

    // services
    protected $_coatype;

    /** initialize the interface
     * call the init function in CoaTypeInterface to set the Model associated with it.
     * @param CoaTypeInterface
     * @return resource
     */
    public function __construct(CoaTypeInterface $coatype) {
        $this->_coatype = $coatype ;
        $this->_coatype->init();
    }

    /** Get all the records from the table except from soft deleted
     * @return mixed
     */
    public function all() {
        $response = $this->_coatype->all();
        return $response;
    }


    /** Validate before storing the record on the table
     * @param StoreCoaTypeRequest
     * @return mixed
     */
    public function store(StoreCoaTypeRequest $request) {
        $response = $this->_coatype->create($request);
        return $response;
    }


    /** Get the Record fromt the table
     * @param [integer] $id
     * @return [array] $response
     */
    public function edit($id) {
        $response = $this->_coatype->find($id);
        return $response;
    }


    /** Validate before it will update the record on the table
     * @param UpdateCoaTypeRequest
     * @return mixed
     */
    public function update(UpdateCoaTypeRequest $request, $id) {
        $response = [];
        $updated = (boolean) $this->_coatype->update($request, $id);
        if ($updated) {
            $response = $this->_coatype->find($id);
        }
        return $response;
    }


    /**Soft delete from the table
     * @param [integer] $id
     * @return no content
     */
    public function softDelete($id) {
        return $this->_coatype->destroy($id);
    }


    /** Get all soft deleted records
     * @return mixed
     */
    public function allSoftDeleted(){
        return $this->_coatype->trash();
    }


    /**Restore soft deleted record
     * @param [integer]  $id
     * @return array
     */
    public function restoreDeleted($id) {
        return $this->_coatype->restore($id);
    }




}
