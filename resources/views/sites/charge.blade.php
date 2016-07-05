<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>收款</title>
</head>
<script src="/js/pingpp.js"></script>
<body>

<script>
    var charge = {!! $charge !!};

    pingpp.createPayment(charge, function(result, err){
        if (result == "success") {
            // 只有微信公众账号 wx_pub 支付成功的结果会在这里返回，其他的支付结果都会跳转到 extra 中对应的 URL。
        } else if (result == "fail") {
            // charge 不正确或者微信公众账号支付失败时会在此处返回
        } else if (result == "cancel") {
            // 微信公众账号支付取消支付
        }
    });
</script>
</body>
</html>