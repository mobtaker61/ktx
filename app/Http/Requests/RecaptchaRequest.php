<?php

namespace App\Http\Requests;

use App\Helpers\RecaptchaHelper;
use Illuminate\Foundation\Http\FormRequest;

class RecaptchaRequest extends FormRequest
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
        $rules = [];

        // Add reCAPTCHA validation if enabled
        if (RecaptchaHelper::isEnabled()) {
            $rules['g-recaptcha-response'] = 'required|string';
        }

        return $rules;
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'لطفاً reCAPTCHA را تکمیل کنید.',
            'g-recaptcha-response.string' => 'reCAPTCHA نامعتبر است.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (RecaptchaHelper::isEnabled()) {
                $recaptchaResponse = request()->input('g-recaptcha-response');

                if (! RecaptchaHelper::verify($recaptchaResponse)) {
                    $validator->errors()->add('g-recaptcha-response', 'reCAPTCHA تأیید نشد. لطفاً دوباره تلاش کنید.');
                }
            }
        });
    }
}
