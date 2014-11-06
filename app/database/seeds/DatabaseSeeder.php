<?php

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder {

    /**
     * Tables that will need seed data
     *
     * @var array
     */
    private $tables = [
        'movies',           # Real data
        'actors',           # Real data
        'users',
        'languages',        # Real data
        'nationalities',    # Real data
        'genre_movie',      # Real data
        'actor_movie',      # Real data
        'movie_studio',     # Real data
        'language_movie',   # Real data
        'watched',
        'to_watch',
        'actor_comment',
        'movie_comment',
        'movie_likes',
        'actor_likes',
    ];

    /**
     * Seeder classes that needs to be run when creating new generated seedings
     *
     * @var array
     */
    private $seeders = [
        #'UsersTableSeeder',
        #'LanguagesTableSeeder',
        #'NationalitiesTableSeeder',
        #'GenresTableSeeder',
        #'StudiosTableSeeder',
        #'ActorsTableSeeder',
        'MoviesTableSeeder',
        #'WatchedTableSeeder',
        #'ToWatchedTableSeeder',
        #'ActorCommentTableSeeder',
        #'MovieCommentTableSeeder',
        #'MovieLikesTableSeeder',
        #'ActorLikesTableSeeder',
    ];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        DB::disableQueryLog();

        #$this->cleanDatabase();

        foreach($this->seeders as $seed) {
            $this->call($seed);
        }

        DB::enableQueryLog();

    }

    /**
     * Clean out the database for a new databse seeding
     */
    private function cleanDatabase() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
