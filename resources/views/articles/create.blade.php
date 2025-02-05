@extends('layouts.app')

@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card ">
                <div class="card-header">Create Article</div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control rounded-0">
                        </div>
                        <div class="form-group mb-2">
                            <label for="content">content</label>
                            <textarea name="content" id="content" class="form-control rounded-0"></textarea>
                        </div>
                        <div class="float-end ">
                            <a href="{{ route('articles.index')}}" class="btn btn-secondary btn-sm me-2">Cancel</a>
                            <button type="submit"  class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
