<?php

namespace App\Repositories\chartofaccounts;
use App\Repositories\BaseRepo\BaseRepository;
use App\Models\ChartOfAccount;

class  ChartOfAccountRepository extends BaseRepository implements ChartOfAccountInterface {

    //Set model
    public function init() {
        $this->model = new ChartOfAccount;
    }

}
