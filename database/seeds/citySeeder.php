<?php
use App\City;
use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cons = [
        'Egypt' => 1,
        'Tunisia' => 2,
        'Saudi Arabia' => 3,
        'China' => 4,
        'France' => 5,
        'England' => 6,
        'Australia' => 7,
        'Canada' => 8,
        'Mexico' => 9,
        'Brazil' => 10,
        'Argentina' => 11,
        ];
        $cits = [
        'Egypt' => 'Cairo',
        'Tunisia' => 'Fas',
        'Saudi Arabia' => 'Gedda',
        'China' => 'Hong Kong',
        'France' => 'Paris',
        'England' => 'Manchester',
        'Australia' => 'Milborn',
        'Canada' => 'Toronto',
        'Brazil' => 'Rio de ganero',
        ];
        foreach ($cits as $country=>$city) {
            $model = new City();
            $model->name = $city;
            $model->country_id = $cons[$country];
            $model->save();
        }
    }
}
