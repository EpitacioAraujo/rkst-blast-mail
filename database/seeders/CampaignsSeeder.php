<?php

namespace Database\Seeders;

use App\Models\Campaigns;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampaignsSeeder extends Seeder
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

            $campaigns = Campaigns::factory()
                ->count(3)
                ->create([
                    'body' => $template->body,
                    'template_id' => $template->id,
                    'email_list_id' => $emailList->id,
                ]);

            $user->campaigns()->saveMany($campaigns);
        });
    }
}
