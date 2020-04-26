<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressForm extends FormRequest
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
            'name' => 'required',
            'postalcode' => 'required|digits:7|numeric',
            'addressline2' => 'required',
            'phonenumber' => 'required|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/',
        ];
    }

    /**
     * プロパティを日本語にリネーム
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'postalcode' => '郵便番号',
            'addressline2' => '住所2',
            'phonenumber' => '電話番号',
        ];
    }

}
