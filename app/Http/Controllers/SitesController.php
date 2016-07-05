<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Repostory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;

class SitesController extends Controller
{
    public function home()
    {
        $repostories = $this->fetchRepostory();
        return view('sites.home', compact('repostories'));
    }

    public function members()
    {
        $users = $this->fetchUsers();

        return view('sites.users', compact('users'));
    }

    public function privacy()
    {
        return view('sites.privacy');
    }

    public function involve()
    {
        return view('sites.involve');
    }

    public function donations()
    {
        //这里其实可以写得更好的
         $payments = Payment::select('id', 'fee', 'created_at')
             ->latest()
             ->today()
             ->get()
             ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->hour;
             });
        $weeks = Payment::select('id', 'fee', 'created_at')
            ->latest()
            ->lastWeek()
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->day;
            });
        $xToday = '';
        $yToday = '';
        $xWeek = '';
        $yWeek = '';
        foreach ($payments as $key => $payment) {
            $xToday='"'.$key.':00",'.$xToday;
            $fee = $payment->sum('fee') / 100;
            $yToday = $fee.','.$yToday;
        }
        foreach ($weeks as $key => $week) {
            $xWeek='"'.$key.'号",'.$xWeek;
            $fee = $week->sum('fee') / 100;
            $yWeek = $fee.','.$yWeek;
        }
        return view('sites.donate',compact(
            'xToday','yToday','xWeek','yWeek'
        ));
    }

    public function login()
    {
        return view('user.login');
    }

    protected function fetchRepostory()
    {
        return Repostory::whereIn('id', config('donatoos.feature'))->get();
    }

    protected function fetchUsers()
    {
        return User::latest()->get();
    }

    public function pay(Requests\DonationRequest $request)
    {
        $repo = Repostory::find($request->get('repo_id'));
        $billing = app('App\Billing\BillingInterface');
        $charge = $billing->charge([
            'channel' => $this->channel($request->get('channel')),
            'fee'     => $request->get('fee') * 100,
            'subject' => 'donato-to-' . $repo->name,
            'body'    => Auth::check() ? Auth::id() : 0,
        ]);
        return view('sites.charge', compact('charge'));
    }

    protected function channel($gateway)
    {
        if ($this->validChannel($gateway)) {
            return $gateway;
        }

        return 'alipay_pc_direct';
    }

    protected function validChannel($channel)
    {
        $gateways = ['alipay_pc_direct', 'wx_pub_qr'];

        return in_array($channel, $gateways, true);
    }
    
    
}
