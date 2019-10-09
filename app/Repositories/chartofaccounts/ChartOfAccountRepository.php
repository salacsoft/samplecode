<?php

namespace App\Repositories\chartofaccounts;
use App\Repositories\BaseRepo\BaseRepository;
use App\Models\ChartOfAccount;

class  ChartOfAccountRepository extends BaseRepository implements ChartOfAccountInterface {

    public function init() {
        $this->model = new ChartOfAccount;
    }

}
