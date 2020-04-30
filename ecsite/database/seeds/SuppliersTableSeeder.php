<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'name'              => 'supplier',
            'email'             => 'supplier@email.com',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
