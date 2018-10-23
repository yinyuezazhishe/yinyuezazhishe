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
     * ��ȡ�Ѷ�����֤����Ĵ�����Ϣ��
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required'=>'������ⲻ��Ϊ��!',
            'title.max'=>'������ⲻ�ö���һ�ٸ��ַ�!',
            'title.min'=>'������ⲻ����������ַ�!',
            'author.required'=>'�������߲���Ϊ��!',
            'author.max'=>'�������߲��ö��ڶ�ʮ����ַ�!',
            'author.min'=>'�������߲������������ַ�!',
            'saying.required'=>'������¼����Ϊ��!',
            'saying.max'=>'������¼���ö���һ����ʮ���ַ�!',
            'saying.min'=>'������¼��������ʮ���ַ�!',
            'describe.required'=>'������������Ϊ��!',
            'describe.max'=>'�����������ö��ڶ��ٸ��ַ�!',
            'describe.min'=>'����������������ʮ���ַ�!',
            'content.required'=>'���鲻��Ϊ��!'
        ];
    }
}
