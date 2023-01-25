<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Validator;

trait Validation
{
    public function validasiForm($request, $rule)
    {
        return Validator::make($request, $rule)->validated();
    }
}
