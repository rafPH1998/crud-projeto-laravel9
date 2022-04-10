<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addUpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //NENHUM TIPO DE RESTRIÇÃO PARA EDIÇÃO DE USUARIO, POR TANTO, PODEMOS DEIXAR COMO TRUE;
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
        $id = $this->id;

        $rules = [
            'name' => [
                'string',
                'required',
                'min:2',
                'max:255'
            ],

            'email' => [
                'email',
                'required',
                "unique:users,email,{$id},id"
            ],

            'password' => [
                'required',
                'min:4',
                'max:100'
            ],

            'image' => [
                'nullable',
                'image',
                'max: 1024'
            ],
        ];

        if($this->method('PUT')) {
            $rules['password'] = [
                'nullable',
                'min:4',
                'max:100'
            ];
        }

        return $rules;
    }
}
