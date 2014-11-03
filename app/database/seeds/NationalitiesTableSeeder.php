<?php

class NationalitiesTableSeeder extends Seeder {

    public function run()
    {
        $file = file(base_path() . "/seedfiles/nationalities.txt");

        foreach($file as $l) {
            $l = preg_replace( "/\r|\n/", "", $l ); # Remove unwanted character returns
            DB::insert('INSERT INTO nationalities (nationality, updated_at, created_at) VALUES(?, NOW(), NOW())', [$l]);
        }
    }

}