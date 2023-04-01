<?php

namespace App\Http\Requests;

class ProjectRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            'title'         => 'required|string|max:191',
            'description'   => 'nullable|string',
            'url'           => 'nullable|url|max:191',
            'is_live'       => 'nullable|boolean',
            'technologies'  => 'required|array',
            'images'        => 'required|array',
            'images.*'      => 'required|image|max:1024'
        ];

        if ($this->isMethod('patch')) {
            $rules['images.*'] = 'nullable';
        }

        return $rules;
    }
}
