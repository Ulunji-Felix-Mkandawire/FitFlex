<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'exercise_id' => ['required', 'exists:exercises,id'],
            'sets' => ['required', 'integer', 'min:1'],
            'reps' => ['required', 'integer', 'min:1'],
            'weight_kg' => ['nullable', 'numeric', 'min:0', 'max:999.99'],
            'performed_on' => ['required', 'date'],
            'workout_plan_id' => ['nullable', 'exists:workout_plans,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'exercise_id' => 'exercise',
            'workout_plan_id' => 'plan',
        ];
    }
}
