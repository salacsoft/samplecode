<?php

namespace App\Repositories\fixedassets;
use App\Models\Inventory;
use App\Models\FixedAssetDepreciation;
use App\Repositories\BaseRepo\BaseRepository;

Class FixedAssetRepository extends BaseRepository implements FixedAssetInterface {

    //Set model
    public function init() {
        $this->model = new Inventory;
        $this->depreciation = new FixedAssetDepreciation;
    }
}
