@extends('app')
@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--10-col mdl-cell--9-col-tablet mdl-cell--1-offset members">
            @foreach($users->chunk(3) as $userRow)
        <ul class="demo-list-three mdl-list">
            @foreach($userRow as $user)
            <li class="mdl-list__item mdl-list__item--three-line">
         <span class="mdl-list__item-primary-content">
               <img src="{{ $user->avatar }}" class="mdl-list__item-avatar" alt="{{ $user->name }}" width="64">
       <span>{{ $user->name }}</span>
       <span class="mdl-list__item-text-body">
          <span class="info">{{ $user->created_at->toDateString() }}</span>
          <br>
         <span class="follow">
          <a href="{{ $user->name }}" target="_blank" class="btn btn-sm  js-toggler-target">
            Follow
          </a>
  </span>

      </span>
    </span>
            </li>
                @endforeach
        </ul>
                @endforeach
        </div>
    </div>
    <style>
        .members .mdl-list__item--three-line {
            height: 100px;
            display: inline-block;
            width: 32%;
        }
        .members a.btn-sm  {
            text-decoration: none;
        }
    </style>
@stop