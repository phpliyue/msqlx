<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFoldersRequest extends FormRequest
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
            'fileName'=>'required'
        ];
    }
    /*
     * return error messages
     *
     * */
    public function messages()
    {
        $messages = [
//            'filesData.required'=>'没有选择文件',
//            'filesData.file'=>'不知道是什么'
            'fileName.required'=>'没有文件'
        ];
        return $messages;
    }
}
