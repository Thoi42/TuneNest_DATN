<!-- user/category_item.blade.php -->
<li>
    <a href="{{ route('shop.category', $category->slug) }}">{{ $category->name }}</a>
    
    @php
        $childCategories = $productCategories->filter(function($cat) use ($category) {
            return $cat->parent_id == $category->id;
        });
    @endphp

    @if($childCategories->isNotEmpty())
        <ul>
            @foreach($childCategories as $childCategory)
                @include('user.layouts.component.category_item', ['category' => $childCategory, 'productCategories' => $productCategories])
            @endforeach
        </ul>
    @endif
</li>