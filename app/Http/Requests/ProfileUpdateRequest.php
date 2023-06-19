<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'assoc_number' => ['integer', 'min:4'],
            'profile_image' => ['image', 'mimes:png,jpg,jpeg', 'max:5048'],
            'firstname' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'username' => ['string', 'min:6', 'max:12', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'tin' => ['string', 'max:20'],
            'gender' => ['string', 'max:255'],
            'date_of_birth' => ['string', 'max:255'],
            'region_of_company' => ['string', 'max:255'],
            'area_of_interests' => ['string', 'max:255'],
            'regions_of_company' => ['string', 'max:255'],
            'company_name' => ['string', 'max:255'],
            'company_address' => ['string', 'max:255'],
            'primary_contact' => ['string', 'min:10', 'max:10'],
            'secondary_contact' => ['string', 'min:10', 'max:10'],
            'onboard_date' => ['string', 'max:255'],
            'academic_qualification' => ['string', 'max:255'],
        ];
    }
}
