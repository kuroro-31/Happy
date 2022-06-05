<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// 記事投稿画面や記事更新画面から送信された記事タイトルや記事本文のバリデーション
class UserRequest extends FormRequest
{
    /**
     * リクエストの対象となるリソース(ここでは記事)をユーザーが更新して良いかどうかを判定
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションのルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'alpha_num', 'min:3', 'max:16', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'body' => 'required|max:200',
        ];
    }

    // バリデーションエラーメッセージに表示される項目名をカスタマイズ
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'body' => '自己紹介',
        ];
    }
}
