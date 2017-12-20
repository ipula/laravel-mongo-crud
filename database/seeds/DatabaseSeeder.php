<?php

use App\User;
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
        // $this->call(UsersTableSeeder::class);
        $user=new User();
        $user->username="ipula";
        $user->email="ipula@gmail.com";
        $user->password=hash('sha256','123456');
        $user->save();

    }
}
