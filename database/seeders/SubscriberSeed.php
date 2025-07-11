<?php

namespace Database\Seeders;

use App\Models\EmailList;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubscriberSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailList::all()->each(function ($emailList) {
            $emailList->subscribers()->saveMany(
                Subscriber::factory()->count(rand(15, 25))->make(['email_list_id' => $emailList->id])
            );
        });
    }
}
