<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if the user is dvice or user
    //   dd($this->user());
        if ($this->user('dvice')->tokenCan('dvice:pay') ) {

            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //   'invoice_number',
        // 'invoice_type',
        // 'invoice_status',
        // 'invoice_date',
        // 'invoice_time',
        // 'total',
        // 'items',
        // 'dvice_id',
        // 'user_id',
        return [
            'total' => 'required|numeric',
            'items' => 'required|array',
            'items.*.name' => 'required|string',
            'items.*.price' => 'required|numeric',
            'items.*.quantity' => 'required|numeric',
            'user_id' => 'required',
        ];
    }
}
