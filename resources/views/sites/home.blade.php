@extends('app')
@section('content')
    <div class="android-be-together-section mdl-typography--text-center">
        <div class="logo-font android-slogan">
           You Are Helpful
        </div>
        <div class="logo-font android-sub-slogan">
            哪怕是一块钱，也是对开源项目的支持和贡献
        </div>

    </div>
    <div class="android-more-section">
            {{--<div class="mdl-typography--font-light mdl-typography--display-1-color-contrast mdl-typography--text-center">最火项目</div>--}}
        <div class="android-card-container mdl-grid">
            @foreach($repostories as $repostory)
                <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                    <a href="/repo/{{ $repostory->id }}"
                       class="mdl-card__title"
                       target="_blank"
                    >
                        <h4 class="mdl-card__title-text">{{ $repostory->full_name }}</h4>
                    </a>
                    <div class="mdl-card__supporting-text">
                        <span class="mdl-typography--font-light mdl-typography--subhead">
                            {{ $repostory->description }}
                        </span>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="https://github.com/{{ $repostory->full_name }}" target="_blank" class="github-button">
                            <i class="devicons devicons-github_badge"></i>
                            <span>Star</span>
                        </a>
                        <a href="https://github.com/{{ $repostory->full_name }}" target="_blank" class="github-count">
                            <b></b>
                            <i></i>
                            <span>{{ $repostory->stars }}</span>
                        </a>
                        <a class="author" href="{{ $repostory->repo_owner_profile_url }}">
                            <img src="{{ $repostory->repo_owner_avatar }}" alt="" width="24" class="img-circle">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop