<?php

namespace Cnaebadi\NullReplacer\Helpers;

class NullReplacer
{
    public static function handle($request, $attribute, $value, $parameter = null, $validator = null)
    {
        $attribute = (string) $attribute;

        if(!is_null($value)){
            if($value == 'true'){
                $request->merge([$attribute => true]);
            }elseif($value == 'false'){
                $request->merge([$attribute => false]);
            }
            return true;
        }

        if (in_array($parameter, ['true', 'false'], true)) {
            $request->merge([
                $attribute => filter_var($parameter, FILTER_VALIDATE_BOOLEAN),
            ]);
            return true;
        }

        if(!is_null($parameter)){
            $request->merge([$attribute => $parameter]);
            return true;
        }

        $request->request->remove($attribute);

        if($validator){
            $validator->setData(
                collect($validator->getData())->except($attribute)->toArray()
            );
        }

        return true;
    }
}
