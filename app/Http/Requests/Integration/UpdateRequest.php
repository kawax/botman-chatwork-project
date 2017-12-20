<?php

namespace App\Http\Requests\Integration;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->route('integration'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service'   => [
                'required',
                Rule::in(['slack']),
            ],
            'recipient' => [
                'required',
                'integer',
            ],
            'api_token' => [
                'required',
                'string',
            ],
        ];
    }
}
