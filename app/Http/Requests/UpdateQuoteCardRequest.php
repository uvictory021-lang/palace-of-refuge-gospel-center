<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteCardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quote' => ['required', 'string'],
            'reference' => ['nullable', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:255'],
            'background_type' => ['required', 'in:color,image'],
            'background_value' => ['nullable', 'string', 'max:255'],
            'background_image' => ['nullable', 'image', 'max:4096'],
            'text_color' => ['nullable', 'string', 'max:255'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($this->input('background_type') === 'color' && ! $this->filled('background_value')) {
                $validator->errors()->add('background_value', 'A background color is required when background type is Color.');
            }

            /** @var \App\Models\QuoteCard $quoteCard */
            $quoteCard = $this->route('quote_card');

            if (
                $this->input('background_type') === 'image'
                && ! $this->hasFile('background_image')
                && $quoteCard->background_type !== 'image'
            ) {
                $validator->errors()->add('background_image', 'A background image is required when background type is Image.');
            }
        });
    }
}