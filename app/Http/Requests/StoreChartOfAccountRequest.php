<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreChartOfAccountRequest extends FormRequest
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
            "account_no" => "required|unique:chart_of_accounts",
            "account_name" => "required|unique:chart_of_accounts",
            "coa_type_id" => "required",
            "normal_balance" => ["required", Rule::in(['Debit', 'Credit'])],
            "current_balance" => "",
            "parent_account" => ""
        ];
    }
}
