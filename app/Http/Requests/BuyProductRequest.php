<?php

namespace App\Http\Requests;


class BuyProductRequest extends \App\Http\Requests\FormRequest
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
            'id' => 'required|int|exists:products',
            'options' => 'required|array',
            'options.s' => 'int',
            'options.m' => 'int',
            'options.l' => 'int'
        ];
    }
}
