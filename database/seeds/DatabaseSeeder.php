<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
	public function run(){
		DB::table('users')->insert([
			[
				'username'=>'admin5',
				'email'=>'admin5@dataeglobal.com',
				'password'=>bcrypt('admin5'),
			]
		]);
	}
}