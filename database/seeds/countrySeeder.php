<?php

use Illuminate\Database\Seeder;
use App\Country;

class countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conts = [
            'Africa'=>1,
            'Asia'=>2,
            'Europe'=>3,
            'Australia'=>4,
            'North America'=>5,
            'South America'=>6,
        ];

        $cons = [
        'Egypt' => 'Africa',
        'Tunisia' => 'Africa',
        'Saudi Arabia' => 'Asia',
        'China' => 'Asia',
        'France' => 'Europe',
        'England' => 'Europe',
        'Australia' => 'Australia',
        'Canada' => 'North America',
        'Mexico' => 'North America',
        'Brazil' => 'South America',
        'Argentina' => 'South America',
        ];
        foreach ($cons as $country=>$cont) {
            $model = new Country();
            $model->name = $country;
            $model->contenent_id = $conts[$cont];
            $model->save();
        }
    }
}
