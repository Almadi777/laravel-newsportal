<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This field is required',
            'title.string' => 'The data must match the string type',
            'preview_image.required' => 'This field is required',
            'preview_image.file' => 'You need to select a file',
            'main_image.required' => 'This field is required',
            'main_image.file' => 'You need to select a file',
            'category_id.required' => 'This field is required',
            'category_id.integer' => 'Сategory id must be a number',
            'category_id.exists' => 'Сategory id must be in the database',
            'tag_ids.array' => 'Need to send an array of data',
        ];
    }
}
