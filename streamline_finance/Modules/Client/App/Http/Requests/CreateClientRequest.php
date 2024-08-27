<?php

namespace Modules\Client\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  Modules\Client\App\Models\Client;

class CreateClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'location'=>'required',
            'client_email'=>'required|email:rfc,dns',
            'level'=>'required',
            'billing_cycle'=> 'required',
            'contact_name'=>'required',
            'contact_phone' => 'required',
            'support_name' => 'required',
            'support_phone'=> 'required',
            'support_email'=> 'required |email:rfc,dns',
        ];
    }

    public function messages(): array {
        return[
            'name.required' => 'name is required',
            'location.required' => 'location is required',
            'client_email.required' => 'client_email is required',
            'level.required' => 'level is required',
            'billing_cycle.required' => 'billing_cycle is required',
            'contact_name.required' => 'contact_name is required',
            'contact_phone.required' => 'contact_phone is required',
            'support_name.required' => 'support_name is required',
            'support_phone.required' => 'support_phone is required',
            'support_email.required' => 'support_email is required',
            
            
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
