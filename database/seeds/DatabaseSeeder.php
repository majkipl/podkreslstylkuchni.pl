<?php

use App\Enums\ProductType;
use App\Models\Product;
use App\Models\Url;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            '21700-56' => [
                'name' => 'EKSPRES DO KAWY RETRO RIBBON RED',
                'links' => ['https://mediamarkt.pl/agd-male/ekspres-russell-hobbs-21700-56-retro-ribbon-red?querystring=21700-56', 'https://www.neonet.pl/przelewowe/russell-hobbs-21700-56-retro-ribbon-red.html', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21700-56-retro-i6934418129.html', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21700-56-retro-i6930423806.html', 'https://mambonus.pl/katalog/agd/ekspres_przelewowy_retro_ribbon_red_21700-56_russell_hobbs-1959', 'https://www.komputronik.pl/product/346685/russell-hobbs-21700-56-retro-ribbon-red.html', 'https://www.al.to/p/334399-ekspres-do-kawy-russell-hobbs-retro-ribbon-red-21700-56.html', 'https://www.neo24.pl/russell-hobbs-21700-56-retro-ribbon-red.html', 'https://strefa.enea.pl/ekspres-do-kawy-russell-hobbs-retro-ribbon-red-21700-56.html'],
                'type' => 'retro'
            ],
            '21702-56' => [
                'name' => 'EKSPRES DO KAWY RETRO VINTAGE CREAM',
                'links' => ['https://mediamarkt.pl/agd-male/ekspres-russell-hobbs-21702-56-retro-vintage-cream', 'https://www.neonet.pl/przelewowe/russell-hobbs-21702-56-retro-vintage-cream.html', 'https://www.empik.com/ekspres-przelewowy-russell-hobbs-retro-21702-56-1-25-l-russell-hobbs,p1131700702,gadzety-p', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21702-56-retro-i7584406770.html', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21702-56-retro-i7584406431.html', 'https://www.mediaexpert.pl/ekspresy-przelewowe/ekspres-russell-hobbs-21702-56,id-977342', 'http://selgros24.pl/Sprzet-AGD/Drobne-AGD/Drobne-AGD-do-kuchni/Ekspresy-do-kawy/RUSSELL-HOBBS/EKSPRESS-RUSSELL-HOBBS-21702-56-pp105755.html', 'https://mambonus.pl/katalog/agd/ekspres_przelewowy_retro_vintage_cream__21702-56_russell_hobbs-9642', 'https://sklep.payback.pl/odbieraj-nagrody/kategorie/kuchnia?brand=russell-hobbs&size=128', 'https://www.zadowolenie.pl/male-agd/do-kuchni/ekspresy-do-kawy/russell-hobbs-ekspres-przelewowy-retro-21702-56-1', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/ekspresy-do-kawy/russell-hobbs-ekspres-przelewowy-retro-21702-56-1', 'https://sklep.energa.pl/ekspres-do-kawy-russell-hobbs-retro-vintage-cream-21702-56', 'https://www.komputronik.pl/product/346686/russell-hobbs-21702-56-retro-vintage-cream.html', 'https://www.al.to/p/334409-ekspres-do-kawy-russell-hobbs-retro-vintage-cream-21702-56.html', 'https://www.electro.pl/ekspresy-przelewowe/ekspres-russell-hobbs-21702-56,id-977342', 'https://www.avans.pl/agd-male/do-kuchni/ekspresy-przelewowe/ekspres-russell-hobbs-21702-56', 'https://www.neo24.pl/russell-hobbs-21702-56-retro-vintage-cream.html', 'https://redcoon.pl/male-agd/ekspres-russell-hobbs-21702-56-retro-vintage-cream-1?SearchNode'],
                'type' => 'retro'
            ],
            '21670-70' => [
                'name' => 'CZAJNIK RETRO RIBBON RED',
                'links' => ['https://mediamarkt.pl/agd-male/czajnik-russell-hobbs-21670-70-retro-ribbon?querystring=21670-70', 'https://www.euro.com.pl/czajniki/russell-hobbs-retro-ribbon-red-21670-70.bhtml#afterSearch-21670-70||||product', 'https://www.empik.com/czajnik-russell-hobbs-retro-21670-70-1-7-l-2400-w-russell-hobbs,p1131682211,gadzety-p', 'https://allegro.pl/czajnik-elektryczny-russell-hobbs-21670-70-retro-i7337874024.html', 'https://www.neonet.pl/czajniki/russell-hobbs-retro-ribbon-red-21670-70.html', 'https://allegro.pl/czajnik-elektryczny-russell-hobbs-21670-70-retro-i7270647214.html', 'https://mediadomek.pl/product-pol-13641-RUSSELL-HOBBS-21670-70-CZAJNIK-RETRO-RIBBON-RED.html?text=21670-70', 'http://selgros24.pl/Sprzet-AGD/Drobne-AGD/Drobne-AGD-do-kuchni/Czajniki-elektryczne/RUSSELL-HOBBS/CZAJNIK-RUSSELL-HOBBS-21670-70-pp104652.html', 'https://mambonus.pl/katalog/agd/czajnik_retro_ribbon_red_21670-70_russell_hobbs-9765', 'https://www.komputronik.pl/product/346667/russell-hobbs-21670-70-retro-ribbon-red.html', 'https://www.al.to/p/334421-czajnik-elektryczny-russell-hobbs-retro-ribbon-red-21670-70.html', 'https://www.neo24.pl/russell-hobbs-retro-ribbon-red-21670-70.html', 'https://strefa.enea.pl/czajnik-russell-hobbs-retro-ribbon-red-21670-70.html', 'https://strefa.enea.pl/czajnik-russell-hobbs-retro-ribbon-red-21670-70.html', 'https://redcoon.pl/male-agd/czajnik-russell-hobbs-21670-70-retro-ribbon-1?SearchNode', 'https://redcoon.pl/male-agd/toster-russell-hobbs-21680-56-retro-ribbon-red-1?SearchNode', 'https://ssl.leclerc.com.pl/ssl/p.php?id=88106'],
                'type' => 'retro'
            ],
            '21701-56' => [
                'name' => 'EKSPRES DO KAWY RETRO CLASSIC NOIR',
                'links' => ['https://www.neonet.pl/przelewowe/russell-hobbs-21701-56-retro.html', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21701-56-retro-i6934426066.html', 'https://allegro.pl/ekspres-przelewowy-russell-hobbs-21701-56-retro-i6930435170.html', 'https://www.mediaexpert.pl/ekspresy-przelewowe/ekspres-russell-hobbs-21701-56,id-977344', 'https://sklep.energa.pl/ekspres-do-kawy-russell-hobbs-retro-classic-noir-21701-56', 'https://www.komputronik.pl/product/351099/russell-hobbs-21701-56-retro-classic-noir.html', 'https://www.electro.pl/ekspresy-przelewowe/ekspres-russell-hobbs-21701-56,id-977344', 'https://www.avans.pl/agd-male/do-kuchni/ekspresy-przelewowe/ekspres-russell-hobbs-21701-56', 'https://www.neo24.pl/russell-hobbs-21701-56-retro.html'],
                'type' => 'retro'
            ],
            '21703-56' => [
                'name' => 'EKSPRES DO KAWY RETRO WHITE',
                'links' => ['https://www.komputronik.pl/product/552057/russell-hobbs-21703-56-retro-white.html'],
                'type' => 'retro'
            ],
            '24391-56' => [
                'name' => 'EKSPRES DO KAWY INSPIRE BLACK',
                'links' => ['https://mediamarkt.pl/agd-male/ekspres-russell-hobbs-24391-56-inspire-black?querystring=24391-56', 'https://sklep.payback.pl/nagrody/ekspres-przelewowy-inspire-russell-hobbs-24391-56-?wariant=podstawowy', 'https://www.komputronik.pl/product/555064/russell-hobbs-24371-56-inspire-black.html', 'https://redcoon.pl/male-agd/ekspres-russell-hobbs-24391-56-inspire-black?SearchNode'],
                'type' => 'inspire'
            ],
            '21672-70' => [
                'name' => 'CZAJNIK RETRO VINTAGE CREAM',
                'links' => ['https://mediamarkt.pl/agd-male/czajnik-russell-hobbs-21672-70-retro-vintage?querystring=21672-70', 'https://www.euro.com.pl/czajniki/russell-hobbs-retro-vintage-cream-21672-70.bhtml#afterSearch-21672-70|czajniki||Czajniki%20elektryczne|product', 'https://www.neonet.pl/czajniki/russell-hobbs-retro-vintage-cream-21672-70.html', 'https://allegro.pl/czajnik-elektryczny-russell-hobbs-21672-70-retro-i7621519379.html', 'https://www.empik.com/czajnik-russell-hobbs-retro-21672-70-1-7-l-2400-w-russell-hobbs,p1131681966,gadzety-p', 'https://allegro.pl/czajnik-elektryczny-russell-hobbs-21672-70-retro-i7612503303.html', 'https://www.mediaexpert.pl/czajniki/czajnik-russell-hobbs-21672-70,id-949804', 'http://selgros24.pl/Sprzet-AGD/Drobne-AGD/Drobne-AGD-do-kuchni/Czajniki-elektryczne/RUSSELL-HOBBS/CZAJNIK-RUSSELL-HOBBS-21672-70-pp104653.html', 'https://mambonus.pl/katalog/agd/czajnik_retro_vintage_cream__21672-70_russell_hobbs-6343', 'https://www.zadowolenie.pl/male-agd/do-kuchni/czajniki/russell-hobbs-czajnik-retro-21672-70-1', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/czajniki/russell-hobbs-czajnik-retro-21672-70-1', 'https://sklep.energa.pl/czajnik-russell-hobbs-retro-vintage-cream-21672-70', 'https://www.komputronik.pl/product/346668/russell-hobbs-21672-70-retro-vintage-cream.html', 'https://www.al.to/p/334429-czajnik-elektryczny-russell-hobbs-retro-vintage-cream-21672-70.html', 'https://www.electro.pl/czajniki/czajnik-russell-hobbs-21672-70,id-949804', 'https://www.avans.pl/agd-male/do-kuchni/czajniki/czajnik-russell-hobbs-21672-70', 'https://www.neo24.pl/russell-hobbs-retro-vintage-cream-21672-70.html?q=21672-70', 'https://redcoon.pl/male-agd/czajnik-russell-hobbs-21672-70-retro-vintage-1?SearchNode'],
                'type' => 'retro'
            ],
            '21671-70' => [
                'name' => 'CZAJNIK RETRO CLASSIC NOIR',
                'links' => ['https://www.euro.com.pl/czajniki/russell-hobbs-retro-classic-noir-21671-70.bhtml#afterSearch-21671-70|czajniki||Czajniki%20elektryczne|product', 'https://www.neonet.pl/czajniki/russell-hobbs-retro-classic-noir-21671-70.html', 'https://allegro.pl/czajnik-elektryczny-russell-hobbs-21671-70-retro-i7600227380.html', 'https://www.empik.com/czajnik-russell-hobbs-retro-21671-70-1-7-l-2400-w-russell-hobbs,p1131681975,gadzety-p', 'https://www.mediaexpert.pl/czajniki/czajnik-russell-hobbs-21671-70,id-949826', 'http://selgros24.pl/Sprzet-AGD/Drobne-AGD/Drobne-AGD-do-kuchni/Czajniki-elektryczne/RUSSELL-HOBBS/CZAJNIK-RUSSELL-HOBBS-21671-70-pp104651.html', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/czajniki/russell-hobbs-czajnik-retro-21671-70-1', 'https://www.komputronik.pl/product/346669/russell-hobbs-21671-70-retro-classic-noir.html', 'https://www.al.to/p/334434-czajnik-elektryczny-russell-hobbs-retro-classic-noir-21671-70.html', 'https://www.electro.pl/czajniki/czajnik-russell-hobbs-21671-70,id-949826', 'https://www.avans.pl/agd-male/do-kuchni/czajniki/czajnik-russell-hobbs-21671-70', 'https://www.neo24.pl/russell-hobbs-retro-classic-noir-21671-70.html', 'https://www.oleole.pl/czajniki/russell-hobbs-retro-classic-noir-21671-70.bhtml', 'https://ssl.leclerc.com.pl/ssl/p.php?id=88107'],
                'type' => 'retro'
            ],
            '21674-70' => [
                'name' => 'CZAJNIK RETRO WHITE',
                'links' => ['https://www.komputronik.pl/product/552052/russell-hobbs-21674-70-retro-white.html'],
                'type' => 'retro'
            ],
            '24360-70' => [
                'name' => 'CZAJNIK INSIPRE WHITE',
                'links' => ['https://www.euro.com.pl/czajniki/russell-hobbs-24360-70.bhtml#afterSearch-24360-70||||product', 'https://www.empik.com/czajnik-russell-hobbs-retro-21670-70-1-7-l-2400-w-russell-hobbs,p1131682211,gadzety-p', 'https://www.mediaexpert.pl/czajniki/czajnik-russell-hobbs-24360-70,id-1173978', 'https://www.electro.pl/czajniki/czajnik-russell-hobbs-24360-70,id-1173978', 'https://www.avans.pl/agd-male/do-kuchni/czajniki/czajnik-russell-hobbs-24360-70-inspire-white'],
                'type' => 'inspire'
            ],
            '24361-70' => [
                'name' => 'CZAJNIK INSIPRE BLACK',
                'links' => ['https://mediamarkt.pl/agd-male/czajnik-russell-hobbs-24361-70-inspire-black?querystring=24361-70', 'https://www.euro.com.pl/czajniki/russell-hobbs-24361-70.bhtml#afterSearch-24361-70|czajniki||Czajniki%20elektryczne|product', 'https://sklep.payback.pl/nagrody/czajnik-inspire-russell-hobbs-24361-70-czarny?wariant=podstawowy', 'https://www.komputronik.pl/product/555062/russell-hobbs-24361-70-inspire-black.html', 'https://www.oleole.pl/czajniki/russell-hobbs-24361-70.bhtml', 'https://redcoon.pl/male-agd/czajnik-russell-hobbs-24361-70-inspire-black?SearchNode'],
                'type' => 'inspire'
            ],
            '21680-56' => [
                'name' => 'TOSTER RETRO RIBBON RED',
                'links' => ['https://mediamarkt.pl/agd-male/toster-russell-hobbs-21680-56-retro-ribbon-red?querystring=21680-56', 'https://www.euro.com.pl/tostery/russell-hobbs-retro-ribbon-red-21680-56.bhtml#afterSearch-21680-56|czajniki||Czajniki%20elektryczne|product-all', 'https://www.neonet.pl/tostery/russell-hobbs-retro-ribbon-red-21680-56.html', 'https://www.empik.com/toster-russell-hobbs-retro-21680-56-russell-hobbs,p1131681920,gadzety-p', 'https://allegro.pl/toster-russell-hobbs-21680-56-retro-ruszt-do-bulek-i7245645005.html', 'https://allegro.pl/toster-russell-hobbs-21680-56-retro-ruszt-do-bulek-i6815395962.html', 'https://mambonus.pl/katalog/agd/toster_retro_ribbon_red_21680-56_russell_hobbs-3258', 'https://sklep.energa.pl/toster-russell-hobbs-retro-ribbon-red-21680-56', 'https://www.komputronik.pl/product/351096/russell-hobbs-21680-56-retro-ribbon-red.html', 'https://www.al.to/p/334452-toster-russell-hobbs-retro-ribbon-red-21680-56.html', 'https://www.neo24.pl/russell-hobbs-retro-ribbon-red-21680-56.html', 'https://strefa.enea.pl/toster-russell-hobbs-retro-ribbon-red-21680-56.html', 'https://strefa.enea.pl/toster-russell-hobbs-retro-ribbon-red-21680-56.html'],
                'type' => 'retro'
            ],
            '21682-56' => [
                'name' => 'TOSTER RETRO VINTAGE CREAM',
                'links' => ['https://mediamarkt.pl/agd-male/toster-russell-hobbs-21682-56-retro-vintage-cream?querystring=21682-56', 'https://www.euro.com.pl/tostery/russell-hobbs-retro-vintage-cream-21682-56.bhtml#afterSearch-21682-56|tostery||Tostery|product', 'https://www.neonet.pl/tostery/russell-hobbs-retro-vintage-cream-21682-56.html', 'https://www.empik.com/toster-russell-hobbs-retro-21682-56-russell-hobbs,p1131681902,gadzety-p', 'https://allegro.pl/toster-russell-hobbs-21682-56-retro-ruszt-do-bulek-i7584341234.html', 'https://www.mediaexpert.pl/tostery/toster-russell-hobbs-21682-56-retro-vintage-cream,id-977782', 'http://selgros24.pl/Sprzet-AGD/Drobne-AGD/Drobne-AGD-do-kuchni/Tostery/RUSSELL-HOBBS/TOSTER-RUSSELL-HOBBS-21682-56-pp104650.html', 'https://mambonus.pl/katalog/agd/toster_retro_vintage_cream_21682-56_russell_hobbs-7069', 'https://sklep.energa.pl/toster-russll-hobbs-retro-vintage-cream-21682-56', 'https://sklep.energa.pl/toster-russll-hobbs-retro-vintage-cream-21682-56', 'https://www.komputronik.pl/product/351092/russell-hobbs-21682-56-retro-vintage-cream.html', 'https://www.al.to/p/334459-toster-russell-hobbs-retro-vintage-cream-21682-56.html', 'https://www.electro.pl/tostery/toster-russell-hobbs-21682-56-retro-vintage-cream,id-977782', 'https://www.avans.pl/agd-male/do-kuchni/tostery/toster-russell-hobbs-21682-56-retro-vintage-cream', 'https://www.neo24.pl/russell-hobbs-retro-vintage-cream-21682-56.html', 'https://redcoon.pl/male-agd/toster-russell-hobbs-21682-56-retro-vintage-cream-1?SearchNode'],
                'type' => 'retro'
            ],
            '21681-56' => [
                'name' => 'TOSTER RETRO CLASSIC NOIR',
                'links' => ['https://www.neonet.pl/tostery/russell-hobbs-retro-classic-noir-21681-56.html', 'https://allegro.pl/toster-russell-hobbs-21681-56-retro-i7333664436.html', 'https://allegro.pl/toster-russell-hobbs-21681-56-retro-i7115078561.html', 'https://www.mediaexpert.pl/tostery/toster-russell-hobbs-retro-classic-noir-21681-56,id-983482', 'https://sklep.energa.pl/toster-russell-hobbs-retro-classic-noir-21681-56', 'https://www.komputronik.pl/product/351100/russell-hobbs-21681-56-retro-classic-noir.html', 'https://www.al.to/p/334461-toster-russell-hobbs-retro-classic-noir-21681-56.html', 'https://www.neo24.pl/russell-hobbs-retro-classic-noir-21681-56.html'],
                'type' => 'retro'
            ],
            '21683-56' => [
                'name' => 'TOSTER RETRO WHITE',
                'links' => ['https://www.komputronik.pl/product/552050/russell-hobbs-21683-56-retro-white.html'],
                'type' => 'retro'
            ],
            '24390-56' => [
                'name' => 'EKSPRES DO KAWY INSPIRE WHITE',
                'links' => [],
                'type' => 'inspire'
            ],
            '24371-56' => [
                'name' => 'TOSTER INSPIRE BLACK',
                'links' => ['https://mediamarkt.pl/agd-male/toster-russell-hobbs-24371-56-inspire-black?querystring=24371-56', 'https://sklep.payback.pl/nagrody/toster-inspire-russell-hobbs-24371-56-czarny?wariant=podstawowy', 'https://www.komputronik.pl/product/555064/russell-hobbs-24371-56-inspire-black.html'],
                'type' => 'inspire'
            ],
            '25180-56' => [
                'name' => 'ROBOT KUCHENNY RETRO RIBBON RED',
                'links' => ['https://www.empik.com/blender-kielichowy-russell-hobbs-nutri-boost-23180-56-700-w-russell-hobbs,p1122972778,elektronika-p', 'https://www.zadowolenie.pl/male-agd/do-kuchni/roboty-kuchenne/russell-hobbs-robot-kuchenny-retro-25180-56-czerwony', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/roboty-kuchenne/russell-hobbs-robot-kuchenny-retro-25180-56-czerwony', 'https://www.komputronik.pl/product/555065/russell-hobbs-25180-56-retro-ribbon-red.html', 'https://www.al.to/p/453658-robot-wieloczynnosciowy-russell-hobbs-25180-56-retro-ribbon-red.html', 'https://redcoon.pl/male-agd/robot-russell-hobbs-25180-56-retro-red?SearchNode'],
                'type' => 'retro'
            ],
            '25182-56' => [
                'name' => 'ROBOT KUCHENNY RETRO VINTAGE CREAM',
                'links' => ['https://www.zadowolenie.pl/male-agd/do-kuchni/roboty-kuchenne/russell-hobbs-robot-kuchenny-retro-25182-56-kremowy', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/roboty-kuchenne/russell-hobbs-robot-kuchenny-retro-25182-56-kremowy', 'https://www.komputronik.pl/product/555070/russell-hobbs-25182-56-retro-vintage-cream.html', 'https://www.al.to/p/453669-robot-wieloczynnosciowy-russell-hobbs-25182-56-retro-vintage-cream.html', 'https://redcoon.pl/male-agd/robot-russell-hobbs-25182-56-retro-cream?SearchNode'],
                'type' => 'retro'
            ],
            '25190-56' => [
                'name' => 'BLENDER KIELICHOWY RETRO RIBBON RED',
                'links' => ['https://www.zadowolenie.pl/male-agd/do-kuchni/blendery/russell-hobbs-blender-kielichowy-retro-25190-56-czerwony', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/blendery/russell-hobbs-blender-kielichowy-retro-25190-56-czerwony', 'https://www.komputronik.pl/product/555073/russell-hobbs-25190-56-retro-ribbon-red.html'],
                'type' => 'retro'
            ],
            '25192-56' => [
                'name' => 'BLENDER KIELICHOWY RETRO VINTAGE CREAM',
                'links' => ['https://www.zadowolenie.pl/male-agd/do-kuchni/blendery/russell-hobbs-blender-kielichowy-retro-25192-56-kremowy', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/blendery/russell-hobbs-blender-kielichowy-retro-25192-56-kremowy', 'https://www.komputronik.pl/product/555076/russell-hobbs-25192-56-retro-vintage-cream.html', 'https://www.al.to/p/453680-blender-russell-hobbs-25192-56-retro-vintage-cream.html', 'https://redcoon.pl/male-agd/koktajler-russell-hobbs-25192-56-retro-cream?SearchNode'],
                'type' => 'retro'
            ],
            '25230-56' => [
                'name' => 'BLENDER RĘCZNY RETRO RIBBON RED',
                'links' => ['https://www.zadowolenie.pl/male-agd/do-kuchni/blendery/russell-hobbs-blender-reczny-retro-25230-56-czerwony', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/blendery/russell-hobbs-blender-reczny-retro-25230-56-czerwony', 'https://www.komputronik.pl/product/555080/russell-hobbs-25230-56-retro-ribbon-red.html', 'https://www.al.to/p/453714-blender-russell-hobbs-25230-56-retro-ribbon-red.html', 'https://redcoon.pl/male-agd/blender-russell-hobbs-25230-56-retro-red?SearchNode'],
                'type' => 'retro'
            ],
            '25232-56' => [
                'name' => 'BLENDER RĘCZNY RETRO VINTAGE CREAM',
                'links' => ['https://www.zadowolenie.pl/male-agd/do-kuchni/blendery/russell-hobbs-blender-reczny-retro-25232-56-kremowy', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/blendery/russell-hobbs-blender-reczny-retro-25232-56-kremowy', 'https://www.komputronik.pl/product/555122/russell-hobbs-25232-56-retro-vintage-cream.html', 'https://www.al.to/p/453716-blender-russell-hobbs-25232-56-retro-vintage-cream.html', 'https://redcoon.pl/male-agd/blender-russell-hobbs-25232-56-retro-cream?SearchNode'],
                'type' => 'retro'
            ],
            '25200-56' => [
                'name' => 'MIKSER RĘCZNY RETRO RIBBON RED',
                'links' => ['https://mediamarkt.pl/agd-male/mikser-russell-hobbs-25200-56-retro-red?querystring=25200-56', 'https://www.zadowolenie.pl/male-agd/do-kuchni/miksery/russell-hobbs-mikser-reczny-retro-25200-56-czerwony', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/miksery/russell-hobbs-mikser-reczny-retro-25200-56-czerwony', 'https://www.komputronik.pl/product/555126/russell-hobbs-25200-56-retro-ribbon-red.html', 'https://www.al.to/p/453728-mikser-reczny-russell-hobbs-25200-56-retro-ribbon-red.html', 'https://redcoon.pl/male-agd/mikser-russell-hobbs-25200-56-retro-red?SearchNode'],
                'type' => 'retro'
            ],
            '25202-56' => [
                'name' => 'MIKSER RĘCZNY RETRO VINTAGE CREAM',
                'links' => ['https://mediamarkt.pl/agd-male/mikser-russell-hobbs-25202-56-retro-cream?querystring=25202-56', 'https://www.zadowolenie.pl/male-agd/do-kuchni/miksery/russell-hobbs-mikser-reczny-retro-25202-56-kremowy', 'https://www.kakto.pl/agd-male/male-agd-do-kuchni/miksery/russell-hobbs-mikser-reczny-retro-25202-56-kremowy', 'https://www.komputronik.pl/product/555128/russell-hobbs-25202-56-retro-vintage-cream.html', 'https://www.al.to/p/453732-mikser-reczny-russell-hobbs-25202-56-retro-vintage-cream.html', 'https://redcoon.pl/male-agd/mikser-russell-hobbs-25202-56-retro-cream?SearchNode'],
                'type' => 'retro'
            ],
            '24370-56' => [
                'name' => 'TOSTER INSPIRE WHITE',
                'links' => [],
                'type' => 'inspire'
            ]
        ];

        $productData = [];

        foreach ($products as $code => $item) {
            $productData[] = [
                'name' => $item['name'],
                'code' => $code,
                'type' => $item['type']
            ];
        }

        Product::insert($productData);

        $dataURL = [];
        foreach ($products as $code => $item) {
            $product_id = Product::where('code', $code)->first()->id;

            foreach ($item['links'] as $index => $link) {
                $dataURL[] = [
                    'url' => $link,
                    'product_id' => $product_id
                ];
            }
        }

        Url::insert($dataURL);

        $this->call([
            ApplicationSeeder::class,
            UserSeeder::class
        ]);
    }
}
