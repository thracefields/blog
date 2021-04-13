@extends('layouts.manage')

@section('content')
@card
@slot('title', 'Добавяне на статия')
<form method="POST" action="{{ route('manage.articles.store') }}" enctype="multipart/form-data">
    @csrf
    @honeypot
    <div class="field">
        <label class="label">Заглавие</label>
        <div class="control">
            <input class="input @error('title') is-danger @enderror" type="text" name="title">
            @error('title')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <label class="label">Подзаглавие</label>
        <div class="control">
            <input class="input @error('subtitle') is-danger @enderror" type="text" name="subtitle">
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
                    <span class="file-label">Изберете изображение</span>
                </span>
                <span class="file-name">Няма избрано изображение!</span>
            </label>
            @error('featured_name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <label for="category" class="label">Категория</label>
        <div class="select">
            <select name="category" id="category" class="@error('category') is-danger @enderror">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
        <label for="password" class="label">Публикуване</label>
        <div class="field">
            <b-radio name="publishing_options" v-model="publishing_options" native-value="immediately">Веднага</b-radio>
        </div>
        <div class="field">
            <b-radio name="publishing_options" v-model="publishing_options" native-value="specific">Определенa дата и
                час
            </b-radio>
            <b-field label="Изберете дата:" v-if="publishing_options == 'specific'">
                <b-datepicker :month-names="monthNames" :day-names="dayNames" :min-date="minDate"
                    custom-class="@error('publishing_date') is-danger @enderror" icon="calendar-today"
                    name="publishing_date">
                </b-datepicker>
            </b-field>
            @error('publishing_date')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
            <b-field label="Изберете час:" v-if="publishing_options == 'specific'">
                <b-timepicker custom-class="@error('publishing_time') is-danger @enderror" placeholder="" icon="clock"
                    name="publishing_time" editable>
                </b-timepicker>
            </b-field>
            @error('publishing_time')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="field">
        <label for="content" class="label">Съдържание</label>
        <div class="control">
            <textarea class="textarea" name="content" id="content" cols="30" rows="10"></textarea>
            @error('content')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="field">
        <button class="button is-info" type="submit">Публикувай!</button>
    </div>
</form>
@endcard
@endsection
@section('js-body')
<script>
    var today = new Date();
    new Vue({
        el: '#app',
        data: {
            data: {!! $tags !!},
            filteredTags: this.data,
            isSelectOnly: false,
            tags: [],
            allowNew: false,
            publishing_options: 'immediately',
            monthNames: [
                'Януари',
                'Февруари',
                'Март',
                'Април',
                'Май',
                'Юни',
                'Юли',
                'Август',
                'Септември',
                'Октомври',
                'Ноември',
                'Декември'
            ],
            dayNames: [
                'П',
                'В',
                'С',
                'Ч',
                'П',
                'С',
                'Н'
            ],
            minDate: new Date()
        },
        computed: {
            selectedTags: function () {
                return this.tags.map(function(a) { return a.id });
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