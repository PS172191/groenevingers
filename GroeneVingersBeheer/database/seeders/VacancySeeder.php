<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?';

        Vacancy::create([
            'name' => 'Magazijnmedewerker',
            'hours' => 32,
            'description' => 'Ben jij een harde werker met oog voor detail? Wij zoeken een enthousiaste Magazijnmedewerker om ons team te versterken. Als Magazijnmedewerker ben je verantwoordelijk voor het ontvangen, controleren en opslaan van goederen. Je zorgt ervoor dat ons magazijn altijd netjes en georganiseerd is en dat bestellingen op tijd worden klaargemaakt voor verzending.

                Wat wij bieden:
                
                Een dynamische werkomgeving
                Mogelijkheden voor persoonlijke ontwikkeling
                Marktconform salaris en secundaire arbeidsvoorwaarden

                Wat wij vragen:
                
                Ervaring in een magazijnomgeving is een plus
                Nauwkeurigheid en een proactieve houding
                Goede fysieke conditie en bereidheid om fysiek werk te verrichten',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Winkelmedewerker',
            'hours' => 16,
            'description' => 'Ben jij klantgericht en hou je van afwisseling? Wij zoeken een vriendelijke en flexibele Winkelmedewerker. Als Winkelmedewerker help je klanten, vul je de schappen en zorg je ervoor dat de winkel er altijd tiptop uitziet.

                Wat wij bieden:
                
                Een gezellige werksfeer
                Afwisselende werkzaamheden
                Marktconform salaris en personeelskorting

                Wat wij vragen:
                
                Goede communicatieve vaardigheden
                Klantvriendelijkheid en behulpzaamheid
                Flexibiliteit en inzetbaarheid in weekenden
                ',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Kassamedewerker',
            'hours' => 40,
            'description' => 'Ben jij klantvriendelijk en stressbestendig? Wij zijn op zoek naar een gedreven Kassamedewerker voor ons team. Als Kassamedewerker ben je het gezicht van onze winkel. Je helpt klanten aan de kassa, verwerkt betalingen en zorgt voor een goede klantbeleving.

                Wat wij bieden:
                
                Een fijne werksfeer in een leuk team
                Flexibele werktijden
                Marktconform salaris

                Wat wij vragen:
                
                Klantgerichtheid en goede communicatieve vaardigheden
                Ervaring met kassawerkzaamheden is een pre
                Betrouwbaarheid en nauwkeurigheid.',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Vulploegmedewerker',
            'hours' => 18,
            'description' => 'Ben jij een echte aanpakker en werk je graag in de avonden? Wij zoeken een enthousiaste Vulploegmedewerker. Als Vulploegmedewerker zorg je ervoor dat de schappen gevuld en netjes zijn, zodat klanten altijd kunnen vinden wat ze zoeken.

                Wat wij bieden:
                
                Een prettige werkomgeving
                Flexibele werktijden, vooral in de avonduren
                Marktconform salaris

                Wat wij vragen:
                
                Een positieve en actieve werkhouding
                Teamspirit en collegialiteit
                Beschikbaarheid in de avonden en weekenden',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Tuinman',
            'hours' => 40,
            'description' => 'Heb jij groene vingers en een passie voor buiten werken? Wij zoeken een ervaren Tuinman om ons team te versterken. Als Tuinman ben je verantwoordelijk voor het aanleggen en onderhouden van tuinen en groenvoorzieningen.

                Wat wij bieden:
                
                Een afwisselende baan in de buitenlucht
                Goede arbeidsvoorwaarden
                Mogelijkheden om je verder te ontwikkelen in het groen vak

                Wat wij vragen:
                
                Ervaring in tuinonderhoud en/of hovenierswerk
                Zelfstandigheid en verantwoordelijkheidsgevoel
                Rijbewijs B is een pre
                ',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Teamleider',
            'hours' => 40,
            'description' => 'Ben jij een natuurlijke leider met ervaring in teammanagement? Wij zoeken een gemotiveerde Teamleider. Als Teamleider ben je verantwoordelijk voor het aansturen en motiveren van je team. Je zorgt ervoor dat doelen worden behaald en dat de werksfeer positief blijft.

                Wat wij bieden:
                
                Een uitdagende en verantwoordelijke functie
                Doorgroeimogelijkheden binnen het bedrijf
                Aantrekkelijk salaris en goede secundaire arbeidsvoorwaarden

                Wat wij vragen:
                
                Leidinggevende ervaring
                Uitstekende communicatieve vaardigheden
                Probleemoplossend vermogen en resultaatgerichtheid',
            'available' => 1,
        ]);

        Vacancy::create([
            'name' => 'Roostermaker',
            'hours' => 36,
            'description' => 'Ben jij organisatorisch sterk en hou je van plannen? Wij zoeken een nauwkeurige Roostermaker om ons team te versterken. Als Roostermaker ben je verantwoordelijk voor het maken en bijhouden van werkroosters, rekening houdend met beschikbaarheid en capaciteitsbehoeften.

                Wat wij bieden:
                
                Een sleutelrol binnen ons bedrijf
                Flexibele werktijden
                Goede arbeidsvoorwaarden
                
                Wat wij vragen:
                
                Ervaring met roosterplanning
                Oog voor detail en organisatorisch inzicht
                Goede communicatieve vaardigheden',
            'available' => 1,
        ]);
    }
}
