@extends('layouts.app')

@section('content')
<div class="text-xl text-center mt-10">
    ご意見をお送りいただきありがとうございました
</div>
<div class="text-center mt-10">
    <a href="{{ route('reviews.index') }}" class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto text-center">お店一覧に戻る</a>
</div>
@endsection
