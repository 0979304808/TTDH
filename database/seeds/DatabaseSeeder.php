<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Categories\Category;
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
        $this->call(LaratrustSeeder::class);
        // Tài khoản admin
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'active' => 2
        ]);
        $user->roles()->attach(1);

        // Tạo category
        Category::create([
            'name' => 'Nổi Bật',
            'slug' => create_slug('Nổi Bật')
        ]);
    }
}
