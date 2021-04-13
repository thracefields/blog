@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box">
        <aside class="menu">
            <p class="menu-label">Тагове</p>
            <ul class="menu-list">
                @foreach ($tags as $tag)
                <li><a href="{{ route('tags.show', $tag->slug) }}">
                        <span class="icon">
                            <i class="fas fa-tag"></i>
                        </span>
                        <span>{{ $tag->name }} <span class="tag">{{ $tag->articles->count() }}</span></span>
                    </a></li>
                @endforeach
            </ul>
        </aside>
    </div>
    <div>{{ $tags->links() }}</div>
</div>
@endsection
