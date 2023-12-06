@extends('layouts/head')
@section('content')
@include('layouts/nav')
    <form action="/project/akkoords/{{ $project->id }}" method="POST">
        @csrf
        <table class='m-auto border-separate border-spacing-1'>
            <tr>
                <td colspan="4">
                    <a href="/project/{{ $project->id }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
                    <h1 class="text-2xl text-center">Maak Akkoord</h1>
                </td>
            </tr>
            <tr class='bg-red-400 border-spacing-0'>
                <td class='p-2' colspan="4"><input type="radio" name="soortAanvraag" value='opleveringsbon'>
                    Opleveringsbon <input type="radio" name="soortAanvraag" value='nalevering'> Nalevering <input
                        type="radio" name="soortAanvraag" value='service'> Service @error('soortAanvraag')
                        <p class='text-red-500 text-xs'>{{ $message }}</p>
                    @enderror
                </td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2'colspan="4"><b>Naam opdrachtgever: </b> <input
                        class='float-right @error('naamOpdrachtgever') border border-red-500 @enderror' type="text"
                        name="naamOpdrachtgever" value='{{ old('naamOpdrachtgever') }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4">Adres: <input
                        class='float-right @error('ProjectAdres') border border-red-500 @enderror'type="text"
                        name='ProjectAdres'value='{{ $project->ProjectAdres }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Postcode: <input
                        class='float-right @error('postcode') border border-red-500 @enderror'type="text" name='postcode'
                        value='{{ old('postcode') }}'></td>
                <td class='p-2' colspan="2">Woonplaats: <input
                        class='float-right @error('woonplaats') border border-red-500 @enderror'type="text"
                        name='woonplaats' value='{{ old('woonplaats') }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Telefoonnummer: <input
                        class='float-right @error('telefoonnummer') border border-red-500 @enderror'type="text"
                        name='telefoonnummer'value='{{ $info[0]->telefoonnummer }}'></td>
                <td class='p-2' colspan="2">E-mail: <input
                        class='float-right @error('Email') border border-red-500 @enderror'type="text"
                        name='Email'value='{{ $project->Email }}' autocomplete='email'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="4"><b>Naam monteur:</b> <input
                        class='float-right @error('naamMonteur') border border-red-500 @enderror'type="text"
                        name='naamMonteur' value='{{ old('naamMonteur') }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Door wie af te werken: <input
                        class='float-right @error('doorWieAfTeWerken') border border-red-500 @enderror'type="text"
                        name='doorWieAfTeWerken' value='{{ old('doorWieAfTeWerken') }}'></td>
                <td class='p-2' colspan="2">In te plannen tijd (uur): <input
                        class='float-right @error('inTePlannenTijd') border border-red-500 @enderror'type="text"
                        name='inTePlannenTijd' value='{{ old('inTePlannenTijd') }}'></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2' colspan="4"><b>Ordernummer fabrikant:</b> <input
                        class='float-right @error('ordernummerFabrikant') border border-red-500 @enderror'type="text"
                        name='ordernummerFabrikant' value='{{ old('ordernummerFabrikant') }}'></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">1. Zijn de ruimtes schoon opgeleverd? <span class='float-right'>ja <input type="radio"
                        value="true" name='ruimteSchoon'> nee <input type="radio" value="false" name='ruimteSchoon'></span>
                </td>
                <td class='p-2' colspan="2">4. Functioneren de ramen en deuren goed? <span class='float-right'>ja <input type="radio"
                        value="true" name='ramenDeurenGoed'> nee <input type="radio" value="false"
                        name='ramenDeurenGoed'></span></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">2. Zijn uw eigendommen onbeschadigd gebleven? <span class='float-right'>ja <input type="radio"
                        value="true" name='eigendommenBeschadigd'> nee <input type="radio" value="false"
                        name='eigendommenBeschadigd'></span></td>
                <td class='p-2' colspan="2">5. Is de afwerking naar wens uitgevoerd? <span class='float-right'>ja <input type="radio"
                        value="true" name='afwerkingUitgevoerd'> nee <input type="radio" value="false"
                        name='afwerkingUitgevoerd'></span></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">3. Zijn de ruiten en kozijnen onbeschadigd? <span class='float-right'>ja <input type="radio"
                        value="true" name='ruitenKozijnenOnbeschadigd'> nee <input type="radio" value="false"
                        name='ruitenKozijnenOnbeschadigd'></span></td>
                <td class='p-2' colspan="2">6. Voldoen alle overige punten aan uw wens? <span class='float-right'>ja <input type="radio"
                        value="true" name='overigePunten'> nee <input type="radio" value="false"
                        name='overigePunten'></span></td>
            </tr>
            <tr class='bg-red-300'>
                <td class='p-2' colspan='4'><b>Indien er punten zijn die afgewerkt dienen te worden dan gelieve
                        hieronder aangeven:</b></td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan='4'>
                    <textarea type='text'class="w-full @error('anderePunten') border border-red-500 @enderror"
                        name='anderePunten'>{{ old('anderePunten') }}</textarea>
                </td>
            </tr>
            <tr class='bg-red-100'>
                <td class='p-2' colspan="4"><b>Eventueel tekening:</b>
                
                
                    <div id="zbeubeu"></div>

                    <style>
                        #zbeubeu {
                            width: 1100px;
                            height: 300px;
                        }
                    </style>

                
                </td>
            </tr>
            <tr class='bg-red-200'>
                <td class='p-2' colspan="2">Akkoordverklaring voor de werkzaamheden middels het ondertekenen
                    verklaart<br> de klant akkorrd te gaan met de werkzaamheden</td>
                <td class='p-2' colspan="2">Handtekening klant:
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

                </td>
            </tr>
            <tr>
                <td colspan="4" class='text-center'><button type="submit" class='bg-red-400 p-1'>Create</button>
                </td>
            </tr>
        </table>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js"
        integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        

    DrawingBoard.Control.StraightLine = DrawingBoard.Control.extend({
        name: 'straightLine',
        isDrawing: false,
        startDrawX: 0,
        startDrawY: 0,

        initialize: function() {
            var self = this;

            this.$el = document.createElement('button');
            this.$el.classList.add('drawing-board-control');
            this.$el.innerHTML = '|';
            this.$el.style.width = '25px';
            this.$el.style.height = '25px';
            this.$el.style.border = '1px solid lightgray';
            this.$el.style.backgroundColor = 'white';
            this.$el.addEventListener('click', function(event) {
                if (event.cancelable) event.preventDefault();
                self.toggleDrawing();
            });

            const canvasBoard = document.querySelector('.drawing-board-canvas');
            canvasBoard.addEventListener('mousemove', this.onMouseMove.bind(this));
            canvasBoard.addEventListener('mousedown', this.onMouseDown.bind(this));
            canvasBoard.addEventListener('mouseup', this.onMouseUp.bind(this));
        },

        toggleDrawing: function() {
            console.log('Toggle');
            this.isDrawing = !this.isDrawing;

            if (this.isDrawing) {
                this.$el.style.boxShadow = 'inset 0 0 5px gray';
                this.$el.classList.add('active');

                
            } else {
                this.$el.style.boxShadow = '';
                this.$el.classList.remove('active');
                
            }
            
        
        },

        onMouseDown: function(event) {
            if (!this.isDrawing) return;
            console.log('Down');
            var canvas = document.querySelector('.drawing-board-canvas');
            var rect = canvas.getBoundingClientRect();
            this.startDrawX = event.clientX - rect.left;
            this.startDrawY = event.clientY - rect.top;
        },

        onMouseUp: function(event) {
            if (!this.isDrawing) return;
            console.log('Up');
            var canvas = document.querySelector('.drawing-board-canvas');
            var rect = canvas.getBoundingClientRect();
            var endDrawX = event.clientX - rect.left;
            var endDrawY = event.clientY - rect.top;

            var ctx = canvas.getContext('2d');
            ctx.beginPath();
            ctx.moveTo(this.startDrawX, this.startDrawY);
            ctx.lineTo(endDrawX, endDrawY);
            ctx.stroke();
        },

        onMouseMove: function() {
            
            console.log('Move');
            if (this.isDrawing) {
                this.board.ev.trigger('mousedown', this);
            }
            
        }
    });




        var drawingBoard = new DrawingBoard.Board('zbeubeu', {
            controls: [
                'Color',
                { Size: { type: 'range' } },
                'DrawingMode',
                { Navigation: { back: true, forward: true } },
                'StraightLine' // Add the custom control here
            ],
            color: '#000000',
            size: 5,
            droppable: true
        });

        //Signature pad 
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
            backgroundColor: 'rgb(254, 202, 202)'
        });

        document.getElementById("clear").addEventListener('click', function(event) {
            if (event.cancelable) event.preventDefault();
            signaturePad.clear();
        });



        var form = document.querySelector('form');

        form.addEventListener('submit', function(event) {
            if (event.cancelable) event.preventDefault();
            var signatureData = signaturePad.toDataURL();
            var signatureInput = document.createElement('input');
            signatureInput.setAttribute('type', 'hidden');
            signatureInput.setAttribute('name', 'signatureData');
            signatureInput.setAttribute('value', signatureData);
            form.appendChild(signatureInput);




            var canvas = drawingBoard.canvas;
            var tekeningData = canvas.toDataURL(); // Retrieve drawing data as Data URL
            var tekeningInput = document.createElement('input');
            tekeningInput.setAttribute('type', 'hidden');
            tekeningInput.setAttribute('name', 'tekeningData');
            tekeningInput.setAttribute('value', tekeningData);
            form.appendChild(tekeningInput);


            form.submit();
        });
    </script>
@endsection
