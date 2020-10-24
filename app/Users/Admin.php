<?php


namespace App\Users;


class Admin
{
    public function adminable()
    {
        $this->morphTo();
    }
}
