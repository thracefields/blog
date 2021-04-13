<?php

Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('Начало', route('welcome'));
});


Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Начало', route('home'));
});

// Dashboard >Profile
Breadcrumbs::for('profiles.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Профил', route('profiles.index'));
});

// Dashboard > Profile > Edit Profile
Breadcrumbs::for('profiles.edit', function ($trail) {
    $trail->parent('profiles.index');
    $trail->push('Редактиране на профил', route('profiles.edit', Auth::user()->profile->slug));
});

// Dashboard > Change Password
Breadcrumbs::for('settings.password.edit', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Промяна на парола', route('settings.password.edit'));
});


// Forum
Breadcrumbs::for('forums.index', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Форум', route('forums.index'));
});

// Forum > [Thread]
Breadcrumbs::for('forums.threads.show', function ($trail, $thread) {
    $trail->parent('forums.index');
    $trail->push($thread->title, route('forums.threads.show', $thread->slug));
});

Breadcrumbs::for('articles.show', function($trail, $article) {
    $trail->parent('welcome');
    $trail->push($article->category->name, route('categories.show', $article->category->slug));
    $trail->push($article->title, route('articles.show', $article->slug));
});

