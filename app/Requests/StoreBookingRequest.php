<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'nullable|date_format:H:i',
            'notes' => 'nullable|string',
        ];

        switch ($this->input('service_type')) {
            case 'jahitan':
                $rules += [
                    'fabric_type' => 'required|string',
                    'size' => 'required|string',
                    'design_details' => 'nullable|string',
                    'design_images' => 'nullable|array',
                    'design_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                ];
                break;
            case 'laundry':
            case 'strika':
                $rules += [
                    'quantity' => 'required|integer|min:1',
                    'pickup' => 'nullable|boolean',
                ];
                break;
        }

        return $rules;
    }
}