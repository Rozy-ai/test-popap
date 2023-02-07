@extends('backend.admin.layouts.common')

@section('content')


<nav>
    <a href="#" class="nav-link">Popapa</a>
</nav>

<main>
    <div class="container">
        <h3 class="text-blue mt-4">Edit Popapa</h3>
        <div class="create_card mt-5">
            <form method="POST" action="{{ route('popapas.update', $popapa->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="common pt-5 pb-4">
                        <div class="mb-5">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" value="{{ old('name', $popapa->title) }}" name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="content">Content</label>
                            <textarea type="text" name="content" id="summernote">{{ old('name', $popapa->content) }}</textarea>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option @if ($popapa->status === 0)  selected @endif value="0">0</option>
                                <option @if ($popapa->status === 1)  selected @endif value="1">1</option>
                            </select>
                        </div>
                        <div class="d-f">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('popapas.index') }}" class="btn btn-secondary back">Back</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</main>

@endsection