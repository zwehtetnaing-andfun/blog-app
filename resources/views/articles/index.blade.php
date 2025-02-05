@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-12">
           @if (session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
           @endif
        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-3">
                <h2>Articles</h2>
                <div class="">
                    <a href="{{ route('articles.create')}}" class="btn btn-primary">Create Articles</a>
                </div>
            </div>
        </div>
        @foreach ($articles as $article)
        <div class="col-md-12 mx-auto">
            <div class="card ">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body">
                    <p class="text-muted">{{ $article->content }}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">{{ $article->created_at }}</p>
                        <div class="d-flex">
                            <div class="">
                                <a href="{{ route('articles.edit',$article->id)}}" class="d-block btn btn-info btn-sm me-2">Edit</a>
                            </div>
                            <form action="{{ route('articles.destroy',$article->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
