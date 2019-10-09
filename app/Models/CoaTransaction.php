<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoaTransaction extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        "chart_of_account_id",
        "coa_trans_no",
        "description",
        "posting_type",
        "amount",
        "posting_date"
    ];
}
