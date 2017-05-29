<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AirConditionerCreateRequest extends FormRequest
{
    // Create this function to redirect if fails with variables
    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();

        $airs = $this->route()->parameter('id');

        return $url->route('airs.index', $airs);
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
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'purchase_at' => 'required|date',
            'remission_at' => 'required|date'

        ];
    }

    public function messages()
    {
        return [
            'brand.required' => 'Añade el :attribute.',
            'model.required' => 'Añade el :attribute.',
            'purchase_at.required' => 'Añade la :attribute.',
            'remission_at.required' => 'Añade la :attribute.'
        ];
    }

    public function attributes()
    {
        return [
            'brand' => 'nombre de la marca',
            'model' => 'modelo',
            'purchase_at' => 'fecha de compra',
            'remission_at' => 'fecha de remision',
        ];
    }
}