@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <br>
    <div class='flex ml-[165px]'>

        <form action="/project/info/create/{{$project->id}}" method="POST">
            @csrf
        <table>
            <tr>
                <td colspan="4"></td>
                <td class='border border-black '>
                    <p class='float-left font-semibold'>
                        Projectnaam<br>
                        <input class='border border-slate-300 font-normal' type="text" name='ProjectNaam'>
                        
                    </p>
                    @error('ProjectNaam')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                    <p class='float-right font-semibold'>
                        Datum bestelling<br>
                        <input class='border border-slate-300 font-normal' type="date" name='datumBestelling'>
                    </p>
                    @error('datumBestelling')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                        @enderror
                </td>
                <td class='border border-black p-2'>
                    <mark>
                        let op bij levering van glas op bokken op het werk<br> dit niet in de volle zon zetten ivm
                        thermische breuk !!
                    </mark>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td class='border border-black p-2 font-semibold'>
                    Telefoonnummer <input class='border border-slate-300 font-normal' type="tel" name="telefoonnummer" >
                    @error('telefoonnummer')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </td>
                <td class='border border-black p-2'>
                    Magazijn order compleet: <input class='border border-slate-300' type="date" name='datum'>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="2" class='border border-black p-2'>
                    <input type="radio" name='label' value='leveren' id='leveren'>
                    <label for="leveren">Leveren</label>

                    <input type="radio" name='label' value='bijKlant' id='bijKlant'>
                    <label for="bijKlant">Bij Klant</label>

                    <input type="radio" name='label' value='magazijn' id='magazijn'>
                    <label for="magazijn">Magazijn (afhaling)</label>

                    <input type="radio" name='label' value='levertijdVolgt' id='levertijdVolgt'>
                    <label for="levertijdVolgt">levertijd volgt</label><br>

                    <input type="radio" name='label' value='monteren' id='monteren'>
                    <label for="monteren">Monteren</label>

                    <input type="radio" name='label' value='oudWerk' id='oudWerk'>
                    <label for="oudWerk">Oud werk</label>

                    <input type="radio" name='label' value='nieuwWerk' id='nieuwWerk'>
                    <label for="nieuwWerk">Nieuw werk</label>

                    <input type="radio" name='label' value='stelkozijnen' id='stelkozijnen'>
                    <label for="stelkozijnen">Stelkozijnen</label>


                    <input type="radio" name='label' value='afwerking' id='afwerking'>
                    <label for="afwerking">Afwerking</label><br>

                    <input type="radio" name='label' value='hulpBijMonteren' id='hulpBijMonteren'>
                    <label for="hulpBijMonteren">Hulp bij monteren</label>

                    <input type="radio" name='label' value='legeBokAfgemeld' id='legeBokAfgemeld'>
                    <label for="legeBokAfgemeld">Lege bok afgemeld</label>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="2" class='border border-black'>
                    <mark>Bij alleen leveren (zonder montage) op locatie doot transport dient de opdrachtgever de lege
                        bokken per email af te melden aan ons binnen 3 weken na levering</mark>
                </td>
            </tr>

            <tr class='border border-black p-2 '>
                <td rowspan='4'
                    class='text-center p-2 border border-black font-semibold'style='writing-mode: vertical-rl;'>Te Bestellen
                </td>
                <td rowspan='4'
                    class='text-center p-2 border border-black font-semibold'style='writing-mode: vertical-rl;'>Besteld</td>
                <td rowspan='4'
                    class='text-center p-2 border border-black font-semibold'style='writing-mode: vertical-rl;'>Ontvangen
                </td>
                <td rowspan='4'
                    class='text-center p-2 border border-black font-semibold'style='writing-mode: vertical-rl;'>Inclusief
                </td>
                <td colspan="2"class='border-black border'>Let op bij horren en gordijnen en overige producten die
                    besteld worden voor u kan er kleurverschil zijn met<br> het bestelde kozijn. Indien inzet klikhoren met
                    vast gaas mee besteld zijn voor de bestelde kozijnen dan<br> staan deze op de besteltekening apart
                    benoemd en worden gelijk mee besteld met uw kozijnen.</td>
            </tr>
            <tr>
                <td colspan="2"class='border-black border'>Let op bij beglazing van verschillende samenstellingen of
                    diktes kan er kleurverschil per ruit ontstaan</td>
            </tr>
            <tr>
                <td colspan="2"class='border-black border'><mark>De koper is gehouden vooraf bij het aangaan van de
                        koopovereenkomst de aanwezigheid van asbest/en of andere potentieel<br> gevaarlijk materiaal in het
                        gedeelte waar Boer kozijnen gaat verichten te (laten) verwijderen door een gecertificeerd bedrijf
                        alvorens<br> met de werkzaamheiden gestart kan worden</mark></td>
            </tr>
            <tr>
                <td colspan="2"class='border-black border'><mark>De koper is verantwoordelijk voor het melden van de
                        aanwezigheid van asbest en of ander potentieel gevaarlijk materiaal bij de<br> bevoegde
                        instansies</mark></td>
            </tr>

            @foreach($content as $item)
                <tr class='border border-black '>
                    <td class='text-center border border-black'>
                        <input type="radio" checked name='field{{$item->id}}' value='teBestellen'>
                    </td>
                    <td class='text-center border border-black'>
                        <input type="radio" name='field{{$item->id}}' value='besteld'>
                    </td>
                    <td class='text-center border border-black'>
                        <input type="radio" name='field{{$item->id}}' value='ontvangen'>
                    </td>
                    <td class='text-center border border-black'><input type="checkbox" name='inclusief{{$item->id}}' value='true'></td>
                    <td colspan='2'> {!!$item->content!!} 
                        
                    @error($item->id)
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror</td>
                </tr>
            @endforeach

            <tr>
                <td class='border border-black'colspan="6">
                    Totaal Euro <input class='border border-slate-300' type="number" name='totaalEuro'>
                    @error('totaalEuro')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    <input type="radio"
                        name='BTW' value="Inclusief_BTW"> Inclusief BTW <input type="radio" name='BTW' value='Exclusief_BTW'> Exclusief BTW zonder
                    betalingskorting<br>
                    (voor specificaties over uw bestelling en de kozijntekeningen zie de bijlage)
                </td>
            </tr>
            <tr>
                <td class='border border-black text-center'colspan="6"><mark>BETAALSCHEMA OM IN AANMERKING TE KOMEN VOOR
                        <u>2% OF 3% BETALINGKORTING</u></mark></td>
            </tr>
            <tr class="border-x border-black text-center">
                <td class='border border-black'><input type="radio" name='korting' value="2%"></td>
                <td></td>
                <td class='bg-yellow-300 border border-black'>2%</td>
                <td colspan="4">Om in aanmerking te komen voor 2% betalingskorting op uw order is het betaalschema als
                    volgt:

                </td>
            </tr>
            <tr class='border-x border-b border-black  text-center'>
                <td colspan="6"><mark> 50% - bij opdracht - 40% -14 dagen voor levering 10% -na levering en / of montage</mark></td>
            </tr>


            <tr class="border-x border-black text-center">
                <td class='border border-black'><input type="radio" name='korting' value="3%"></td>
                <td></td>
                <td class='bg-yellow-300 border border-black'>3%</td>
                <td colspan="4">Om in aanmerking te komen voor 3% betalingskorting op uw order is het betaalschema als
                    volgt:

                </td>
            </tr>
            <tr class='border-x border-b border-black  text-center'>

                <td colspan="6"><mark> 100% - bij opdracht</mark></td>
            </tr>

            <tr class="border border-black text-center">
                <td class='border border-black'><input type="radio" name='korting' value="0%"></td>
                <td></td>
                <td class='bg-yellow-300 border border-black'>0%</td>
                <td colspan="4"><mark>1e termijn betaling 50 % bij levering kozijnen op locatie en overige betaling naar de stand van de werkzaamheden</mark></td>
            </tr>

            <tr class="bg-gray-300 border border-black text-center"><td colspan="6">Bij geen bevestiging van uw zijde per email op 1 van de bovenstaande voorstellen, kan er later geen korting worden verrekend</td></tr>
            <tr class="border border-black">
                <td class="border border-black"colspan="5"><b>Inmeting: </b><u>paraaf</u> <input type="radio" name='inmeting' value="Henk"> Henk <input type="radio" name='inmeting' value="Willem"> Willem</td>
                <td colspan="1"><b>Order verwerkt door:</b> <input type="radio" name='orderVerwerktDoor' value="Willem"> Willem <input type="radio" name='orderVerwerktDoor' value="Rene"> Rene</td>
            </tr>
            <tr class="border border-black">
                <td colspan="6">
                    Planning monteurs: 
                    dagen <input class="border border-slate-300"type="text" name='dagen'>
                    @error('dagen')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    personen <input class="border border-slate-300" type="text" name='personen'>
                    @error('personen')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    naam <input class="border border-slate-300" type="text" name='naam'>
                    @error('naam')
                        <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                    <input type="checkbox" name="hulpIntillen"> + hulp intillen
            </td>
            </tr>
            <tr class="border border-black">
                <td colspan="6">Diversen: <textarea class='w-full h-1/3' name="diversen" cols="30" rows="3" ></textarea></td>
            </tr>

        </table>
        <button type="submit">Submit</button>
    </form>
        
    </div>
    <br>
@endsection
