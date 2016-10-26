<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(OrderSeeder::class);
         $this->call(CupomSeeder::class);

        DB::table('oauth_clients')->insert([
            'name' => 'app',
            'secret' => 'secret',
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);

        Model::reguard();
    }
}
