<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommunityLinkForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
            'title' => 'required|max:255',
            'link' => 'required|unique:community_links|url|max:255',
            'channel_id' => 'required|exists:channels,id'
        ];
    }

    public function messages(): array 
    {
        return [
            'channel_id.required' => 'You have to select a channel.',
        ];
    }
}
