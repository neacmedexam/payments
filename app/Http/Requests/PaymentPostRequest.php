<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class PaymentPostRequest extends FormRequest
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
            // 'reference' => 'required',
            'name' => 'required',
            'facebook' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'service_availed' => 'required',
            'mode_of_payment' => 'required',
            'other_mop' => 'nullable',
            'total_amount_paid' => 'required',
            'payment_slip' => 'required|mimes:jpeg,jpg,png,heic',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
}
