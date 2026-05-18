<?php
namespace App\Services;


class SubscriptionManager
{
    public function isPrimiumUser(string $user)
    {
    return strtolower($user) === 'dhruv';
    }
}

?>