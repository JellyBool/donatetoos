<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="keywords" content="开源,开源项目,捐赠">
    <meta name="description" content="在软件开发领域，希望你总是想着给予大于索求；每天为优秀开源项目捐赠一点心意，也是一件不错的事。">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>捐赠给 {{ $repostory->full_name }} </title>
    <link rel="shortcut icon" href="https://laravist.com/images/favicon.ico">
    <link rel="stylesheet" href="/css/profile.css">
</head>
<body>
<div class="route" id="buy"></div>
<section class="giftcard">
    <section class="giftcard-cover">
            <img src="{{ $repostory->repo_owner_avatar }}"
                 alt="{{ $repostory->repo_owner_name }}"
                 class="mdl-list__item-avatar"
            >
        <p style="color:#fff;">
            @<a style="color:#fff;" href="https://github.com/{{ $repostory->repo_owner_name }}">{{ $repostory->repo_owner_name }}</a>
        </p>
        {{--<span class="devicons devicons-github_badge"></span>--}}
        {{--<h2>{{ $repostory->full_name }}</h2>--}}
    </section>
    <div class="giftcard-content">
        <h2>你将捐赠到 {{ $repostory->full_name }} 项目:</h2>
        <address>
            <h3>款项说明</h3>
            <a href="https://github.com/{{ $repostory->full_name }}" target="_blank">1.项目地址：{{ $repostory->full_name }}</a>
            <a href="#">2.不支持退款</a>
        </address>
        <div class="subtext">支持支付宝付款</div>
    </div>
    <footer class="giftcard-footer">
        <div class="giftcard-text">
            <h1>{{ $repostory->full_name }}</h1>
            <h2>{{ $repostory->language }}</h2>
        </div>
        <div class="ribbon">
            <div class="giftwrap">
                <a href="#buy" class="button">捐赠</a>
            </div>
            <div class="bow">
                <i class="fa fa-bookmark"></i>
                <i class="fa fa-bookmark"></i>
            </div>
        </div>

        <div class="giftcard-info">
            <form action="/pay" method="post" class="giftcard-form">
            <div>
                <input type="text" name="fee"  placeholder="捐赠金额" />
                {{ csrf_field() }}
                <input type="hidden" name="repo_id" value="{{ $repostory->id }}">
                <input type="hidden" name="channel" value="alipay_pc_direct">
            </div>
            <div>
                <button type="submit" class="button secondary">确认捐赠</button>
            </div>
            </form>
        </div>

    </footer>
</section>


</body>
</html>