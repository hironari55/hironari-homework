@extends('layouts.app')

@section('content')

<div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow">
    <div class="w-9/12 ml-auto mx-auto">
        <h2 class="font-semibold text-2xl text-center mb-10">{{ $restaurant->name }}へのご意見をお聞かせください</h2>
        <form action="{{ route('reviews.create', ['id' => $id]) }}" class="w-3/4 mx-auto" method="post">
            @csrf
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">氏名</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="name" id="name">
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <div>性別</div>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <div class="flex mt-2">
                    <div class="form-check form-check-inline mr-8">
                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">女性</label>
                    </div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">年代</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <select class="block appearance-none border border-gray-200 rounded leading-tight focus:outline-none my-2 w-full" id="grid-state">
                    <option>10代以下</option>
                    <option>20代</option>
                    <option>30代</option>
                    <option>40代</option>
                    <option>50代</option>
                    <option>60代以上</option>
                </select>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">メールアドレス</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="name" id="name">
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <div>メール送信可否</div>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <div class="flex mt-2">
                    <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">登録したメールアドレスに
                        メールマガジンをお送りしてもよろしいですか？</label>
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">評価</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="name" id="name">
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">ご意見</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="name" id="name">
            </div>
            <form>
    </div>
</div>

@endsection
