<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// 記事投稿画面や記事更新画面から送信された記事タイトルや記事本文のバリデーション
class BookRequest extends FormRequest
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
            'title' => 'required|max:50',
            'story' => 'required|max:500',
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
        ];
    }

    // バリデーションエラーメッセージに表示される項目名をカスタマイズ
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'story' => '本文',
            'tags' => 'タグ',
        ];
    }

    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
