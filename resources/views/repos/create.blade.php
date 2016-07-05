@extends('app')
@section('content')
    <div class="android-be-together-section mdl-typography--text-center">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset-desktop">
                <form action="/repo" method="POST">
                    {{ csrf_field() }}
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="repo" class="mdl-textfield__input" type="text" id="sample3">
                        <label class="mdl-textfield__label" for="sample3">repo name</label>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--primary">
                        添加
                    </button>
                </form>
            </div>
        </div>

    </div>
@stop