<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DetailsRequest extends FormRequest
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
            'title' => 'required|max:100|min:5',
            'author' => 'required|max:25|min:3',
            'saying' => 'required|max:150|min:10',
            'describe' => 'required|max:200|min:10',
            'content' => 'required'
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'=>'详情标题不能为空!',
            'title.max'=>'详情标题不得多于一百个字符!',
            'title.min'=>'详情标题不得少于五个字符!',
            'author.required'=>'详情作者不能为空!',
            'author.max'=>'详情作者不得多于二十五个字符!',
            'author.min'=>'详情作者不得少于三个字符!',
            'saying.required'=>'详情语录不能为空!',
            'saying.max'=>'详情语录不得多于一百五十个字符!',
            'saying.min'=>'详情语录不得少于十个字符!',
            'describe.required'=>'详情描述不能为空!',
            'describe.max'=>'详情描述不得多于二百个字符!',
            'describe.min'=>'详情描述不得少于十个字符!',
            'content.required'=>'详情不能为空!'
        ];
    }
}
