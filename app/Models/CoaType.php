<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoaType extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        "code",
        "type"
    ];

    public function chartOfAccount() {
        return $this->hasMany(ChartOfAccount::class, "coa_type_id", "id");
    }
}
