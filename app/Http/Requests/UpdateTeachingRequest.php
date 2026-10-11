<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeachingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable', 'string', 'max:255',
                Rule::unique('teachings', 'slug')->ignore($this->route('teaching')),
            ],
            'type' => ['required', 'in:sermon,palace_guard'],
            'description' => ['nullable', 'string'],
            'speaker' => ['nullable', 'string', 'max:255'],
            'teaching_date' => ['nullable', 'date'],
            'scripture_reference' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'audio' => ['nullable', 'file', 'mimetypes:audio/mpeg,audio/mp4,audio/wav,audio/x-wav,audio/ogg,audio/webm', 'max:51200'],
            'thumbnail' => ['nullable', 'image', 'max:4096'],
        ];
    }
}