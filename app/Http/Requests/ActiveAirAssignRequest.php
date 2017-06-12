<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ActiveAirAssignRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $airs = $this->route()->parameter('id');

        return $url->route('active.index', $airs);
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
            'air' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'air.required' => 'Selecciona al menos un :attribute para asignar.',
        ];
    }

    public function attributes()
    {
        return [
            'air' => 'aire acondicionado',
        ];
    }
}
