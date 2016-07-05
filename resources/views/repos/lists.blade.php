@extends('app')
@section('content')
    <div class="mdl-grid" id="app">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--1-offset filters">
            <ul class="demo-list-item mdl-list">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Stars</h2>
                </div>
                <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-0">
  <input type="radio" id="option-0"
         class="mdl-radio__button"
         value=100
         v-model="star"
  >
  <span class="mdl-radio__label">All</span>
</label>
        </span>
                </li>
                <li class="mdl-list__item">
        <span class="mdl-list__item-primary-content">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-100">
  <input type="radio"
         id="option-100"
         class="mdl-radio__button"
         value=3000
         v-model="star"
  >
  <span class="mdl-radio__label">3000 以下</span>
</label>
        </span>
                </li>
                <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-200">
  <input type="radio" id="option-200"
         class="mdl-radio__button"
         value=9999
         v-model="star"
  >
  <span class="mdl-radio__label">3000 - 9999</span>
</label>
    </span>
                </li>
                <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
               <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-300">
  <input type="radio"
         id="option-300"
         class="mdl-radio__button"
         value=10000
         v-model="star"
  >
  <span class="mdl-radio__label">10000 以上</span>
</label>
    </span>
                </li>
            </ul>


            <ul class="demo-list-item mdl-list">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">语言</h2>
                </div>
                <li class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-700">
  <input type="radio" id="option-700"
         class="mdl-radio__button"
         value="All"
         v-model="langauge"
  >
  <span class="mdl-radio__label">All</span>
                  </label>

    </span>
                </li>

                <li class="mdl-list__item" v-for="lang in langauges">
    <span class="mdl-list__item-primary-content">
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect"
           for="option-@{{ $index+1 }}"
    >
  <input type="radio"
         class="mdl-radio__button"
         id="option-@{{ $index + 1 }}"
         value="@{{ lang }}"
         v-model="langauge"
  >
  <span class="mdl-radio__label">@{{ lang }}</span>
                  </label>

    </span>
                </li>
            </ul>


        </div>
        <div class="mdl-cell mdl-cell--8-col mdl-cell--9-col-tablet repos">
        <ul class="demo-list-three mdl-list">
            <li class="mdl-list__item mdl-list__item--three-line" v-for="repostory in repos | lang langauge | stars star ">
       <span class="mdl-list__item-primary-content">
           <a href="/repo/@{{repostory.id}}">
               <img src="@{{ repostory.repo_owner_avatar }}" class="mdl-list__item-avatar" alt="@{{ repostory.repo_owner_name }}" width="40">
           </a>
       <span>
               @{{ repostory.full_name }}
           <a href="https://github.com/@{{ repostory.full_name }}" target="_blank" class="github-button">
               <i class="devicons devicons-github_badge"></i>
               <span>Star</span>
           </a>
           <a href="https://github.com/@{{ repostory.full_name }}" class="github-count">
               <b></b>
               <i></i>
               <span>@{{ repostory.stars }}</span>
           </a>
</span>
       <span class="mdl-list__item-text-body">
            @{{ repostory.description }}
      </span>
    </span>
    <span class="mdl-list__item-secondary-content">
        <a href="/repo/@{{ repostory.id }}#buy" class="mdl-button mdl-js-button" target="_blank">
            打赏
        </a>
    </span>
            </li>
        </ul>
     </div>
    </div>
    <script>
        Vue.filter('lang', function (value, input) {
            return value.filter(function (item) {
                if(input == 'All'){
                    return true ;
                }
                return item.language == input ;
            });
        });
        Vue.filter('stars', function (value, stars) {
            return value.filter(function (item) {
                switch (stars){
                    case '3000' :
                        return item.stars < 3000;
                    case '9999' :
                        return (3000 <= item.stars && item.stars <= 9999);
                    case '10000' :
                        return item.stars >= 10000;
                    default :
                        return true;

                }
            });
        })
        new Vue({
            el:'#app',
            data:{
                repos:[],
                langauges:[],
                langauge:'All',
                star:100
            },
            ready() {
                this.$http.get('/api/repos').then((response) => {
                    this.repos = response.data.repos;
                    this.langauges = response.data.langs;
                }, (response) => {
                });
            },
            methods:{

            }
        });
    </script>
@stop