<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Slider::insert(array(
            array(
                'title' => 'Najciekawsze rozwiązania do mieszkań i domów',
                'description' => 'Każdy z oferowanych przez nas produktów posiada swoiste właściwości, dzięki którym komponują się z ogólnym wystrojem wnętrz, a także w delikatny sposób uzupełniają i dopełniają cały wygląd pomieszczenia.',
                'actionName' => 'Przeglądaj produkty',
                'actionLink' => route('products'),
                'image' => url('/') . '/img/slider-1.png',
                'imageAlt' => 'Najciekawsze rozwiązania do mieszkań i domów',
                'onlyImage' => null,
                'onlyImageLink' => null
            ),
            array(
                'title' => null,
                'description' => null,
                'actionName' => null,
                'actionLink' => null,
                'image' => null,
                'imageAlt' => null,
                'onlyImage' => url('/') . '/img/slider-2.png',
                'onlyImageLink' => route('products')
            )
        ));
    }
}
