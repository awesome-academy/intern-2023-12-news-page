<div class="bg-dark py-md-1 categories-nav container-fluid">
    <div class="container">
        <div class="row d-flex flex-nowrap align-items-center justify-content-between container-categories">
            <div class="categories">
                <div class="categories-wrapper">
                    <ul class="categories-links d-flex">
                        @foreach ($categories as $item)
                            <li class="category-item" style="width: fit-content;">
                                <a href="{{ route('search', ['slug' => $item->slug, 'type' => config('constants.category.categoryType')]) }}"
                                    class="category-link">
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
