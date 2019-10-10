<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ["category"];

    public function inventories(){
        return $this->hasMany(Inventory::class, "item_category_id", "id");
    }
}
