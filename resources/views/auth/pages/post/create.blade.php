@section('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/create_post.js') }}" defer></script>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <div class="p-6 bg-white border-b border-gray-200 w-full rounded-md">
                <form action="{{route('posts.store')}}" method="post" class="position-relative" id="posts">
                    @csrf
                    <label for="title">{{ __('Category') }}: </label>
                    <select class="form-control" name='category'>
                    	<option value="">-- {{ __('Pick one') . ' ' . __('category') }} --</option>
                    	<option value="1">Option 1</option>
                    	<option value="2">Option 2</option>
                    	<option value="3">Option 3</option>
                    </select>
                    <label class="mt-4" for="title">{{ __('Title') }}: </label>
                    <input type="text" class="form-control" name="title">
                    <label class="mt-4" for="content">{{ __('Content') }}: </label>
                    <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    <label for="hashtag">{{ __('Hashtag') }}:
                        ({{ __('Press Back Until Empty Input To Remove Box Tag Or Click Outside The Search Block') }})</label>
                    <input type="text" class="form-control" name="hashtag">
                    <ul id="tagList">
                    </ul>
                    <input type="text" class="form-control" id="newTag">
                    <ul class="hashtag-result">
                    	<li data-slug="abc" data-id="1">abc</li>
                    	<li data-slug="abc" data-id="2">abc</li>
                    	<li data-slug="abc" data-id="3">abc</li>
                    	<li data-slug="abc" data-id="4">abc</li>
                   	<li data-slug="abc" data-id="5">abc</li>
                    	<li data-slug="abc" data-id="6">abc</li>
                   	<li data-slug="abc" data-id="7">abc</li>
                    	<li data-slug="abc" data-id="8">abc</li>
                    	<li data-slug="abc" data-id="9">abc</li>
                    </ul>
                    <a class="btn btn-lg btn-danger mt-4" href="{{ route('posts.index') }}">{{ __('Back') }}</a>
                    <button type="submit" class="btn btn-lg btn-primary mt-4">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    $('#content').summernote({
        placeholder: '...',
        tabsize: 2,
        height: 300
    });
    $('select').select2();
</script>
