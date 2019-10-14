<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFixedAssetRequest;
use App\Http\Requests\UpdateFixedAssetRequest;
use App\Repositories\fixedassets\FixedAssetInterface;

class FixedAssetController extends Controller
{
    // services
    protected $_interface;

    /** initialize the interface
     * call the init function in FixedAssetInterface to set the Model associated with it.
     * @param FixedAssetInterface
     * @return resource
     */
    public function __construct(FixedAssetInterface $interface) {
        $this->_interface = $interface ;
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
     * @param StoreFixedAssetRequest
     * @return mixed
     */
    public function store(StoreFixedAssetRequest $request) {
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
     * @param UpdateFixedAssetRequest
     * @return mixed
     */
    public function update(UpdateFixedAssetRequest $request, $id) {
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
