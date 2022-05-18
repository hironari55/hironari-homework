@extends('layouts.app')

@section('content')
<main>
    <div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow flex">
        <div class="w-2/5 mx-5 my-auto">
            <img src="/images/McDonald's.png" alt="マクドナルド">
        </div>
        <div class="w-2/5 ml-auto mx-auto">
            <h2 class="mb-8 text-2xl">マクドナルド</h2>
            @if($macAverageRating > 0)
                <div class="mb-8">星星星星星({{ $macAverageRating }})</div>
            @else
                <div class="mb-8">まだレビューがありません</div>
            @endif
            <p class="mb-10">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="flex text-white">
                <a href="" class="btn py-4 px-8 rounded-md bg-green-500">詳細</a>
                <a href="" class="btn p-4 rounded-md ml-auto bg-blue-500">レビューする</a>
            </div>
        </div>
    </div>

    <div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow flex">
        <div class="w-2/5 mx-5 my-auto">
            <img src="/images/MosBurger.png" alt="モスバーガー">
        </div>
        <div class="w-2/5 ml-auto mx-auto">
            <h2 class="mb-8 text-2xl">モスバーガー</h2>
            @if($mosAverageRating > 0)
                <div class="mb-8">星星星星星({{ $mosAverageRating }})</div>
            @else
                <div class="mb-8">まだレビューがありません</div>
            @endif
            <p class="mb-10">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="flex text-white">
                <a href="" class="btn py-4 px-8 rounded-md bg-green-500">詳細</a>
                <a href="" class="btn p-4 rounded-md ml-auto bg-blue-500">レビューする</a>
            </div>
        </div>
    </div>

    <div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow flex">
        <div class="w-2/5 mx-5 my-auto">
            <img src="/images/Kentucky.png" alt="ケンタッキー">
        </div>
        <div class="w-2/5 ml-auto mx-auto">
            <h2 class="mb-8 text-2xl">ケンタッキー</h2>
            @if($kentuckyAverageRating > 0)
                <div class="mb-8">星星星星星({{ $kentuckyAverageRating }})</div>
            @else
                <div class="mb-8">まだレビューがありません</div>
            @endif
            <p class="mb-10">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="flex text-white">
                <a href="" class="btn py-4 px-8 rounded-md bg-green-500">詳細</a>
                <a href="" class="btn p-4 rounded-md ml-auto bg-blue-500">レビューする</a>
            </div>
        </div>
    </div>
</main>
@endsection
