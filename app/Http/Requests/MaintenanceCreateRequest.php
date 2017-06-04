<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class MaintenanceCreateRequest extends FormRequest
{
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $maintenances = $this->route()->parameter('id');

        return $url->route('maintenances.index', $maintenances);
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
            'in_charge' => 'required|max:100',
            'maintenance_in_charge' => 'required|max:100',
            'description' => 'required|max:500',
            'cost' => 'required',
            'maintenance_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'in_charge' => 'Añade al :attribute',
            'maintenance_in_charge' => 'Añade al :attribute',
            'description' => 'Añade una :attribute',
            'cost' => 'Añade el :attribute',
            'maintenance_date' => 'Añade la :attribute'
        ];
    }

    public function attributes {
        return [
            'in_charge' => 'encargado',
            'maintenance_in_charge' => 'encargado de hacer el mantenimiento',
            'description' => 'descripción',
            'cost' => 'costo del mantenimiento',
            'maintenance_date' => 'la fecha del mantenimiento'
        ];
    }
}
