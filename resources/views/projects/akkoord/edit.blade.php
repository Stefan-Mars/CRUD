@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <form action="/project/akkoord/update/{{$akkoord->id}}" method="POST">
        @csrf
        <table class='m-auto border-separate border-spacing-1'>
            <tr class='bg-red-400 border-spacing-0' >
                <td class='p-2' colspan="4" >
                    <input type="radio" name="soortAanvraag" value='opleveringsbon' @if($akkoord->soortAanvraag == 'opleveringsbon') checked @endif> Opleveringsbon 
                    <input type="radio" name="soortAanvraag" value='nalevering'@if($akkoord->soortAanvraag == 'nalevering') checked @endif > Nalevering 
                    <input type="radio" name="soortAanvraag" value='service' @if($akkoord->soortAanvraag == 'service') checked @endif> Service 
                    @error('soortAanvraag') 
                        <p class='text-white text-xs'>{{$message}}</p> 
                    @enderror
                </td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam opdrachtgever: </b> <input class='float-right @error('naamOpdrachtgever') border border-red-500 @enderror' type="text" name="naamOpdrachtgever" value='{{$akkoord->naamOpdrachtgever}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4">Adres: <input class='float-right @error('ProjectAdres') border border-red-500 @enderror'type="text" name='ProjectAdres'value='{{$akkoord->ProjectAdres}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Postcode: <input class='float-right @error('postcode') border border-red-500 @enderror'type="text" name='postcode' value='{{$akkoord->postcode}}'></td>
                <td class='p-2' colspan="2">Woonplaats: <input class='float-right @error('woonplaats') border border-red-500 @enderror'type="text" name='woonplaats' value='{{$akkoord->woonplaats}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Telefoonnummer: <input class='float-right @error('telefoonnummer') border border-red-500 @enderror'type="text" name='telefoonnummer'value='{{$akkoord->telefoonnummer}}'></td>
                <td class='p-2' colspan="2">E-mail: <input class='float-right @error('Email') border border-red-500 @enderror'type="text" name='Email'value='{{$akkoord->Email}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam monteur:</b> <input class='float-right @error('naamMonteur') border border-red-500 @enderror'type="text" name='naamMonteur' value='{{$akkoord->naamMonteur}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Door wie af te werken: <input class='float-right @error('doorWieAfTeWerken') border border-red-500 @enderror'type="text" name='doorWieAfTeWerken' value='{{$akkoord->doorWieAfTeWerken}}'></td>
                <td class='p-2' colspan="2">In te plannen tijd (uur): <input class='float-right @error('inTePlannenTijd') border border-red-500 @enderror'type="text" name='inTePlannenTijd' value='{{$akkoord->inTePlannenTijd}}'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2' colspan="4"><b>Ordernummer fabrikant:</b> <input class='float-right @error('ordernummerFabrikant') border border-red-500 @enderror'type="text" name='ordernummerFabrikant' value='{{$akkoord->ordernummerFabrikant}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">1. Zijn de ruimtes schoon opgeleverd?  ja <input @if($akkoord->ruimteSchoon == 'true') checked @endif type="radio" value="true" name='ruimteSchoon'> nee <input  @if($akkoord->ruimteSchoon == 'false') checked @endif type="radio" value="false" name='ruimteSchoon'></td>
                <td class='p-2' colspan="2">4. Functioneren de ramen en deuren goed? ja <input @if($akkoord->ramenDeurenGoed == 'true') checked @endif type="radio" value="true" name='ramenDeurenGoed'> nee <input  @if($akkoord->ramenDeurenGoed == 'false') checked @endif type="radio" value="false" name='ramenDeurenGoed'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">2. Zijn uw eigendommen onbeschadigd gebleven? ja <input @if($akkoord->eigendommenBeschadigd == 'true') checked @endif type="radio" value="true" name='eigendommenBeschadigd'> nee <input  @if($akkoord->eigendommenBeschadigd == 'false') checked @endif type="radio" value="false" name='eigendommenBeschadigd'></td>
                <td class='p-2' colspan="2">5. Is de afwerking naar wens uitgevoerd? ja <input  @if($akkoord->afwerkingUitgevoerd == 'true') checked @endif type="radio" value="true" name='afwerkingUitgevoerd'> nee <input @if($akkoord->afwerkingUitgevoerd == 'false') checked @endif type="radio" value="false" name='afwerkingUitgevoerd'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">3. Zijn de ruiten en kozijnen onbeschadigd? ja <input @if($akkoord->ruitenKozijnenOnbeschadigd == 'true') checked @endif type="radio" value="true" name='ruitenKozijnenOnbeschadigd'> nee <input  @if($akkoord->ruitenKozijnenOnbeschadigd == 'false') checked @endif type="radio" value="false" name='ruitenKozijnenOnbeschadigd'></td>
                <td class='p-2' colspan="2">6. Voldoen alle overige punten aan uw wens? ja <input @if($akkoord->overigePunten == 'true') checked @endif type="radio" value="true" name='overigePunten'> nee <input @if($akkoord->overigePunten == 'false') checked @endif type="radio" value="false" name='overigePunten'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2 'colspan='4'><b>Indien er punten zijn die afgewerkt dienen te worden dan gelieve hieronder aangeven:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan='4'><textarea type='text'class="w-full @error('naamOpdrachtgever') border border-red-500 @enderror" name='anderePunten'>{{$akkoord->anderePunten}}</textarea></td>
            </tr>
            <tr class='bg-red-100'>
                <td class='p-2' colspan="4"><b>Eventueel tekening:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Akkoordverklaring voor de werkzaamheden middels het ondertekenen verklaart<br> de klant akkorrd te gaan met de werkzaamheden</td>
                <td class='p-2' colspan="2">Handtekening klant:</td>
            </tr>
            <tr>
                <td colspan="4" class='text-center'><button type="submit" class='bg-red-400 p-1'>Update</button></td>
            </tr>
        </table>
    </form>


@endsection