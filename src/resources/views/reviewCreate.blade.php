@extends('layouts.app')

@section('content')

<div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow">
    <div class="w-9/12 ml-auto mx-auto">
        <h2 class="font-semibold text-2xl text-center mb-10">{{ $restaurant->name }}へのご意見をお聞かせください</h2>
        @if ($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('reviews.create', ['id' => $id]) }}" class="w-3/4 mx-auto" method="post">
            @csrf
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="name" class="">氏名</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="gender">性別</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <div class="flex mt-2">
                    <div class="form-check form-check-inline mr-8">
                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender" value="男性" {{ old('gender', '男性') === '男性' ? 'checked' : ''}}>
                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio10">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="gender" id="gender" value="女性" {{ old('gender') === '女性' ? 'checked' : ''}}>
                        <label class="form-check-label inline-block text-gray-800" for="inlineRadio20">女性</label>
                    </div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="age" class="">年代</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <select class="block appearance-none border border-gray-200 rounded leading-tight focus:outline-none my-2 w-full" id="age" name="age">
                    <option value="10" {{ old('age', '10') === '10' ? 'selected' : ''}}>10</option>
                    <option value="20" {{ old('age') === '20' ? 'selected' : ''}}>20</option>
                    <option value="30" {{ old('age') === '30' ? 'selected' : ''}}>30</option>
                    <option value="40" {{ old('age') === '40' ? 'selected' : ''}}>40</option>
                    <option value="50" {{ old('age') === '50' ? 'selected' : ''}}>50</option>
                    <option value="60" {{ old('age') === '60' ? 'selected' : ''}}>60</option>
                </select>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="emailAddress" class="">メールアドレス</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <input type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full" placeholder="入力してください" name="emailAddress" id="emailAddress" value="{{ old('emailAddress') }}">
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <div>メール送信可否</div>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <div class="flex justify-center">
                    <div class="form-check">
                        <label class="form-check-label inline-block text-gray-800 my-2" for="receiveEmail">
                            登録したメールアドレスにメールアドレスをお送りしてもよろしいですか？
                            <input type="hidden" name="receiveEmail" value="受け取らない">
                            <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer" type="checkbox" value="受け取る" id="receiveEmail" name="receiveEmail" {{ old('receiveEmail','受け取る') === '受け取る' ? 'checked' : '' }}>
                        </label>
                    </div>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="evaluation" class="">評価</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <div class="flex">
                    <select class="block appearance-none border border-gray-200 rounded leading-tight focus:outline-none my-2 w-full" id="evaluation" name="evaluation">
                        <option value="1" {{ old('evaluation') === '1' ? 'selected' : ''}}>1</option>
                        <option value="2" {{ old('evaluation') === '2' ? 'selected' : ''}}>2</option>
                        <option value="3" {{ old('evaluation', '3') === '3' ? 'selected' : ''}}>3</option>
                        <option value="4" {{ old('evaluation') === '4' ? 'selected' : ''}}>4</option>
                        <option value="5" {{ old('evaluation') === '5' ? 'selected' : ''}}>5</option>
                    </select>
                    <p class="my-auto">点</p>
                </div>
            </div>
            <div class="my-8">
                <div class="flex mr-auto">
                    <label for="opinion" class="">ご意見</label>
                    <p class="bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs">必須</p>
                </div>
                <textarea type="text" class="shadow border-gray-200 rounded block ms-auto my-2 w-full resize-none" placeholder="入力してください" name="opinion" id="opinion">{{ old('opinion') }}</textarea>
            </div>
            <button class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto" type="submit">
                確認
            </button>
            <form>
    </div>
</div>

@endsection
