<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|max:80',
            'customer_email' => 'required|email|max:120',
            'customer_mobile' => 'required|max:40'
        ];
    }

    /**
     * Get the error messages from the validation that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_name.required' => 'El campo :attribute es requerido',
            'customer_name.max' => 'El campo :attribute no puede superar los :max caracteres',
            'customer_email.email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
            'customer_email.required' => 'El campo :attribute es requerido',
            'customer_email.max' => 'El campo :attribute no puede superar los :max caracteres',
            'customer_mobile.required' => 'El campo :attribute es requerido',
            'customer_mobile.max' => 'El campo :attribute no puede superar los :max caracteres',
        ];
    }

     /**
     * Get the custom names of the attributes.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'customer_name' => 'nombre',
            'customer_email' => 'correo eletrónico',
            'customer_mobile' => 'teléfono'
        ];
    }
}
