<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BuildingCreateRequest extends FormRequest
{
    protected $redirectAction = 'BuildingController@index';

    public function authorize()
    {
        if(Auth::user()) {
            return true;
        }
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Añade el :attribute.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del edificio',
        ];
    }
}
