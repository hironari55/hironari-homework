@extends('layouts.app')

@section('content')
<div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow">
    <div class="w-9/12 ml-auto mx-auto">
        <h2 class="font-semibold text-2xl text-center mb-10">内容確認</h2>

        <form action="{{ route('reviews.confirm', ['id' => $id]) }}" class="w-3/4 mx-auto" method="post">
            @csrf
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="mr-2">氏名</label>
                    <div class="px-2">{{ $input['name'] }}</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="gender" class="mr-2">性別</label>
                    <div class="px-2">{{ $input['gender'] }}</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="age" class="mr-2">年代</label>
                    <div class="px-2">{{ $input['age'] }}</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="emailAddress" class="mr-2">メールアドレス</label>
                    <div class="px-2">{{ $input['emailAddress'] }}</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="receiveEmail" class="mr-2">メール送信可否</label>
                    <div class="px-2">{{ $input['receiveEmail'] }}</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="evaluation" class="mr-2">評価</label>
                    <div class="px-2">{{ $input['evaluation'] }}点</div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="opinion" class="mr-2">ご意見</label>
                    <div class="px-2">{{ $input['opinion'] }}</div>
                </div>
            </div>
            <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-auto" name ="back"type="submit" value="再入力">
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto" type="submit" value="送信">
            <form>
    </div>
</div>
@endsection
