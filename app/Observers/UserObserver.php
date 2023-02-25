<?php
declare (strict_types = 1);
namespace App\Observers;
use App\Models\User;
class UserObserver {
    public function created(User $admin): void {
        $admin->profile()->create([]);
    }

    public function creating(User $admin) {
        $admin->password = bcrypt($admin->password);
    }
}
