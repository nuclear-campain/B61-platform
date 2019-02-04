<?php

use App\Models\{City, Province, Postal};
use League\Csv\{Reader, Statement};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class CityScaffoldingSeeder
 */
class CityScaffoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws \League\Csv\Exception
     *
     * @param  City $cities The resource model for the belgian cities
     * @param  Province $provinces The resource model for the belgian provinces
     * @param  Postal $postal The resource model for the belgian postal codes.
     * @param  Statement $stmt The Class instance for the statement against the CSV source file.
     * @return void
     */
    public function run(City $cities, Province $provinces, Postal $postal, Statement $stmt): void
    {
        $csv = Reader::createFromPath(database_path('seeds/sources/belgian-cities.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($stmt->process($csv) as $city) {
            DB::transaction(function () use ($city, $provinces, $postal, $cities) {
                $province = $provinces->firstOrCreate(['name' => $city['province']]);
                $postalCode = $postal->firstOrCreate(['code' => $city['postal']]);
                $cityInformation = $cities->firstOrCreate($this->cityInformation($city));

                // Relation attachment 
                $cityInformation->province()->associate($province)->save();
                $postalCode->cities()->save($cityInformation);
            }, 4); // 4 = Amount of dead locks before Exception.
        }
    }

    /**
     * Function for assambling the array that contains the data for an city
     * 
     * @param  array $city The resource array that comes from the csv source file. 
     * @return array
     */
    private function cityInformation(array $city): array 
    {
        return ['name' => $city['name'], 'lat' => $city['lat'], 'lng' => $city['lng']];
    }
}
