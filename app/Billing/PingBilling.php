<?php
namespace App\Billing;

use Pingpp\Charge;
use Pingpp\Error\Base;
use Pingpp\Pingpp;
use Session;

/**
 * Class PingBilling
 * @package App\Billing
 */
class PingBilling implements BillingInterface {

    /**
     * PingBilling constructor.
     */
    public function __construct()
    {
        Pingpp::setApiKey(env('PING_API_KEY'));
    }

    /**
     * @param array $data
     */
    public function charge(array $data)
    {
        $channel = $data['channel'];
        try{
            return  Charge::create([
                'order_no' => $this->makeOrderNumber(),
                'app' => ['id' => env('PING_APP_ID')],
                'channel' => $channel,
                'client_ip'=>\Request::ip(),
                'amount' => $data['fee'],
                'currency' => 'cny',
                'subject' => $data['subject'],
                'body' => $data['body'],
                'extra' => $this->createExtra($channel)
            ]);
        } catch (\Pingpp\Error\Base $e){
            return redirect()->refresh();
        }

    }



    /**
     * @param $channel
     * @return array
     */
    protected function createExtra($channel)
    {
        $extra = [];
        switch ($channel) {
            case 'alipay_pc_direct' :
                $extra['success_url'] = env('DOMAIN_NAME').'/payment/done';
                break;
            case 'wx_pub_qr':
                $extra['product_id'] = $this->makeOrderNumber();
                break;
        }

        return $extra;
    }

    /**
     * @return string
     */
    protected function makeOrderNumber()
    {
        return time() . mt_rand(100, 99999);
    }
}