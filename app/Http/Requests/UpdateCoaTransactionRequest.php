<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCoaTransactionRequest extends FormRequest
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
            "chart_of_account_id" => "required|exists:chart_of_accounts,id",
            "coa_trans_no" => "required|numeric|unique:coa_transactions,coa_trans_no,".$this->id.",id",
            "description" => "",
            "posting_type" => ["required", Rule::in(['Debit', 'Credit', 'debit', 'credit', 'CREDIT', 'DEBIT'])],
            "amount" => "required|numeric",
            "posting_date" => "required|date_format:Y-m-d"
        ];
    }
}
