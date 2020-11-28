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
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_mobile' => 'required'
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
            'customer_email.required' => 'El campo :attribute es requerido',
            'customer_mobile.required' => 'El campo :attribute es requerido'
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
            'customer_email.required' => 'correo eletrónico',
            'customer_mobile.required' => 'teléfono'
        ];
    }
}
