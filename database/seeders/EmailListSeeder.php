<?php

namespace Database\Seeders;

use App\Models\EmailList;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmailListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            $user->emailLists()->saveMany(
                EmailList::factory()->count(7)->make()
            );
        });
    }
}
