<?php

namespace Database\Seeders;

use App\Models\Campaings;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampaingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            $templates = $user->templates();
            $emailLists = $user->emailLists();

            $template = $templates->inRandomOrder()->get()->first();
            $emailList = $emailLists->inRandomOrder()->get()->first();

            if (!$template || !$emailList) {
                return;
            }

            $campaings = Campaings::factory()
                ->count(3)
                ->create([
                    'body' => $template->body,
                    'template_id' => $template->id,
                    'email_list_id' => $emailList->id,
                ]);

            $user->campaings()->saveMany($campaings);
        });
    }
}
