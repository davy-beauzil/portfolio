<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = new User();
        $user->name = 'Davy';
        $user->email = 'davy.beauzil72@gmail.com';
        $user->password = bcrypt('Jeunes@peurp16');
        $user->save();
    }
}
