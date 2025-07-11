<?php

namespace Database\Seeders;

use App\Models\EmailList;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailList::all()->each(function ($emailList) {
            $emailList->subscribers()->saveMany(
                Subscriber::factory()->count(rand(7, 15))->make(['email_list_id' => $emailList->id])
            );
        });
    }
}
