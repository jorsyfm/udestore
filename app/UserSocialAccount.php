<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model {
    /**
    * Get de qué usuario se logueó con qué red social
    */
    public function user() {
        $this->belongsTo(User::class);
    }
}
