<?php

namespace App\Repositories\coatypes;
use App\Repositories\BaseRepo\BaseRepository;
use App\Models\CoaType;

class  CoaTypeRepository extends BaseRepository implements CoaTypeInterface {

    //Set model
    public function init() {
        $this->model = new CoaType;
    }

}
