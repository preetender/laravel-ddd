<?php

namespace App\Domain\Auth\Traits;

trait UserObservable
{
    /**
     * Boot
     *
     * @return void
     */
    public static function bootUserObservable(): void
    {
        static::creating(function ($user) {
            $user->password = bcrypt($user->password);
        });

        static::updating(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = bcrypt($user->password);
            }
        });
    }
}
