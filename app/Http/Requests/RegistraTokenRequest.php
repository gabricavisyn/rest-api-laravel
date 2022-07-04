<?php

namespace App\Http\Requests;

use App\Models\TokenApiIts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistraTokenRequest extends FormRequest
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
            'emailIts' => ['required', 'max:255', 'email', 'regex:/(.*)@(edu\.itspiemonte|its-ictpiemonte)\.it/i', "unique:".(new TokenApiIts())->getTable().",email"],
            'passwordUniversale' => ['required']
        ];
    }
}
