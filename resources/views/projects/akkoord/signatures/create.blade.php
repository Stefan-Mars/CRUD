@extends('layouts/head')
@section('content')
    @include('layouts/nav')

    <table class="m-auto">
        <tr><td class="text-center text-xl font-semibold">Handtekening</td></tr>
    
    <tr><td>
    <form action="/project/akkoord/signature/{{$akkoord->id}}" method="POST">
        @csrf
    <div class="flex">
        <div class="border border-purple-600">
            <canvas id="signature-pad" class="w-full h-full cursor-crosshair bg-white" width="400"
                height="150"></canvas>
        </div>
        <div class="">
            <button id="clear"
                class='h-full border border-purple-600 text-white font-bold cursor-pointer bg-purple-600'><span
                    class='rotate-90 block'> Clear </span></button>
        </div>
    </div>
    
    <tr>
        <td class="text-center"><button class="text-center" type="submit">Opslaan</button></td>
    </tr>
    </form>
    </table>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js"
        integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var canvas = document.getElementById("signature-pad");

        function resizeCanvas() {
            var ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d", {
                willReadFrequently: true
            }).scale(ratio, ratio);
        }
        window.onresize = resizeCanvas;
        resizeCanvas();

        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(254, 202, 202)'
        });

        document.getElementById("clear").addEventListener('click', function(event) {
            if (event.cancelable) event.preventDefault();
            signaturePad.clear();
        });



        var form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            if (event.cancelable) event.preventDefault();

            var image = signaturePad.toDataURL();
            var signatureInput = document.createElement('input');
            signatureInput.setAttribute('type', 'hidden');
            signatureInput.setAttribute('name', 'image');
            signatureInput.setAttribute('value', image);
            form.appendChild(signatureInput);

            form.submit();
        });
    </script>
@endsection