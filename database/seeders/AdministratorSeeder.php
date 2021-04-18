<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->username = "admin";
        $administrator->name = "Site Administrator";
        $administrator->email = "admin@larashop.com";
        $administrator->roles = json_encode(['ADMIN']);
        $administrator->password = Hash::make("larashop");
        $administrator->avatar = "no-file.png";
        $administrator->address = "Karangmekar, Karangsembung, Cirebon";
        $administrator->phone = "083195522115";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
