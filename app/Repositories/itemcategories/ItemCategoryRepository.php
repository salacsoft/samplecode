<?php

namespace App\Repositories\itemcategories;
use App\Models\ItemCategory;
use App\Repositories\BaseRepo\BaseRepository;

Class ItemCategoryRepository extends BaseRepository implements ItemCategoryInterface {

        //Set model
        public function init() {
            $this->model = new ItemCategory;
        }
}
