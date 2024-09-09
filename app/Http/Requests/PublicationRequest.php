<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    protected $rules = [
        'description' => 'required|string|max:500',
        'breed' => 'nullable|string|max:50',
        'color' => 'required|string|min:3|max:50',
        'animal_type' => 'required|string|min:3|max:50',
        ];


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
            'user_id.required' => 'El campo usuario es obligatorio.',
            'user_id.exists' => 'El usuario seleccionado no existe.',
            'user_id.integer' => 'El campo usuario debe ser un número entero.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.min' => 'La descripción debe tener más de 3 caracteres.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'breed.required' => 'La raza es obligatoria.',
            'breed.string' => 'La raza debe ser una cadena de texto.',
            'breed.min' => 'La raza debe tener más de 3 caracteres.',
            'breed.max' => 'La raza no puede tener más de 100 caracteres.',
            'color.required' => 'El color es obligatorio.',
            'color.string' => 'El color debe ser una cadena de texto.',
            'color.min' => 'El color debe tener más de 3 caracteres.',
            'color.max' => 'El color no puede tener más de 50 caracteres.',
            'animal_type.required' => 'El tipo de animal es obligatorio.',
            'animal_type.string' => 'El tipo de animal debe ser una cadena de texto.',
            'animal_type.min' => 'El tipo de animal debe tener más de 3 caracteres.',
            'animal_type.max' => 'El tipo de animal no puede tener más de 50 caracteres.',

        ];
    }
}
