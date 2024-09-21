<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    protected $rules = [
        'name' => ['required', 'string','min:3','max:50'],
        'last_name' => ['required', 'string','min:3','max:50'],
        'phone' => ['required', 'numeric','min:3','digits:10'],
        'address' => ['required', 'string','min:3','max:100'],
        'email' => ['required', 'email', 'unique:users,email','min:3','max:50'],
        'password' => ['required', 'confirmed', 'string', 'min:8', 'regex:/[a-zA-Z]/', 
        'regex:/[0-9]/'],        
    ];
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if($this->path() != 'api/register'){
            $rules['role'] = ['required', 'string','in:user,admin'];
        }

        $this->rules['file'] = ['nullable', 'image'];

        if (!$this->hasFile('file')) {
            $this->rules['file'] = ['nullable'];
        }
        return $this->rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser valido',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres',
            'last_name.required' => 'El apellido es requerido',
            'last_name.string' => 'El apellido debe ser valido',
            'last_name.min' => 'El apellido debe tener al menos 3 caracteres',
            'last_name.max' => 'El apellido debe tener como máximo 50 caracteres',
            'phone.min' => 'El telefono debe tener al menos 3 caracteres',
            'phone.digits' => 'El telefono debe tener 10 dígitos',
            'phone.required' => 'El telefono es requerido',
            'phone.numeric' => 'El telefono debe ser numerico',
            'address.min' => 'La direccion debe tener al menos 3 caracteres',
            'address.max' => 'La direccion debe tener como máximo 100 caracteres',
            'address.required' => 'La direccion es requerida',
            'address.string' => 'La direccion debe ser valida',
            'email.min' => 'El email debe tener al menos 3 caracteres',
            'email.max' => 'El email debe tener como máximo 50 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser valido',
            'email.unique' => 'El email ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.string' => 'La contraseña debe ser valida',
            'password.regex' => 'La contraseña debe tener al menos una letra mayúscula, una letra minúscula y un número',  // regex pattern for password validation
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'role.required' => 'El rol es requerido',
            'role.string' => 'El rol debe ser valido',
            'role.in' => 'El rol debe ser user o admin',
            'file.required' => 'La imagen es requerida',
            'file.image' => 'La imagen debe ser una imagen',
        ];
    }
}
