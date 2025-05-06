<?php

namespace Cnaebadi\NullReplacer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Cnaebadi\NullReplacer\Helpers\NullReplacer;

class NullReplacerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('null_replacer', function ($attribute, $value, $parameters, $validator) {
            $parameter = $parameters[0] ?? null;
            $request   = request();

            return NullReplacer::handle($request, $attribute, $value, $parameter, $validator);
        });
    }

    public function register()
    {

    }
}
