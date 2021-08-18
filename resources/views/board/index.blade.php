@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        @foreach ($items as $item)
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header">{{ $item->title }}</div>
                <div class="card-body">
                    <p>{{ $item->content }}</p>
                    <div class="row">
                        <div class="col-5 offset-3">
                            <div class="row">
                                <div class="col-6">
                                    <p>投稿者: {{ $item->user->name }}</p>
                                </div>
                                <div class="col-6">
                                @if($item->is_liked_user())
                                    <a href="{{ route('board.unlike', ['id' => $item->id]) }}">
                                        <img class="heart-icon" src="{{ asset('img/heart-solid.svg') }}" alt="heart" />
                                        <span>{{ $item->likes->count() }}</span>
                                    </a>
                                    @else
                                    <a href="{{ route('board.like', ['id' => $item->id]) }}">
                                        <img class="heart-icon" src="{{ asset('img/heart-regular.svg') }}" alt="heart" />
                                        <span>{{ $item->likes->count() }}</span>
                                    </a>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                @if ($item->user_id === Auth::user()->id)
                                <div class="col-6">
                                    <form method="GET" action="{{ route('board.edit', ['id' => $item->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">編集する</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <form method="POST" action="{{ route('board.delete', ['id' => $item->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary">削除する</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
