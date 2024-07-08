<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserPasswords extends Command
{
    protected $signature = 'user:update-passwords';
    protected $description = 'Update all user passwords to use Bcrypt hashing algorithm';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();
        $this->info('Starting to update user passwords...');

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info('Updated password for user ID: ' . $user->id);
            } else {
                $this->info('Password for user ID: ' . $user->id . ' does not need rehashing.');
            }
        }

        $this->info('Finished updating user passwords.');
    }
}
