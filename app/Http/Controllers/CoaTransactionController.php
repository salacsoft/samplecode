<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCoaTransactionRequest;
use App\Http\Requests\UpdateCoaTransactionRequest;
use App\Repositories\coatransactions\CoaTransactionInterface;

class CoaTransactionController extends Controller
{
    // services
    protected $_interface;

    /** initialize the interface
     * call the init function in CoaTransactionInterface to set the Model associated with it.
     * @param CoaTransactionInterface
     * @return resource
     */
    public function __construct(CoaTransactionInterface $coatransaction) {
        $this->_interface = $coatransaction ;
        $this->_interface->init();
    }


    /** Get all the records from the table except from soft deleted
     * @return mixed
     */
    public function all() {
        $response = $this->_interface->all();
        return $response;
    }


    /** Validate before storing the record on the table
     * @param StoreCoaTransactionRequest
     * @return mixed
     */
    public function store(StoreCoaTransactionRequest $request) {
        $response = $this->_interface->create($request);
        return $response;
    }


    /** Get the Record fromt the table
     * @param [integer] $id
     * @return [array] $response
     */
    public function edit($id) {
        $response = $this->_interface->find($id);
        return $response;
    }


    /** Validate before it will update the record on the table
     * @param UpdateCoaTransactionRequest
     * @return mixed
     */
    public function update(UpdateCoaTransactionRequest $request, $id) {
        $response = [];
        $updated = (boolean) $this->_interface->update($request, $id);
        if ($updated) {
            $response = $this->_interface->find($id);
        }
        return $response;
    }


    /**Soft delete from the table
     * @param [integer] $id
     * @return no content
     */
    public function softDelete($id) {
        return $this->_interface->destroy($id);
    }


    /** Get all soft deleted records
     * @return mixed
     */
    public function allSoftDeleted(){
        return $this->_interface->trash();
    }


    /**Restore soft deleted record
     * @param [integer]  $id
     * @return array
     */
    public function restoreDeleted($id) {
        return $this->_interface->restore($id);
    }
}
