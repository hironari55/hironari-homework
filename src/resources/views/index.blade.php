@extends('layouts.app')

@section('content')
<main>
    @foreach($allRestaurants as $restaurant)
    <div class="w-9/12 mx-auto my-5 py-5 border rounded-md shadow flex">
        <div class="w-2/5 mx-5 my-auto">
            <img src="/images/McDonald's.png" alt="マクドナルド">
        </div>
        <div class="w-2/5 ml-auto mx-auto">
            <h2 class="mb-8 text-2xl">{{ $restaurant->name }}</h2>

            @if($AverageRatings[$loop->index] > 0)
            <div class="mb-8">{{$AverageRatings[$loop->index]}}</div>
            @else
            <div class="mb-8">まだレビューがありません</div>
            @endif

            <p class="mb-10">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
            <div class="flex text-white">
                <a href="" class="btn py-4 px-8 rounded-md bg-green-500">詳細</a>
                <a href="{{ route('reviews.create',['id' => $restaurant->id ]) }}" class="btn p-4 rounded-md ml-auto bg-blue-500">レビューする</a>
            </div>
        </div>
    </div>
    @endforeach
</main>
@endsection
