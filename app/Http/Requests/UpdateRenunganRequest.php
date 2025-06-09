<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRenunganRequest extends FormRequest
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
            'judul' => 'required|string',
            'date_renungan' => 'required|date',
            'bacaan' => 'required|string',
            'ayat_bacaan' => 'required|string',
            'ayat_kunci' => 'required|string',
            'isi_renungan' => 'required|string',
            'refleksi' => 'required|string',
            'pertanyaan' => 'required|string',
            'penerapan1' => 'required|string',
            'penerapan2' => 'required|string',
            'penerapan3' => 'required|string',
            'prinsip' => 'required|string',
            'doa' => 'required|string',
        ];
    }
}
