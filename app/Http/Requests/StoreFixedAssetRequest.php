<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFixedAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "item_category_id" => "required|exists:item_categories,id",
            "product_code" => "required",
            "sku_code" => "",
            "description" => "required",
            "sku_qty" => "required|numeric",
            "uom" => "",
            "cost"=> "required|numeric",
            "on_hand" => "",
            "isfixed_asset" => ["required", Rule::in([true, 1])],
            "salvage_value" => "numeric",
            "life_span" => "required",
            "depreciation_value" => "required|numeric",
            "created_by" => "",
            "updated_by" => ""
        ];
    }
}
