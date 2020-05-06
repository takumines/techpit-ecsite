<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemForm extends FormRequest
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
            'name' => 'required|unique:items,name',
            'amount' => ['required','regex:/^[1-9]{1,9}/'],
        ];
    }

    /**
     * 項目
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '商品名',
            'amount' => '金額'
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'その:attributeは既に存在しています',
            'amount.regex' => ':attributeは半角英数字の正数で入力してください',
        ];
    }
}
