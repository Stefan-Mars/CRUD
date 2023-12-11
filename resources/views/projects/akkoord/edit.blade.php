@extends('layouts/head')
@section('content')
@include('layouts/nav')
<br>
    
    <form action="/project/akkoord/update/{{ $akkoord->project_id }}" method="POST">
        @csrf
        <table class='m-auto border-separate border-spacing-1'>
            <tr>
                <td colspan="4">
                    <a href="/project/{{ $akkoord->project_id }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                    <h1 class="text-2xl text-center hide-for-pdf">Bewerk Akkoord</h1>
                </td>
            </tr>
            <tr class='bg-red-400 border-spacing-0'>
                <td class='p-2 title' colspan="4">
                    <span class="custom-radio @if ($akkoord->soortAanvraag == 'opleveringsbon') checked @endif"></span><input
                        class='hide-for-pdf' type="radio" name="soortAanvraag" value='opleveringsbon'
                        @if ($akkoord->soortAanvraag == 'opleveringsbon') checked @endif> Opleveringsbon
                    <span class="custom-radio margin @if ($akkoord->soortAanvraag == 'nalevering') checked @endif"></span><input
                        class='hide-for-pdf' type="radio" name="soortAanvraag"
                        value='nalevering'@if ($akkoord->soortAanvraag == 'nalevering') checked @endif> Nalevering
                    <span class="custom-radio margin @if ($akkoord->soortAanvraag == 'service') checked @endif"></span><input
                        class='hide-for-pdf' type="radio" name="soortAanvraag" value='service'
                        @if ($akkoord->soortAanvraag == 'service') checked @endif> Service
                    @error('soortAanvraag')
                        <p class='text-white text-xs'>{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam opdrachtgever: </b> <input
                        class='pdf float-right @error('naamOpdrachtgever') border border-red-500 @enderror' type="text"
                        name="naamOpdrachtgever" value='{{ $akkoord->naamOpdrachtgever }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Adres: <input
                        class='pdf float-right @error('ProjectAdres') border border-red-500 @enderror'type="text"
                        name='ProjectAdres'value='{{ $akkoord->ProjectAdres }}'></td>
                <td colspan="2"></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Postcode: <input
                        class='pdf float-right @error('postcode') border border-red-500 @enderror'type="text"
                        name='postcode' value='{{ $akkoord->postcode }}'></td>
                <td class='p-2' colspan="2">Woonplaats: <input
                        class='pdf float-right @error('woonplaats') border border-red-500 @enderror'type="text"
                        name='woonplaats' value='{{ $akkoord->woonplaats }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Telefoonnummer: <input
                        class='pdf float-right @error('telefoonnummer') border border-red-500 @enderror'type="text"
                        name='telefoonnummer'value='{{ $akkoord->telefoonnummer }}'></td>
                <td class='p-2' colspan="2">E-mail: <input
                        class='pdf float-right @error('Email') border border-red-500 @enderror'type="text"
                        name='Email'value='{{ $akkoord->Email }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam monteur:</b> <input
                        class='pdf float-right @error('naamMonteur') border border-red-500 @enderror'type="text"
                        name='naamMonteur' value='{{ $akkoord->naamMonteur }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Door wie af te werken: <input
                        class='pdf float-right @error('doorWieAfTeWerken') border border-red-500 @enderror'type="text"
                        name='doorWieAfTeWerken' value='{{ $akkoord->doorWieAfTeWerken }}'></td>
                <td class='p-2' colspan="2">In te plannen tijd (uur): <input
                        class='pdf float-right @error('inTePlannenTijd') border border-red-500 @enderror'type="text"
                        name='inTePlannenTijd' value='{{ $akkoord->inTePlannenTijd }}'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2' colspan="4"><b>Ordernummer fabrikant:</b> <input
                        class='tr float-right @error('ordernummerFabrikant') border border-red-500 @enderror'type="text"
                        name='ordernummerFabrikant' value='{{ $akkoord->ordernummerFabrikant }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">1. Zijn de ruimtes schoon opgeleverd? <span class='float-right'>ja <span
                        class="custom-radio @if ($akkoord->ruimteSchoon == 'true') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->ruimteSchoon == 'true') checked @endif type="radio" value="true"
                        name='ruimteSchoon'> nee <span
                        class="custom-radio @if ($akkoord->ruimteSchoon == 'false') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->ruimteSchoon == 'false') checked @endif type="radio" value="false"
                        name='ruimteSchoon'></span></td>
                <td class='p-2' colspan="2">4. Functioneren de ramen en deuren goed?  <span class='ml-4 float-right'>ja <span
                        class="custom-radio @if ($akkoord->ramenDeurenGoed == 'true') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->ramenDeurenGoed == 'true') checked @endif type="radio" value="true"
                        name='ramenDeurenGoed'> nee <span
                        class="custom-radio @if ($akkoord->ramenDeurenGoed == 'false') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->ramenDeurenGoed == 'false') checked @endif type="radio"
                        value="false" name='ramenDeurenGoed'></span></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">2. Zijn uw eigendommen onbeschadigd gebleven?  <span class='float-right'>ja <span
                        class="custom-radio @if ($akkoord->eigendommenBeschadigd == 'true') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->eigendommenBeschadigd == 'true') checked @endif type="radio"
                        value="true" name='eigendommenBeschadigd'> nee <span
                        class="custom-radio @if ($akkoord->eigendommenBeschadigd == 'false') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->eigendommenBeschadigd == 'false') checked @endif type="radio"
                        value="false" name='eigendommenBeschadigd'></span></td>
                <td class='p-2' colspan="2">5. Is de afwerking naar wens uitgevoerd?  <span class='float-right ml-4'>ja <span
                        class="custom-radio @if ($akkoord->afwerkingUitgevoerd == 'true') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->afwerkingUitgevoerd == 'true') checked @endif type="radio"
                        value="true" name='afwerkingUitgevoerd'> nee <span
                        class="custom-radio @if ($akkoord->afwerkingUitgevoerd == 'false') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->afwerkingUitgevoerd == 'false') checked @endif type="radio"
                        value="false" name='afwerkingUitgevoerd'></span></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">3. Zijn de ruiten en kozijnen onbeschadigd?  <span class='float-right'>ja <span
                        class="custom-radio @if ($akkoord->ruitenKozijnenOnbeschadigd == 'true') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->ruitenKozijnenOnbeschadigd == 'true') checked @endif type="radio"
                        value="true" name='ruitenKozijnenOnbeschadigd'> nee <span
                        class="custom-radio @if ($akkoord->ruitenKozijnenOnbeschadigd == 'false') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->ruitenKozijnenOnbeschadigd == 'false') checked @endif type="radio"
                        value="false" name='ruitenKozijnenOnbeschadigd'></span></td>
                <td class='p-2' colspan="2">6. Voldoen alle overige punten aan uw wens?  <span class='ml-4 float-right'>ja <span
                        class="custom-radio @if ($akkoord->overigePunten == 'true') checked @endif"></span><input
                        class='hide-for-pdf'@if ($akkoord->overigePunten == 'true') checked @endif type="radio"
                        value="true" name='overigePunten'> nee <span
                        class="custom-radio @if ($akkoord->overigePunten == 'false') checked @endif"></span><input
                        class='hide-for-pdf' @if ($akkoord->overigePunten == 'false') checked @endif type="radio"
                        value="false" name='overigePunten'></span></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2 'colspan='4'><b>Indien er punten zijn die afgewerkt dienen te worden dan gelieve hieronder
                        aangeven:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan='4'>
                    <textarea id='textbox' type='text'class="w-full @error('anderePunten') border border-red-500 @enderror overflow-hidden p-0 outline-none min-w-[30%]"
                        name='anderePunten'>{{ $akkoord->anderePunten }}</textarea>
                </td>

            </tr>
            <tr class='bg-red-100'>
                <td class='p-2' colspan="4"><b>Eventueel tekening:</b>
                    <img src="{{ $akkoord->tekeningData }}" alt="No image">
                </td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Akkoordverklaring voor de werkzaamheden middels het<br> ondertekenen 
                    verklaart de klant akkoord te gaan met de <br>werkzaamheden</td>
                <td class='p-2' colspan="2">Handtekening klant:
                    <img src="{{ $akkoord->signatureData }}" alt="No image">
                </td>
            </tr>
            <tr>
                <td colspan="2" class='text-center hide-for-pdf'><button type="submit"
                        class='bg-red-400 p-1'>Update</button></td>
                <td colspan="2" class='text-center hide-for-pdf'><a
                        href='/project/akkoord/download/{{ $akkoord->project_id }}' class='bg-red-400 p-1'>Download</a>
                </td>
            </tr>
        </table>
    </form>
    <script>
        var observe;
        if (window.attachEvent) {
            observe = function (element, event, handler) {
                element.attachEvent('on'+event, handler);
            };
        }
        else {
            observe = function (element, event, handler) {
                element.addEventListener(event, handler, false);
            };
        }
        function init () {
            var text = document.getElementById('textbox');
            function resize () {
                text.style.height = 'auto';
                text.style.height = text.scrollHeight+'px';
            }
            /* 0-timeout to get the already changed text */
            function delayedResize () {
                window.setTimeout(resize, 0);
            }
            observe(text, 'change',  resize);
            observe(text, 'cut',     delayedResize);
            observe(text, 'paste',   delayedResize);
            observe(text, 'drop',    delayedResize);
            observe(text, 'keydown', delayedResize);

            text.focus();
            text.select();
            resize();
        }
        init();
    </script>


@endsection
