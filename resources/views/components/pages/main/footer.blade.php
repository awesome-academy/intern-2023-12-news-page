<div class="container-fluid bg-white footer" style="margin-top: 50px;">
    <div class="container">
        <div class="container-footer">
            <h4>{{ __('Top featured keywords') }}</h4>
            <div class="d-flex flex-wrap">
                @foreach ($hashtags as $item)
                    <a href="{{ route('search', ['slug' => $item->slug, 'type' => config('constants.hashtag.hashtagType')]) }}"
                        class="text-dark link-underline-light">{{ $item->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
