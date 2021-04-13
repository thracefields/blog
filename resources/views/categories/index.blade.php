@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box">
        <aside class="menu">
            <p class="menu-label">Категории</p>
            <ul class="menu-list">
                @foreach ($categories as $category)
                <li><a class="#" href="{{ route('categories.show', $category->slug) }}">
                        <span class="icon">
                            <i class="fas fa-list-ul"></i>
                        </span>
                        <span>{{ $category->name }} <span class="tag">{{ $category->articles->count() }}</span>
                    </a></li>
                @endforeach
            </ul>
        </aside>
    </div>
    <div>{{ $categories->links() }}</div>
</div>
@endsection
