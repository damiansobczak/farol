<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::insert(array(
            array(
                'title' => 'Nowe kolekcje tkanin DiN w naszej ofercie',
                'description' => 'Wraz z początkiem roku w naszym asortymencie tkanin Dzień i Noc pojawia się aż 7 nowych kolekcji!
                    Łącznie mamy ich już 20. Nowe tkaniny są odpowiedzią na aktualne potrzeby Klientów. 
                    W kolekcjach dominują kolory delikatne i stonowane - w odcieniach szarości, brązów, kremów i beży. 

                    Nowe  kolekcje tkanin:
                    - CLASSIC
                    - JAZZ
                    - VINTAGE 
                    - POEM (blackout)
                    - CHIC
                    - BAROQUE
                    - ANTIQUE

                    Zapraszamy do zapoznania się ze wszystkimi dostępnymi tkaninami :
                    Link do rolet DiN na stronie gdzie klient może sobie zobaczyć w wyszukiwarce tkanin wszystkie kolekcje.
                ',
                'slug' => 'nowe-kolekcje-tkanin-din-w-naszej-ofercie',
                'image' => url('/') . '/img/aktualnosc-1-a.jpg',
                'imageAlt' => 'Nowe kolekcje tkanin DiN w naszej ofercie',
                'show' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'title' => '3 lata gwarancji na siatkę ADFORS saint-gobain',
                'description' => 'rzy produkcji naszych moskitier wykorzystujemy siatkę z włókna szklanego francuskiej firmy ADFORS Saint-Gobain. Jest ona bardzo praktyczna, nie marszczy się, nie wgniata ani nie rozplątuje. Moskitiery z tej wysokiej jakości siatki używane są najczęściej jako ochrona przed owadami. Zapewniają przejrzystość, widoczność, odporność na rozdarcia i uszkodzenia przez zwierzęta domowe. Ochronne wykończenie zapobiega korozji i wzmacnia splot.
                Na siatkę ADFORS Saint-Gobain udzielamy 3-letniej gwarancji!
                ',
                'slug' => '3-lata-gwarancji-na-siatke-adfors-saint-gobain',
                'image' => url('/') . '/img/aktualnosc-2-a.jpg',
                'imageAlt' => '3 lata gwarancji na siatkę ADFORS saint-gobain',
                'show' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ));
    }
}
