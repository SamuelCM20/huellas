<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    protected $rules = [
        'name' => ['required', 'string','max:50'],
        'details' => ['required', 'string','max:50'],
        'price' => ['required', 'numeric','digits_between:1,10','regex:/^\d{1,10}$/'],
        'shipping_cost' => ['numeric','digits_between:1,10','regex:/^\d{1,10}$/'],
        'description' => ['nullable', 'string','min:10','max:100'],
        'stock' => ['required', 'numeric','digits_between:1,10'],
        'category_id' => ['required', 'numeric']
    ];
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {

        $this->rules['file'] = ['nullable', 'image'];

        if (!$this->hasFile('file')) {
            $this->rules['file'] = ['nullable'];
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es requerido',
            'name.string' => 'El nombre del producto debe ser un texto',
            'name.max' => 'El nombre del producto no puede superar los 50 caracteres',
            'details.required' => 'La descripción del producto es requerida',
            'details.string' => 'La descripción del producto debe ser un texto',
            'details.max' => 'La descripción del producto no puede superar los 50 caracteres',
            'price.required' => 'El precio del producto es requerido',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.digits_between' => 'El precio del producto debe tener entre 1 y 10 dígitos',
            'price.regex' => 'El precio del producto debe ser un número con exactamente 10 dígitos',
           'shipping_cost.required' => 'El costo de envío es requerido',
           'shipping_cost.numeric' => 'El costo de envío debe ser un número',
           'shipping_cost.digits_between' => 'El costo de envío debe tener entre 1 y 10 dígitos',
           'shipping_cost.regex' => 'El costo de envío debe ser un número con exactamente 10 dígitos',
            'description.min' => 'La descripción debe tener al menos 10 caracteres',
            'description.max' => 'La descripción no puede superar los 100 caracteres',
           'stock.required' => 'El stock es requerido',
           'stock.numeric' => 'El stock debe ser un número',
           'stock.digits_between' => 'El stock debe tener entre 1 y 10 dígitos',
            'category_id.required' => 'La categoría es requerida',
            'category_id.numeric' => 'La categoría debe ser un número'

        ];
        
    }
}
