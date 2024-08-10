<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|in:buy,sell',
            'product_id'=>'required|array',
            'product_id.*' => 'required',
            'amount'=>'required|array',
            'amount.*'=>'required|numeric|min:1',

        ];
    }

    public function messages()
{
    return [
        'type' => 'Informe o tipo de pedido',
        'product_id.*.required' => 'Verifique os produtos informados',
        'amount.*.required'=>'Informe um valor de produto',
        'amount.*.min'=>'Informe um valor de produto',
    ];
}
}
