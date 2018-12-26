<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // User::create([
        //     'name'=>'Admin',
        //     'email'=>'admin@email.com',
        //     'level'=>0,
        //     'password'=>bcrypt('123'),
        //     'flag'=>1
        // ]);
        Eloquent::unguard();
        $path = storage_path('app/db_indonesia_all.sql');
        $this->command->info($path);
        DB::unprepared(file_get_contents($path));
        $this->command->info('All tables seeded!');
    }
}
