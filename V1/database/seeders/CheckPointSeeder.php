<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use Illuminate\Database\Seeder;

class CheckPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkpoints_code = [
            '04cae000500001',
            '04050603200001',
            '04922c00500001',
            '04c97b00500001',
            '04cb8f00500001',
            '04312b04200001',
            '044c0701500001',
            '04d82101500001',
            '041e7500500001',
            '04042c04200001',
            '044e3300500001',
            '04abc303200001',
            '04090801500001',
            '04771f00500001',
            '04179000500001',
            '04da1800500001',
            '040e3201500001',
            '04d01a01500001',
            '04ea2501500001',
            '040e2500500001',
            '04831304200001',
            '04e2dd03200001',
            '0473e903200001',
            '04660304200001',
            '043a8800500001',
            '04541601500001',
            '04d90700500001',
            '04909900500001',
            '04e70c04200001',
            '04ba1a04200001',
        ];

        foreach ($checkpoints_code as $key => $value) {
            $i = $key < 9 ? '0'.++$key : ++$key;
            Checkpoint::create([
                'cp_description' => "Santorini_$i",
                'cp_code' => $value,
                'cp_status' => true
            ]);
        }
    }
}
