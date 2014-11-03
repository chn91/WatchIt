<?php

class LanguagesTableSeeder extends Seeder {

	public function run()
	{

        $file = file(base_path() . "/seedfiles/languages.txt");

        foreach($file as $l) {
            $l = preg_replace( "/\r|\n/", "", $l ); # Remove unwanted character returns
            DB::insert('INSERT INTO languages (language, updated_at, created_at) VALUES(?, NOW(), NOW())', [$l]);
        }

	}

}