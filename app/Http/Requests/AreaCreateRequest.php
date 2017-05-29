<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AreaCreateRequest extends FormRequest
{
    // Create this function to redirect if fails with variables
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $areas = $this->route()->parameter('id');

        return $url->route('areas.index', $areas);
    }

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
            'name' => 'nombre del area',
        ];
    }
}
