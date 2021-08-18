@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">編集</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('board.update', ['id' => $post->id]) }}">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{$post->id}}" />
                        <div class="form-group row">
                            <label for="title" class="col-12 col-form-label">タイトル</label>
                            <div class="col-12">
                                <input id="title" type="string" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?: $post->title }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-12 col-form-label">コンテンツ</label>
                            <div class="col-12">
                                <textarea id="content" type="string" class="form-control @error('content') is-invalid @enderror" name="content" required>{{ old('content') ?: $post->content }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-10">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" value="send">編集完了</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
