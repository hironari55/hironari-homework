<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'gender' => 'required|string',
            'age' => 'required|numeric',
            'emailAddress' => 'required|email:spoof,dns|string|max:100',
            'receiveEmail' => 'nullable|string',
            'evaluation' => 'required|numeric',
            'opinion' => 'required|string|max:200',
        ];
    }

}
