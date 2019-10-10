<?php

namespace App\Repositories\inventories;
use App\Models\Inventory;
use App\Repositories\BaseRepo\BaseRepository;

Class InventoryRepository extends BaseRepository implements InventoryInterface {

        //Set model
        public function init() {
            $this->model = new Inventory;
        }
}
