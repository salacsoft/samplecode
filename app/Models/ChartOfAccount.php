<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartOfAccount extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        "account_no",
        "account_name",
        "coa_type_id",
        "normal_balance",
        "current_balance",
        "parent_account"
    ];

    public function CoaTypeAccount() {
        return $this->belongsTo(CoaType::class, "coa_type_id", "id");
    }
}
