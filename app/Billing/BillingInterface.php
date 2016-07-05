<?php
namespace App\Billing;

interface BillingInterface
{
    public function charge(array $data);
}