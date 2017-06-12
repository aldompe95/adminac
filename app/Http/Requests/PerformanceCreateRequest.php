<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PerformanceCreateRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        $ur = $this->redirector->getUrlGenerator();
        $performances = $this->route()->parameter('id');
        return $url->route('performances.index', $performances);
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
            'day' => 'required|date',
            'switched_on_hour' => 'required',
            'switched_off_hour' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'day' => 'Añade el :attribute',
            'switched_on_hour' =>  'Añade la :attribute',
            'switched_off_hour' => 'Añade la :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'day' => 'día',
            'switched_on_hour' => 'hora de encendido',
            'switched_off_hour' => 'hora de apagado'
        ];
    }
}
