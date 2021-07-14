<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Realisation;
use Carbon\Carbon;

class RealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Realisation::insert(array(
            array(
                'title' => 'Drzwi moskitierowe w kolorze złoty dąb (struktura drewna)',
                'slug' => 'drzwi-moskitierowe-w-kolorze-zloty-dab-struktura-drewna',
                'description' => 'Nasze profile w kolorze złotego dębu struktura drewna, wykorzystane w drzwiach moskitierowych, które idealnie wpasowały się w tę wyjątkową realizację. 
                Wszystkie elementy takie jak: zawiasy, magnesy czy klamki dopasowujemy kolorystycznie do profili okiennych i drzwiowych. Dzięki temu całość wygląda estetycznie i odpowiednio współgra z całym oknem. 
                ',
                'image' => url('/') . '/img/realizacja-1.jpg',
                'imageAlt' => 'Drzwi moskitierowe w kolorze złoty dąb (struktura drewna)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'title' => 'Żaluzje plisowane w kolorze Ciemnoszarym (1-0461)',
                'slug' => 'zaluzje-plisowane-w-kolorze-ciemnoszarym-1-0461',
                'description' => 'Żaluzje plisowane uzupełniły nowoczesne wnętrze naszego Klienta. Przy oknach o szerokości powyżej 140cm wskazane jest zamontowanie dwóch plis obok siebie. Wygląda to naprawdę świetnie i daje jeszcze większą możliwość „sterowania” wpadającym do pomieszczenia światłem słonecznym. 
                 Do tej realizacji wykorzystaliśmy tkaninę z warstwą srebrzenia od zewnętrznej strony, która wypełnia strukturę tkaniny i dodatkowo odbija promienie słoneczne. ',
                'image' => url('/') . '/img/realizacja-2.jpg',
                'imageAlt' => 'Żaluzje plisowane w kolorze Ciemnoszarym (1-0461)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'title' => 'Żaluzje aluminiowe 50mm kolor Charcoal',
                'slug' => 'zaluzje-aluminiowe-50mm-kolor-charcoal',
                'description' => 'Idealne wykończenie dużych okien w nowoczesnym wnętrzu. Żaluzja została podzielona w taki sposób, aby do otwarcia okna wystarczyło podniesienie tylko jej części, co w znaczny sposób ułatwia codzienne użytkowanie. Wykorzystana w żaluzjach drabinka taśmowa nadaje przestrzeni industrialnego charakteru. Rynnę górną zakryliśmy maskownicą drewnianą typu „karnisz”, co w prosty sposób wykończyło łączenie z sufitem.',
                'image' => url('/') . '/img/realizacja-3.jpg',
                'imageAlt' => 'Żaluzje aluminiowe 50mm kolor Charcoal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'title' => 'Żaluzje bambusowe 25mm w kolorze NATURAL',
                'slug' => 'zaluzje-bambusowe-25mm-w-kolorze-natural',
                'description' => 'Kolorystyka bambusowych żaluzji została perfekcyjnie dopasowana do wszystkich dodatków w pomieszczeniu, tworząc wraz z roślinami uniwersalny design oraz przyjemną, naturalną aurę. Najlepsza opcja dla miłośników eko-stylu!',
                'image' => url('/') . '/img/realizacja-4.jpg',
                'imageAlt' => 'Żaluzje bambusowe 25mm w kolorze NATURAL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ));
    }
}
