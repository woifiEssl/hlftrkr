<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActivityRequest
 * @package App\Http\Requests\User
 */
class ActivityRequest extends FormRequest
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
            'name' => 'required|string',
            'value' => 'required|numeric',
            'from' => 'required|date_format:Y-m-d H:i:s',
            'to' => 'required|date_format:Y-m-d H:i:s',
            'type_id' => 'required|integer|exists:mysql.activity_type,id',
        ];
    }

    /**
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'strip_tags',
        ];
    }
}
