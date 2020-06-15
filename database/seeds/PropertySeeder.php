<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function run()
    {
        (new FastExcel)->import(storage_path('BackEndTest_TestData_v1.1.xlsx'), function ($line) {
            return Property::create([
                'suburb' => $line['Suburb'],
                'state' => $line['State'],
                'country' => $line['Counrty']
            ]);
        });
    }
}
