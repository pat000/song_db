<?php

use Illuminate\Database\Seeder;
use App\Applicants;

class ApplicantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        factory(Applicants::class, $count)->create();
    }
}
