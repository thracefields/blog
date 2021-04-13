@extends('layouts.manage')


@section('content')
@card
@slot('title', 'Редактиране на статия')
<form method="POST" action="{{ route('manage.articles.update', $article->slug) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @honeypot
    <div class="field">
        <label class="label">Заглавие</label>
        <div class="control">
            <input class="input @error('title') is-danger @enderror" type="text" name="title"
                value="{{ $article->title }}">
            @error('title')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <label class="label">Подзаглавие</label>
        <div class="control">
            <input class="input @error('subtitle') is-danger @enderror" type="text" name="subtitle"
                value="{{ $article->subtitle }}">
            @error('subtitle')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <div class="file has-name">
            <label class="file-label">
                <input class="file-input @error('featured_image') is-danger @enderror" type="file" name="featured_image"
                    accept=".jpg, .jpeg, .png">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">Изберете ново изображение</span>
                </span>
                <span class="file-name">Няма избрано изображение!</span>
            </label>
        </div>
        @error('featured_image')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="category" class="label">Категория</label>
        <div class="select">
            <select name="category" id="category" class="@error('category') is-danger @enderror">
                @foreach($categories as $category)
                <option {{ $article->category_id === $category->id ? 'selected' : ''}} value="{{ $category->id }}">
                    {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <input type="hidden" name="tags" v-model="selectedTags">
        <b-field label="Тагове">
            <b-taginput v-model="tags" :data="filteredTags" autocomplete field="name" icon="label"
                placeholder="Добави таг" @typing="getFilteredTags">
            </b-taginput>
        </b-field>
    </div>
    <div class="field">
        <label for="content" class="label">Съдържание</label>
        <div class="control">
            <textarea class="textarea" name="content" id="content" cols="30"
                rows="10">{{ $article->content }}</textarea>
            @error('content')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-info" type="submit">Редактирай!</button>
        </div>
    </div>
</form>
@endcard
@endsection
@section('js-body')
<script>
    var app = new Vue({
        el: '#app',
        data: {
            data: {!! $tags !!},
            filteredTags: this.data,
            isSelectOnly: false,
            tags: {!! $article->tags !!},
            allowNew: false,
        },
        computed: {
            selectedTags: function () {
                return this.tags.map(a => a.id);
            }
        },
        methods: {
            getFilteredTags(text) {
                this.filteredTags = this.data.filter(function (option) {
                    return option.name
                        .toString()
                        .toLowerCase()
                        .indexOf(text.toLowerCase()) >= 0
                })
            }
        }
    });

    var inscrybmde = new InscrybMDE({
        toolbarTips: false,
        toolbar: ['bold', 'italic', 'heading', 'unordered-list','ordered-list', 'link'],
        status: false
    });
</script>
@endsection
