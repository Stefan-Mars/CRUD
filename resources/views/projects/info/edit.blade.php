@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <div class='flex m-auto overflow-auto'>


        <form class='m-auto'action="/project/info/{{ $project->id }}" method="POST">
            @csrf
            @method('put')
            <table class='border-separate border-spacing-1'>
                <tr>
                    <td colspan="4"><a href="/project/{{ $project->id }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                    </td>
                    <td class='bg-red-300 p-2'>
                        <p class='float-left font-semibold'>
                            Projectnaam<br>
                            <input class='border border-slate-300 font-normal' type="text" name='ProjectNaam'
                                value='{{ $projectInfo->ProjectNaam }}'>

                        </p>
                        @error('ProjectNaam')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <p class='float-right font-semibold'>
                            Datum bestelling<br>
                            <input class='border border-slate-300 font-normal' type="date" name='datumBestelling'
                                value='{{ $projectInfo->datumBestelling }}'>
                        </p>
                        @error('datumBestelling')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                    <td class='bg-red-300 p-2 font-bold'>
                        let op bij levering van glas op bokken op het werk<br> dit niet in de volle zon zetten ivm
                        thermische breuk !!
                    </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class='bg-red-200 p-2 font-semibold'>
                        Telefoonnummer <input class='border border-slate-300 font-normal' type="tel"
                            name="telefoonnummer" value='{{ $projectInfo->telefoonnummer }}'>
                        @error('telefoonnummer')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </td>
                    <td class='bg-red-200 p-2'>
                        Magazijn order compleet: <input class='border border-slate-300' type="date" name='datum'
                            value='{{ $projectInfo->datum }}'>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class='bg-red-200 p-2'>
                        <input type="radio" name='label' value='leveren' id='leveren'
                            @if ($projectInfo->label == 'leveren') checked @endif>
                        <label for="leveren">Leveren</label>

                        <input type="radio" name='label' value='bijKlant' id='bijKlant'
                            @if ($projectInfo->label == 'bijKlant') checked @endif>
                        <label for="bijKlant">Bij Klant</label>

                        <input type="radio" name='label' value='magazijn' id='magazijn'
                            @if ($projectInfo->label == 'magazijn') checked @endif>
                        <label for="magazijn">Magazijn (afhaling)</label>

                        <input type="radio" name='label' value='levertijdVolgt' id='levertijdVolgt'
                            @if ($projectInfo->label == 'levertijdVolgt') checked @endif>
                        <label for="levertijdVolgt">levertijd volgt</label><br>

                        <input type="radio" name='label' value='monteren' id='monteren'
                            @if ($projectInfo->label == 'monteren') checked @endif>
                        <label for="monteren">Monteren</label>

                        <input type="radio" name='label' value='oudWerk' id='oudWerk'
                            @if ($projectInfo->label == 'oudWerk') checked @endif>
                        <label for="oudWerk">Oud werk</label>

                        <input type="radio" name='label' value='nieuwWerk' id='nieuwWerk'
                            @if ($projectInfo->label == 'nieuwWerk') checked @endif>
                        <label for="nieuwWerk">Nieuw werk</label>

                        <input type="radio" name='label' value='stelkozijnen' id='stelkozijnen'
                            @if ($projectInfo->label == 'stelkozijnen') checked @endif>
                        <label for="stelkozijnen">Stelkozijnen</label>


                        <input type="radio" name='label' value='afwerking' id='afwerking'
                            @if ($projectInfo->label == 'afwerking') checked @endif>
                        <label for="afwerking">Afwerking</label><br>

                        <input type="radio" name='label' value='hulpBijMonteren' id='hulpBijMonteren'
                            @if ($projectInfo->label == 'hulpBijMonteren') checked @endif>
                        <label for="hulpBijMonteren">Hulp bij monteren</label>

                        <input type="radio" name='label' value='legeBokAfgemeld' id='legeBokAfgemeld'
                            @if ($projectInfo->label == 'legeBokAfgemeld') checked @endif>
                        <label for="legeBokAfgemeld">Lege bok afgemeld</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class='bg-red-200 p-1 font-bold'>
                        Bij alleen leveren (zonder montage) op locatie door transport dient de opdrachtgever de lege
                        bokken per email af te melden aan ons binnen 3 weken na levering
                    </td>
                </tr>

                <tr class='bg-red-200 p-2'>
                    <td rowspan='4' class='text-center p-2 bg-red-300 font-semibold'style='writing-mode: vertical-rl;'>Te
                        Bestellen
                    </td>
                    <td rowspan='4' class='text-center p-2 bg-red-300 font-semibold'style='writing-mode: vertical-rl;'>
                        Besteld
                    </td>
                    <td rowspan='4' class='text-center p-2 bg-red-300 font-semibold'style='writing-mode: vertical-rl;'>
                        Ontvangen
                    </td>
                    <td rowspan='4' class='text-center p-2 bg-red-300 font-semibold'style='writing-mode: vertical-rl;'>
                        Inclusief
                    </td>
                    <td colspan="2"class='bg-red-200 p-1 '>Let op bij horren en gordijnen en overige producten die
                        besteld worden voor u kan er kleurverschil zijn met<br> het bestelde kozijn. Indien inzet klikhoren
                        met
                        vast gaas mee besteld zijn voor de bestelde kozijnen dan<br> staan deze op de besteltekening apart
                        benoemd en worden gelijk mee besteld met uw kozijnen.</td>
                </tr>
                <tr>
                    <td colspan="2"class='bg-red-200 p-1'>Let op bij beglazing van verschillende samenstellingen of
                        diktes kan er kleurverschil per ruit ontstaan</td>
                </tr>
                <tr>
                    <td colspan="2"class='bg-red-200 p-1 font-bold'>De koper is gehouden vooraf bij het aangaan van de
                        koopovereenkomst de aanwezigheid van asbest/en of andere potentieel<br> gevaarlijk materiaal in
                        het
                        gedeelte waar Boer kozijnen gaat verrichten te (laten) verwijderen door een gecertificeerd
                        bedrijf
                        alvorens<br> met de werkzaamheiden gestart kan worden</td>
                </tr>
                <tr>
                    <td colspan="2"class='bg-red-200 p-1 font-bold'>De koper is verantwoordelijk voor het melden van de
                        aanwezigheid van asbest en of ander potentieel gevaarlijk materiaal bij de<br> bevoegde
                        instansies</td>
                </tr>

                @foreach ($content as $item)
                    <tr class=' bg-red-200'>
                        <td class='text-center p-1 bg-red-300'>
                            <input type="radio" name='field{{ $item->id }}' value='te Bestellen'
                                @if ($buttons->{'field' . $item->id} == 'teBestellen') checked @endif>
                        </td>
                        <td class='text-center p-1 bg-red-300'>
                            <input type="radio" name='field{{ $item->id }}' value='besteld'
                                @if ($buttons->{'field' . $item->id} == 'besteld') checked @endif>
                        </td>
                        <td class='text-center p-1 bg-red-300'>
                            <input type="radio" name='field{{ $item->id }}' value='ontvangen'
                                @if ($buttons->{'field' . $item->id} == 'ontvangen') checked @endif>
                        </td>
                        <td class='text-center p-1 bg-red-300'><input type="checkbox"
                                name='inclusief{{ $item->id }}' value='true'
                                @if ($buttons->{'inclusief' . $item->id} == 'true') checked @endif></td>
                        <td colspan='2' class='p-1 {{ $item->id % 2 === 0 ? 'bg-red-200' : 'bg-red-100' }}'>
                            {!! $item->content !!}

                            @error($item->id)
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </td>
                    </tr>
                @endforeach

                <tr class='bg-red-200'>
                    <td colspan="6" class='p-1'>
                        Totaal Euro <input class='border border-slate-300' type="number" name='totaalEuro'
                            value='{{ $projectInfo->totaalEuro }}'>
                        @error('totaalEuro')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <input type="radio" name='BTW' value="Inclusief_BTW"
                            @if ($projectInfo->BTW == 'Inclusief_BTW') checked @endif> Inclusief BTW <input type="radio"
                            name='BTW' value='Exclusief_BTW' @if ($projectInfo->BTW == 'Exclusief_BTW') checked @endif>
                        Exclusief BTW zonder
                        betalingskorting<br>
                        (voor specificaties over uw bestelling en de kozijntekeningen zie de bijlage)
                    </td>
                </tr>
                <tr class='bg-red-200'>
                    <td class='p-1 text-center font-bold'colspan="6">BETAALSCHEMA OM IN AANMERKING TE KOMEN
                        VOOR
                        <u>2% OF 3% BETALINGKORTING</u>
                    </td>
                </tr>
                <tr class="bg-red-300 text-center">
                    <td class='p-1'><input type="radio" name='korting' value="2%"
                            @if ($projectInfo->korting == '2%') checked @endif></td>
                    <td></td>
                    <td class='p-1 font-bold'>2%</td>
                    <td colspan="4" class='p-1'>Om in aanmerking te komen voor 2% betalingskorting op uw order is
                        het betaalschema
                        als
                        volgt:

                    </td>
                </tr>
                <tr class='bg-red-200  text-center'>
                    <td colspan="6" class='p-1 font-bold'> 50% - bij opdracht - 40% -14 dagen voor levering 10% -na
                        levering en / of
                        montage</td>
                </tr>


                <tr class="bg-red-300 text-center">
                    <td class='p-1'><input type="radio" name='korting' value="3%"
                            @if ($projectInfo->korting == '3%') checked @endif></td>
                    <td></td>
                    <td class='p-1 font-bold'>3%</td>
                    <td class='p-1' colspan="4">Om in aanmerking te komen voor 3% betalingskorting op uw order is
                        het betaalschema
                        als
                        volgt:

                    </td>
                </tr>
                <tr class='bg-red-200 text-center'>

                    <td colspan="6" class='p-1 font-bold'> 100% - bij opdracht</td>
                </tr>

                <tr class="bg-red-300 text-center">
                    <td class='p-1'><input type="radio" name='korting' value="0%"
                            @if ($projectInfo->korting == '0%') checked @endif></td>
                    <td></td>
                    <td class='p-1 font-bold'>0%</td>
                    <td colspan="4" class='p-1 font-bold'>1e termijn betaling 50 % bij levering kozijnen op locatie en
                        overige betaling
                        naar de stand van de werkzaamheden</td>
                </tr>

                <tr class="bg-red-200 text-center">
                    <td colspan="6" class='p-1'>Bij geen bevestiging van uw zijde per email op 1 van de bovenstaande
                        voorstellen,
                        kan er later geen korting worden verrekend</td>
                </tr>
                <tr class="bg-red-200">
                    <td class="p-1"colspan="5"><b>Inmeting: </b><u>paraaf</u> <input type="radio" name='inmeting'
                            value="Henk" @if ($projectInfo->inmeting == 'Henk') checked @endif> Henk <input type="radio"
                            name='inmeting' value="Willem" @if ($projectInfo->inmeting == 'Willem') checked @endif> Willem</td>
                    <td class='p-1'colspan="1"><b>Order verwerkt door:</b> <input type="radio"
                            name='orderVerwerktDoor' value="Willem" @if ($projectInfo->orderVerwerktDoor == 'Willem') checked @endif>
                        Willem <input type="radio" name='orderVerwerktDoor' value="Rene"
                            @if ($projectInfo->orderVerwerktDoor == 'Rene') checked @endif> Rene</td>
                </tr>
                <tr class="bg-red-200">
                    <td colspan="6" class='p-1'>
                        Planning monteurs:
                        dagen <input class="border border-slate-300"type="text" name='dagen'
                            value='{{ $projectInfo->dagen }}'>
                        @error('dagen')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        personen <input class="border border-slate-300" type="text" name='personen'
                            value='{{ $projectInfo->personen }}'>
                        @error('personen')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        naam <input class="border border-slate-300" type="text" name='naam'
                            value='{{ $projectInfo->naam }}'>
                        @error('naam')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <input type="checkbox" name="hulpIntillen" value="true"
                            @if ($projectInfo->hulpIntillen == 'true') checked @endif> + hulp intillen
                    </td>
                </tr>
                <tr class="bg-red-200">
                    <td colspan="6" class='p-1'>Diversen:
                        <textarea class='w-full h-1/3' name="diversen" cols="30" rows="3">{{ $projectInfo->diversen }}</textarea>
                    </td>
                </tr>

            </table>
            <button type="submit">Opslaan</button>
        </form>

    </div>
    <br>
    <script>
        var data = <?php echo $projectInfo; ?>;

        var andereGevelbekleding = document.getElementsByName('andereGevelbekleding');
        andereGevelbekleding[0].value = data['andereGevelbekleding'];

        var Kraan = document.getElementsByName('Kraan');
        Kraan[0].value = data['Kraan'];

        function setCheckedValue(elementName) {
            var elements = document.getElementsByName(elementName);
            for (var i = 0; i < elements.length; i++) {
                if (data[elementName] === elements[i].value) {
                    elements[i].checked = true;
                }
            }
        }

        [
            'andereGevelbekleding',
            'Kraan',
            'gevelbekleding',
            'SRLM',
            'gordijnen',
            'ZetWater',
            'Electrawerk',
            'Loodgieterswerk',
            'Stuckvloer',
            'afvoer',
            'Kraantype'
        ].forEach(function(elementName) {
            setCheckedValue(elementName);
        });
    </script>
@endsection
