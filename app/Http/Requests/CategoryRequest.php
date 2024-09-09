<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        if ($this->Method() == 'POST') {
            $rules['name'] .= '|unique:categories,name';
        } elseif ($this->Method() == 'PUT') {
            $rules['name'] .= '|unique:categories,name,' . $this->category->id;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser valido',
            'name.unique' => 'El nombre de categoria ya existe',
        ];
    }
}
