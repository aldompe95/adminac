<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ActiveSensorRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $sensors = $this->route()->parameter('id');

        return $url->route('activeSensors.index', $sensors);
    }
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
            'sensor' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sensor.required' => 'Agrega un :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'sensor' => 'sensor'
        ];
    }
}
