<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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

                'nombre' => ['required', 'min:3', 'max:20', 'string', 'unique:materiales,nombre'],
                'peso' => ['required', 'min:3', 'max:10'],
                'tamaño' => ['required','min:3', 'max:10'],
                'cantidad' => ['required', 'numeric'],
                'tipo_id' => ['required'],
                'marca_id' => ['required'],
                'proveedor_id' => ['required'],
                'estado' => ['required'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator){
            if ($validator->errors()->count()) {
                if (!in_array($this->method(), ['PUT','PATCH'])) {
                    $validator->errors()->add('post',true);
                }

            }
        });
    }
}
