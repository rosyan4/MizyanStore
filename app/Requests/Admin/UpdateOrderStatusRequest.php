// app/Http/Requests/UpdateOrderStatusRequest.php
<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status' => 'required|in:pending,processing,completed,cancelled',
            'notes' => 'nullable|string',
            'tracking_number' => 'nullable|string|max:50',
        ];
    }
}