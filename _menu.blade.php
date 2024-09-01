<html>

<head>
    <title>Reštaurácia Faceclub - menu {{ $days[0] }} - {{ $days[4] }}</title>

    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{ asset('/css/_menu_print.css') }}">
    <style>
        @page {
            margin: 40px;
        }

        strong {
            margin-bottom: 5pt;
        }

        strong.red {
            margin-bottom: 10pt;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 10pt;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
        }

        h3 {
            margin-bottom: 0pt;
            margin-top: 0pt;
            line-height: 1;
            clear: both;
            /*background: red;*/
            display: block;
        }

        .left-col .polievka,
        .left-col .hlavny-chod {
            font-size: 9pt;
            line-height: 9pt;
            font-style: italic;
            width: 450pt;
            text-align: left;
            padding-left: 10pt;
            /*background: blue;*/
            display: inline-block;
            vertical-align: middle;
        }

        .left-col {
            margin-bottom: 0pt;
        }

        .left-col-title {
            font-size: 11pt;
            line-height: 11pt;
            width: 60pt;
            display: inline-block;
            padding-right: 10pt;
            /*background: blue;*/
            vertical-align: middle;
        }

        .left-col-price {
            font-size: 10pt;
            line-height: 10pt;
            width: 60pt;
            display: inline-block;
            /*background: red;*/
            text-align: right;
            padding-right: 10pt;
            vertical-align: middle;

        }

        span.hlavny-chod i {
            font-size: 9pt;
        }

        span.polievka i:last-of-type {
            display: none;
        }

        #footer p {
            text-align: center;
            font-size: 9pt;
            margin-bottom: 1pt;
            margin-top: 2pt;
        }

        #footer p:last-of-type strong {
            display: block;
            padding-top: 2pt;
            font-size: 8.5pt;
            padding-bottom: 0.25pt;
        }

        #footer p:last-of-type span {
            padding-right: 8px;
            line-height: 8pt;
            font-size: 8pt;
        }

        .day {
            margin-top: 1pt;
        }

        i.fa {
            font-size: 10pt;
        }

        .fa {
            display: inline;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 1;
            font-family: FontAwesome;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        small {
            font-size: 8pt;
            display: block;
            margin-top: 0pt;
            color: #4b4b4b;
            /* text-align: center; */
        }
    </style>
</head>

<body>
    <div>
        <!--<h2 class="fancyFont red text-center">Ristorante Emilia</h2>-->
        <strong class="blue text-center">Denné menu od 11:00 do 15:00</strong>
        <strong class="red text-center">{{ $days[0] }} - {{ $days[4] }}</strong>
        <?php setlocale(LC_ALL, 'sk_SK.UTF-8'); ?>
        <small>*Cena polievky mimo menu: 2.50 &euro;</small>
        @foreach ($days as $day)
            <div class="day">
                <div class="left-col">
                    <h3><span class="red left-col-title">{{ strftime('%A', strtotime($day)) }}</span>
                        <span class="polievka">
                            @foreach (\App\DenneMenuDates::where('user_id', $_ENV['SOFT_ID'])->where('date', $day)->first()->items as $item)
                                @if (strtolower($item->kategoria->name) == 'polievka')
                                    <span class="left-col-price" style="width: auto; padding-right: 2pt">{{ number_format($item->pivot->price, 2) }} &euro; </span> - {{ $item->name }}
                                    <i>,</i>
                                @endif
                            @endforeach
                        </span>
                    </h3>
                </div>
                <?php $c = 0; ?>
                @foreach (\App\DenneMenuDates::where('user_id', $_ENV['SOFT_ID'])->where('date', $day)->first()->items as $item)
                    @if (strtolower($item->kategoria->name) != 'polievka')
                        <?php $c++; ?>
                        <div class="left-col">
                            <h3><span class="left-col-price">{{ number_format($item->pivot->price, 2) }} &euro; </span>
                                <span class="hlavny-chod">
                                    <i>{{ $c }}.</i> {{ $item->name }}
                                </span>
                            </h3>
                        </div>
                    @endif
                @endforeach
                <div class="right-col text-center">

                </div>
            </div>
        @endforeach
        <div id="footer">
            <p class="red" style="margin-top: 10pt">
                <span class="fa fa-phone" aria-hidden="true"></span> 0915 772 567 ,
                <i class="fa fa-envelope"></i> info@faceclub.sk , <i class="fa fa-globe"></i> www.faceclub.sk
            </p>
            <p class="blue">
                Polievka 0,33l, váha mäsa v surovom stave 100g, príloha 150g, šalát 50g
                <br>
                Cena stravnej jednotky je uvedená s DPH, zmena jedál vyhradená
            </p>
            <p>
                <strong>Zoznam alergénov</strong>
                <span>1. obilniny obsahujúce lepok,</span>
                <span>2. kôrovce a výrobky z nich,</span>
                <span>3. vajcia a výrobky z nich,</span>
                <span>4. ryby a výrobky z nich,</span>
                <span>5. arašidy a výrobky z nich,</span>
                <span>6. sójové zrná a výrobky z nich,</span>
                <span>7. mlieko a výrobky z neho,</span>
                <span>8. orechy,</span>
                <span>9. zelér a výrobky z neho ,</span>
                <span>10. horčica a výrobky z nej,</span>
                <span>11. sézamové semená,</span>
                <span>12. oxid síričity a síričitany,</span>
                <span>13. vlčí bôb a výrobky z neho,</span>
                <span>14. mäkkýše a výrobky z nich,</span>
            </p>
        </div>
    </div>
    <script type="text/javascript">
        try {
            this.print();
        } catch (e) {
            window.onload = window.print;
        }
    </script>

</body>

</html>
