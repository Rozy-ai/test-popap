@extends('backend.admin.layouts.common')
@section('content')

<nav></nav>

<main>
    <div class="container">
        <h3 class="text-blue mt-4">Create Modal</h3>
        <div class="create_card mt-5">
            <form method="POST" action="{{ route('popapas.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="common pt-5 pb-4">
                        <div class="mb-5">
                            <label class="form-label" for="title">Title</label>
                            <input type="text"  name="title" id="title" class="form-control">
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="content">Content</label>
                            <textarea type="text" name="content" id="summernote" class="form-control"></textarea>
                        </div>
                        <div class="mb-5">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">1</option>
                                <option value="0">0</option>
                            </select>
                        </div>
                        <div class="d-f">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('popapas.index') }}" class="btn btn-secondary back">Back</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</main>

@endsection
