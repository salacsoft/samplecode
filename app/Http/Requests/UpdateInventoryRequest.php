<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            "sku_code" => "required|unique:inventories,sku_code, " .$this->id. ",id",
            "description" => "",
            "sku_qty" => "required|numeric",
            "uom" => "required",
            "cost"
        ];
    }
}
