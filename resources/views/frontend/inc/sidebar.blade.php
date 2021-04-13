<div class="sidebar__item">
    <h4>Categories</h4>
    <ul>
        @foreach ($categories as $item)
            <li><a href="{{ route('category.page', $item->id) }}">{{ $item->category_name }}</a></li>
        @endforeach
    </ul>
</div>
