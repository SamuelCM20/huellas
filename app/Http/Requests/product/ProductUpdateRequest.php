<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class ProductUpdateRequest extends ProductRequest
{

    public function rules()
    {       
             $this->rules['file'] = ['nullable','image','mimes:jpeg,png,jpg,gif','max:2048'];

            if(!$this->hasFile('file')){
                $this->rules['file'] = ['nullable'];
            }
			return $this->rules;    
    }

    public function messages(){
        return [
            'file.image' => "El archivo debe ser una imagen",
            'file.max' => "El tamaño máximo del archivo es de 2MB",
        ];
    }

}