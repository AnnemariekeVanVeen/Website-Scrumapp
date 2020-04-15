<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BacklogItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request to either create or update a backlog item.
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'sprint_id' => 'nullable|integer',
            'assigned_to' => 'nullable|string',
            'state' => 'required|string',
            'priority' => 'required|integer',
            'role' => 'required|string',
            'activity' => 'required|string',
            'story_points' => 'nullable|integer',
            'description' => 'nullable|string',
            'acceptation_criteria' => 'nullable|string',
        ];
    }
}
