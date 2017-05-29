<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class TechnologicalCreateRequest extends FormRequest
{
    //protected $redirectRoute = 'technologicals.index';
    protected $redirectAction = 'TechnologicalController@index';

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
            'name' => 'required|max:255',
            'it_key' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Añade el :attribute.',
            'it_key.required' => 'Añade la :attribute.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del tecnologico',
            'it_key' => 'clave del tecnologico'
        ];
    }
}
