<?php

namespace App\Repositories\coatransactions;
use App\Repositories\BaseRepo\BaseRepository;
use App\Models\CoaTransaction;

class  CoaTransactionRepository extends BaseRepository implements CoaTransactionInterface {

    //Set model
    public function init() {
        $this->model = new CoaTransaction;
    }

}
