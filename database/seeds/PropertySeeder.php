<?php

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * @param $fileName
     * @param $fastExcelObject
     */
    public function run($fileName, $fastExcelObject)
    {
        ($fastExcelObject)->import(storage_path($fileName), function ($line) {
            return Property::create([
                'suburb' => $line['Suburb'],
                'state' => $line['State'],
                'country' => $line['Counrty']
            ]);
        });
    }
}
