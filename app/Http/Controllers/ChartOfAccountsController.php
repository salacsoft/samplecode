<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;
use App\Repositories\chartofaccounts\ChartOfAccountInterface;

class ChartOfAccountsController extends Controller
{
    //
     // services
     protected $_chartofAccount;

     /** initialize the interface
      * call the init function in CoaTypeInterface to set the Model associated with it.
      * @param CoaTypeInterface
      * @return resource
      */
     public function __construct(ChartOfAccountInterface $chartofAccount) {
         $this->_chartofAccount = $chartofAccount ;
         $this->_chartofAccount->init();
     }


     /** Get all the records from the table except from soft deleted
      * @return mixed
      */
     public function all() {
         $response = $this->_chartofAccount->all();
         return $response;
     }


     /** Validate before storing the record on the table
      * @param StoreCoaTypeRequest
      * @return mixed
      */
     public function store(UpdateChartOfAccountRequest $request) {
         $response = $this->_chartofAccount->create($request);
         return $response;
     }


     /** Get the Record fromt the table
      * @param [integer] $id
      * @return [array] $response
      */
     public function edit($id) {
         $response = $this->_chartofAccount->find($id);
         return $response;
     }


     /** Validate before it will update the record on the table
      * @param UpdateCoaTypeRequest
      * @return mixed
      */
     public function update(UpdateChartOfAccountRequest $request, $id) {
         $response = [];
         $updated = (boolean) $this->_chartofAccount->update($request, $id);
         if ($updated) {
             $response = $this->_chartofAccount->find($id);
         }
         return $response;
     }


     /**Soft delete from the table
      * @param [integer] $id
      * @return no content
      */
     public function softDelete($id) {
         return $this->_chartofAccount->destroy($id);
     }


     /** Get all soft deleted records
      * @return mixed
      */
     public function allSoftDeleted(){
         return $this->_chartofAccount->trash();
     }


     /**Restore soft deleted record
      * @param [integer]  $id
      * @return array
      */
     public function restoreDeleted($id) {
         return $this->_chartofAccount->restore($id);
     }

}
