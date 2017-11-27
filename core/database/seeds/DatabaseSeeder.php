<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SexesTableSeeder');
		$this->command->info('Sexes table seeded with Female and Male');

        $this->call(LookupKeyTableSeeder::class);
        $this->command->info('LookupKey table seeded with icd10, context and date');

    }
}

class SexesTableSeeder extends Seeder
{
    /**
     * Run the sexes table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->delete();

        App\Models\Sex::create(['sex' => 'Female']);
        App\Models\Sex::create(['sex' => 'Male']);
    }
}

class LookupKeyTableSeeder extends Seeder
{
    /**
     * Run the lookupkey table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lookupkey')->delete();

        App\Models\LookupKey::create(['key' => 'icd10']);
        App\Models\LookupKey::create(['key' => 'context']);
        App\Models\LookupKey::create(['key' => 'date']);
        App\Models\LookupKey::create(['key' => 'title']);
        App\Models\LookupKey::create(['key' => 'related_nodes']);
        App\Models\LookupKey::create(['key' => 'related_urls']);
        App\Models\LookupKey::create(['key' => 'marker']);
        App\Models\LookupKey::create(['key' => 'index']);
        App\Models\LookupKey::create(['key' => 'schedule']);
        App\Models\LookupKey::create(['key' => 'inn']);
        App\Models\LookupKey::create(['key' => 'innname']);
        App\Models\LookupKey::create(['key' => 'tradename']);
        App\Models\LookupKey::create(['key' => 'pathogen']);
        App\Models\LookupKey::create(['key' => 'drugname']);
        App\Models\LookupKey::create(['key' => 'figure']);
        App\Models\LookupKey::create(['key' => 'table']);
    }
}
