<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class PaymentsController extends Controller
{
    protected $httpVerifyUrl = 'https://mapi.alipay.com/gateway.do?service=notify_verify&';

    public function notify()
    {
        $raw = file_get_contents('php://input');
        $headers = \Pingpp\Util\Util::getRequestHeaders();
        $signature = isset($headers['X-Pingplusplus-Signature']) ? $headers['X-Pingplusplus-Signature'] : NULL;
        $publicKey = public_path(). '/rsa_public_key.pem';
        $result = $this->verifySignature($raw, $signature, $publicKey);
        if ($result === 1) {
            $event = json_decode($raw, true);
            $charge = $event['data']['object'];
            if ($event['type'] == 'charge.succeeded') {
                //在这里处理具体的通知代码
                $payment = [
                    'charge_id' => $charge['id'],
                    'user_id' => $charge['body'],
                    'type' => $charge['channel'],
                    'subject' => $charge['subject'],
                    'fee' => $charge['amount'],
                    'ip' => $charge['client_ip'],//这里本来应该记录用户的账号的
                    'transaction_no' => $charge['transaction_no'],
                ];

                Payment::create($payment);
                http_response_code(200);//返回 200 状态码给Ping++
            }
        }
    }
    protected function verifySignature($raw_data, $signature, $publicKey) {
        $pub_key_contents = file_get_contents($publicKey);
        return openssl_verify($raw_data, base64_decode($signature), $pub_key_contents, 'sha256');
    }

    public function paymentRedirect(Request $request)
    {
        if ($this->isFromAlipay($request->get('notify_id'))) {
            \Session::flash('donate_success', '感谢你的慷慨捐赠');
            return redirect('/');
        }
        \Session::flash('donate_failed', '付费失败，请联系Jelly！');
        return redirect('/');
    }

    protected function isFromAlipay($notifyId)
    {
        $url = $this->httpVerifyUrl . 'partner=' . trim(env('ALIPAY_PID')) . '&notify_id=' . $notifyId;

        $response = $this->getResponseFrom($url);

        return !!preg_match("/true$/i", $response);
    }

    protected function getResponseFrom($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0); // 过滤HTTP头
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
        curl_setopt($curl, CURLOPT_CAINFO, config_path() . '/key/cacert.pem');//证书地址
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
