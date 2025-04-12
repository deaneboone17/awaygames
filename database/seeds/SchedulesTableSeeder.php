<?php

use Illuminate\Database\Seeder;
use App\Schedule as Schedule;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	Schedule::create([
    		'homeTeam'=>'Cleveland',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'9/18/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Browns',
            'gameTime'=>'1:00pm',
            'venueName'=>'First Energy Stadium',
            'venueLocation'=>'Cleveland, Ohio'

    		]);

    	Schedule::create([
    		'homeTeam'=>'Jacksonville',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'9/25/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Jaguars',
            'gameTime'=>'1:00pm',
            'venueName'=>'Everbank Field',
            'venueLocation'=>'Jacksonville, Florida'
    		]);

    	Schedule::create([
    		'homeTeam'=>'New York Giants',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'10/16/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Giants',
            'gameTime'=>'1:00pm',
            'venueName'=>'MetLife Stadium',
            'venueLocation'=>'East Rutherford, New Jersey'

    		]);

    	Schedule::create([
    		'homeTeam'=>'New York Jets',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'10/23/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Jets',
            'gameTime'=>'1:00pm',
            'venueName'=>'MetLife Stadium',
            'venueLocation'=>'East Rutherford, New Jersey'

    		]);

    	Schedule::create([
    		'homeTeam'=>'Dallas',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'11/20/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Cowboys',
            'gameTime'=>'1:00pm',
            'venueName'=>'AT&T Stadium',
            'venueLocation'=>'Arlington, Texas'

    		]);

    	Schedule::create([
    		'homeTeam'=>'New England',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'12/12/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Patriots',
            'gameTime'=>'8:30pm',
            'venueName'=>'Gillette Stadium',
            'venueLocation'=>'Foxboro, Massachusetts'

    		]);

    	Schedule::create([
    		'homeTeam'=>'Pittsburgh',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'12/25/2016',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Steelers',
            'gameTime'=>'4:30pm',
            'venueName'=>'Heinz Field',
            'venueLocation'=>'Pittsburgh, Pennsylvania'

    		]);

    	Schedule::create([
    		'homeTeam'=>'Cincinatti',
    		'visitingTeam'=>'Baltimore',
    		'gameDate'=>'01/01/2017',
    		'season'=>'2016',
    		'gameDescription'=>'Ravens vs. Bengals',
            'gameTime'=>'1:00pm',
            'venueName'=>'Paul Brown Stadium',
            'venueLocation'=>'Cincinatti, Ohio'

    		]);








    }
}
