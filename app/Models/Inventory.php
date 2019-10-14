<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        "item_category_id",
        "product_code",
        "sku_code",
        "description",
        "sku_qty",
        "uom",
        "cost",
        "posting_date",
        "on_hand",
        "isfixed_asset",
        "salvage_value",
        "life_span",
        "depreciation_value",
        "created_by",
        "updated_by"
    ];

    public function itemCategory(){
        return $this->belongsTo(ItemCategory::class ,"item_category_id", "id");
    }
}
