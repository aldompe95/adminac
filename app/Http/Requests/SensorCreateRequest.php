<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SensorCreateRequest extends FormRequest
{
    protected $rediretAction = 'SensorController@index';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|max:50',
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'description' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Hace falta el :attribute',
            'brand.required' => 'Hace falta la :attribute',
            'model.required' => 'Falto agregar el :attribute',
            'description.required' => 'Le hizo falta la :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'tipo',
            'brand' => 'marca',
            'model' => 'modelo',
            'description' => 'descripción'
        ];
    }
}
