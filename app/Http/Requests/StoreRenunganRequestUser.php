<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRenunganRequest extends FormRequest
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
            'prinsip' => 'required|string',
            'penerapan1' => 'required|string',
            'penerapan2' => 'nullable|string',
            'penerapan3' => 'nullable|string',
            'label' => 'required|string',
            'renungan_id' => 'required|exists:renungans,id',
        ];
    }
}
