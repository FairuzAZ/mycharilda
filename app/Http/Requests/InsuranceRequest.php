<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Insurance;

class InsuranceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255', function($attribute, $value, $fail) {
                $existing = Insurance::whereInsensitive('name', $value, true)->first();

                if ($existing && !$existing->trashed()) {
                    $fail('Jenis asuransi sudah ada.');
                }
            }],
        ];
    }
}
