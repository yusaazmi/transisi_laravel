<?php

use Illuminate\Database\Seeder;
use App\User;
use Ramsey\Uuid\Uuid;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@transisi.id',
            'password' => bcrypt('transisi')
        ]);
        $admin->assignRole('admin');
    }
}
