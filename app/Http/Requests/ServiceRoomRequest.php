<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ServiceRoom;

class ServiceRoomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255', function($attribute, $value, $fail) {
                $existing = ServiceRoom::whereInsensitive('name', $value, true)->first();

                if ($existing && !$existing->trashed()) {
                    $fail('Ruang pelayanan sudah ada.');
                }
            }],
        ];
    }
}
