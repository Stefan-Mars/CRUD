@extends('layouts/head')
@section('content')
    @include('layouts/nav')
    <form action="/project/akkoords/{{$project->id}}" method="POST">
        @csrf
        <table class='m-auto border-separate border-spacing-1'>
            <tr class='bg-red-400 border-spacing-0' >
                <td class='p-2' colspan="4" ><input type="radio" name="soortAanvraag" value='opleveringsbon'> Opleveringsbon <input type="radio" name="soortAanvraag" value='nalevering'> Nalevering <input type="radio" name="soortAanvraag" value='service'> Service @error('soortAanvraag') <p class='text-red-700 text-xs font-bold'>{{$message}}</p> @enderror</td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2'colspan="4"><b >Naam opdrachtgever: </b> <input class='float-right @error('naamOpdrachtgever') border border-red-500 @enderror' type="text" name="naamOpdrachtgever" value='{{old('naamOpdrachtgever')}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4">Adres: <input class='float-right @error('ProjectAdres') border border-red-500 @enderror'type="text" name='ProjectAdres'value='{{$project->ProjectAdres}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Postcode: <input class='float-right @error('postcode') border border-red-500 @enderror'type="text" name='postcode' value='{{old('postcode')}}'></td>
                <td class='p-2' colspan="2">Woonplaats: <input class='float-right @error('woonplaats') border border-red-500 @enderror'type="text" name='woonplaats' value='{{old('woonplaats')}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Telefoonnummer: <input class='float-right @error('telefoonnummer') border border-red-500 @enderror'type="text" name='telefoonnummer'value='{{$info->telefoonnummer}}'></td>
                <td class='p-2' colspan="2">E-mail: <input class='float-right @error('Email') border border-red-500 @enderror'type="text" name='Email'value='{{$project->Email}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam monteur:</b> <input class='float-right @error('naamMonteur') border border-red-500 @enderror'type="text" name='naamMonteur' value='{{old('naamMonteur')}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Door wie af te werken: <input class='float-right @error('doorWieAfTeWerken') border border-red-500 @enderror'type="text" name='doorWieAfTeWerken' value='{{old('doorWieAfTeWerken')}}'></td>
                <td class='p-2' colspan="2">In te plannen tijd (uur): <input class='float-right @error('inTePlannenTijd') border border-red-500 @enderror'type="text" name='inTePlannenTijd' value='{{old('inTePlannenTijd')}}'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2' colspan="4"><b>Ordernummer fabrikant:</b> <input class='float-right @error('ordernummerFabrikant') border border-red-500 @enderror'type="text" name='ordernummerFabrikant' value='{{old('ordernummerFabrikant')}}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">1. Zijn de ruimtes schoon opgeleverd?  ja <input type="radio" value="true" name='ruimteSchoon'> nee <input type="radio" value="false" name='ruimteSchoon'></td>
                <td class='p-2' colspan="2">4. Functioneren de ramen en deuren goed? ja <input type="radio" value="true" name='ramenDeurenGoed'> nee <input type="radio" value="false" name='ramenDeurenGoed'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">2. Zijn uw eigendommen onbeschadigd gebleven? ja <input type="radio" value="true" name='eigendommenBeschadigd'> nee <input type="radio" value="false" name='eigendommenBeschadigd'></td>
                <td class='p-2' colspan="2">5. Is de afwerking naar wens uitgevoerd? ja <input type="radio" value="true" name='afwerkingUitgevoerd'> nee <input type="radio" value="false" name='afwerkingUitgevoerd'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">3. Zijn de ruiten en kozijnen onbeschadigd? ja <input type="radio" value="true" name='ruitenKozijnenOnbeschadigd'> nee <input type="radio" value="false" name='ruitenKozijnenOnbeschadigd'></td>
                <td class='p-2' colspan="2">6. Voldoen alle overige punten aan uw wens? ja <input type="radio" value="true" name='overigePunten'> nee <input type="radio" value="false" name='overigePunten'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2 ' colspan='4'><b>Indien er punten zijn die afgewerkt dienen te worden dan gelieve hieronder aangeven:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan='4'><textarea type='text'class="w-full @error('naamOpdrachtgever') border border-red-500 @enderror" name='anderePunten'>{{old('anderePunten')}}</textarea></td>
            </tr>
            <tr class='bg-red-100'>
                <td class='p-2' colspan="4"><b>Eventueel tekening:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Akkoordverklaring voor de werkzaamheden middels het ondertekenen verklaart<br> de klant akkorrd te gaan met de werkzaamheden</td>
                <td class='p-2' colspan="2">Handtekening klant:
                    <div class="flex">
                        <div class="border border-purple-600">
                            <canvas  id="signature-pad" class="w-full h-full cursor-crosshair bg-white" width="400" height="200"></canvas>
                        </div>
                        <div class="">
                            <button id="clear" class='h-full border border-purple-600 text-white font-bold cursor-pointer bg-purple-600'><span class='rotate-90 block'> Clear </span></button>
                        </div>
                    </div>
                    
                </td>
            </tr>
            <tr>
                <td colspan="4" class='text-center'><button type="submit" class='bg-red-400 p-1'>Create</button></td>
            </tr>
        </table>
    </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
       var canvas = document.getElementById("signature-pad");

       function resizeCanvas() {
           var ratio = Math.max(window.devicePixelRatio || 1, 1);
           canvas.width = canvas.offsetWidth * ratio;
           canvas.height = canvas.offsetHeight * ratio;
           canvas.getContext("2d").scale(ratio, ratio);
       }
       window.onresize = resizeCanvas;
       resizeCanvas();

       var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(250,250,250)'
       });

       document.getElementById("clear").addEventListener('click', function(){
            signaturePad.clear();
       })
</script>

@endsection