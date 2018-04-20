<?php
use App\contenent;
use Illuminate\Database\Seeder;

class ContDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cons = ['Africa','Asia','Europe','Australia','North America','South America'];
        foreach ($cons as $con) {
            $model = new contenent();
            $model->name = $con;
            $model->save();
        }
    }
}
