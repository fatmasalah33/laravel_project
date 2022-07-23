<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Phone;
class PhoneRequest extends FormRequest
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
        // dd(request()->route('phone'));
        
        return [
            'phone_number'=>'required|digits:11|numeric|starts_with:010,012,015,011',
            Rule::unique('usersphone')->ignore(request()->route('phone')),
            // Rule::unique('usersphone')->ignore($usersphone->phone_number, 'phone_number')
        ];
    }
}
