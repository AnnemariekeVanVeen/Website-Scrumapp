@extends('layouts.app')

@section('content')
    <div class="banner">
        <div class="banner-inner">
            <h1 class="text-white font-weight-bold text-center">Create your free Codesign-account today</h1>
            <h3 class="text-white font-weight-bold text-center">Get started with 12 months of free services</h3>
            @if(!\Illuminate\Support\Facades\Auth::user())
                <a class="placing a-btn mt-4" href="{{ route('register') }}">
                    <button class="scnd-btn"> Start now</button>
                </a>
            @endif

        </div>
    </div>
    <div class="banner-img">
        <img src="{{ asset('storage/img/gif-scrumapp.gif') }}">
    </div>

    <div class="container">
        <div class="container-inner ">
            <div class="intro">
                <h1 class="text-center font-weight-bold ">Codesign</h1>
                <p class="text-center  ">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.
                    Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende
                    drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het
                    heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in
                    elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van
                    Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals
                    Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
            </div>
            <div class="row ">
                <div class="col-3 ">
                    <div class="card">
                        <div class="card-body select-card">
                            <img src="{{ asset('storage/img/ic01.png') }}">
                            <h2 class="text-center font-weight-bold">Projecten</h2>
                            <p class="text-center  ">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en
                                zetterijwezen..</p>
                            <a href="#project">
                                <button>Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body select-card">
                            <img src="{{ asset('storage/img/ic03.png') }}">
                            <h2 class="text-center font-weight-bold">Sprints</h2>
                            <p class="text-center  ">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en
                                zetterijwezen..</p>
                            <a href="#ssprint">
                                <button>Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body select-card">
                            <img src="{{ asset('storage/img/ic02.png') }}">
                            <h2 class="text-center font-weight-bold">Backlog items</h2>
                            <p class="text-center  ">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en
                                zetterijwezen..</p>
                            <a href="#backlog">
                                <button>Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body select-card">
                            <img src="{{ asset('storage/img/ic04.png') }}">
                            <h2 class="text-center font-weight-bold">Retrospective</h2>
                            <p class="text-center  ">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en
                                zetterijwezen..</p>
                            <a href="#retro">
                                <button>Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    Call 2 actions    --}}
    <div class="c2a" id="foto1">
        <div class="c2a-inner">
            <h1 class="text-white font-weight-bold text-center">Interested?</h1>
            <h1 class="text-white font-weight-bold text-center">Create your account now.</h1>
            @if(!\Illuminate\Support\Facades\Auth::user())
                <a class="a-btn placing mt-4" href="{{ route('register') }}">
                    <button class="scnd-btn"> Create now</button>
                </a>
            @endif
        </div>
    </div>
    {{--    Scrum Items      --}}
    <div class="container-fluid">
        <div class="container">
            <div class="row scrum-items d-flex align-items-center">
                <div class="col-6">
                    <img class="w-100" src="{{ asset('storage/img/mockup-projecten.png') }}" alt="">
                </div>
                <div class="col-6" id="project">
                    <h1 class="font-weight-bold mb-4">Create your project</h1>
                    <p>In tegenstelling tot wat algemeen aangenomen wordt is Lorem Ipsum niet zomaar willekeurige tekst.
                        het heeft zijn wortels in een stuk klassieke latijnse literatuur uit 45 v.Chr. en is dus meer
                        dan 2000 jaar oud. Richard McClintock, een professor latijn aan de Hampden-Sydney College in
                        Virginia, heeft één van de meer obscure latijnse woorden, consectetur, uit een Lorem Ipsum
                        passage opgezocht, en heeft tijdens het zoeken naar het woord in de klassieke literatuur de
                        onverdachte bron ontdekt. Lorem Ipsum komt uit de secties 1.10.32 en 1.10.33 van "de Finibus
                        Bonorum et Malorum" (De uitersten van goed en kwaad) door Cicero, geschreven in 45 v.Chr. Dit
                        boek is een verhandeling over de theorie der ethiek, erg populair tijdens de renaissance. De
                        eerste regel van Lorem Ipsum, "Lorem ipsum dolor sit amet..", komt uit een zin in sectie
                        1.10.32.<br>
                        <br>
                        Het standaard stuk van Lorum Ipsum wat sinds de 16e eeuw wordt gebruikt is hieronder, voor wie
                        er interesse in heeft, weergegeven. Secties 1.10.32 en 1.10.33 van "de Finibus Bonorum et
                        Malorum" door Cicero zijn ook weergegeven in hun exacte originele vorm, vergezeld van engelse
                        versies van de 1914 vertaling door H. Rackham.</p>
                </div>
            </div>
            <div class="row scrum-items d-flex align-items-center">
                <div class="col-6 text-right" id="ssprint">
                    <h1 class="font-weight-bold mb-4">Manage your own sprints</h1>
                    <p>In tegenstelling tot wat algemeen aangenomen wordt is Lorem Ipsum niet zomaar willekeurige tekst.
                        het heeft zijn wortels in een stuk klassieke latijnse literatuur uit 45 v.Chr. en is dus meer
                        dan 2000 jaar oud. Richard McClintock, een professor latijn aan de Hampden-Sydney College in
                        Virginia, heeft één van de meer obscure latijnse woorden, consectetur, uit een Lorem Ipsum
                        passage opgezocht, en heeft tijdens het zoeken naar het woord in de klassieke literatuur de
                        onverdachte bron ontdekt. Lorem Ipsum komt uit de secties 1.10.32 en 1.10.33 van "de Finibus
                        Bonorum et Malorum" (De uitersten van goed en kwaad) door Cicero, geschreven in 45 v.Chr. Dit
                        boek is een verhandeling over de theorie der ethiek, erg populair tijdens de renaissance. De
                        eerste regel van Lorem Ipsum, "Lorem ipsum dolor sit amet..", komt uit een zin in sectie
                        1.10.32.<br>
                        <br>
                        Het standaard stuk van Lorum Ipsum wat sinds de 16e eeuw wordt gebruikt is hieronder, voor wie
                        er interesse in heeft, weergegeven. Secties 1.10.32 en 1.10.33 van "de Finibus Bonorum et
                        Malorum" door Cicero zijn ook weergegeven in hun exacte originele vorm, vergezeld van engelse
                        versies van de 1914 vertaling door H. Rackham.</p>
                </div>
                <div class="col-6">
                    <img class="w-100" src="{{ asset('storage/img/mockup-sprints.png') }}" alt="">
                </div>
            </div>
            <div class="row scrum-items d-flex align-items-center">
                <div class="col-6" id="Backlog">
                    <img class="w-100" src="{{ asset('storage/img/mockup-bli.png') }}" alt="">
                </div>
                <div class="col-6 ">
                    <h1 class="font-weight-bold mb-4">Add your backlog items</h1>
                    <p>In tegenstelling tot wat algemeen aangenomen wordt is Lorem Ipsum niet zomaar willekeurige tekst.
                        het heeft zijn wortels in een stuk klassieke latijnse literatuur uit 45 v.Chr. en is dus meer
                        dan 2000 jaar oud. Richard McClintock, een professor latijn aan de Hampden-Sydney College in
                        Virginia, heeft één van de meer obscure latijnse woorden, consectetur, uit een Lorem Ipsum
                        passage opgezocht, en heeft tijdens het zoeken naar het woord in de klassieke literatuur de
                        onverdachte bron ontdekt. Lorem Ipsum komt uit de secties 1.10.32 en 1.10.33 van "de Finibus
                        Bonorum et Malorum" (De uitersten van goed en kwaad) door Cicero, geschreven in 45 v.Chr. Dit
                        boek is een verhandeling over de theorie der ethiek, erg populair tijdens de renaissance. De
                        eerste regel van Lorem Ipsum, "Lorem ipsum dolor sit amet..", komt uit een zin in sectie
                        1.10.32.<br>
                        <br>
                        Het standaard stuk van Lorum Ipsum wat sinds de 16e eeuw wordt gebruikt is hieronder, voor wie
                        er interesse in heeft, weergegeven. Secties 1.10.32 en 1.10.33 van "de Finibus Bonorum et
                        Malorum" door Cicero zijn ook weergegeven in hun exacte originele vorm, vergezeld van engelse
                        versies van de 1914 vertaling door H. Rackham.</p>
                </div>
            </div>
            <div class="row scrum-items d-flex align-items-center">
                <div class="col-6 text-right" id="retro">
                    <h1 class="font-weight-bold mb-4">Have your own retrospective</h1>
                    <p>In tegenstelling tot wat algemeen aangenomen wordt is Lorem Ipsum niet zomaar willekeurige tekst.
                        het heeft zijn wortels in een stuk klassieke latijnse literatuur uit 45 v.Chr. en is dus meer
                        dan 2000 jaar oud. Richard McClintock, een professor latijn aan de Hampden-Sydney College in
                        Virginia, heeft één van de meer obscure latijnse woorden, consectetur, uit een Lorem Ipsum
                        passage opgezocht, en heeft tijdens het zoeken naar het woord in de klassieke literatuur de
                        onverdachte bron ontdekt. Lorem Ipsum komt uit de secties 1.10.32 en 1.10.33 van "de Finibus
                        Bonorum et Malorum" (De uitersten van goed en kwaad) door Cicero, geschreven in 45 v.Chr. Dit
                        boek is een verhandeling over de theorie der ethiek, erg populair tijdens de renaissance. De
                        eerste regel van Lorem Ipsum, "Lorem ipsum dolor sit amet..", komt uit een zin in sectie
                        1.10.32.<br>
                        <br>
                        Het standaard stuk van Lorum Ipsum wat sinds de 16e eeuw wordt gebruikt is hieronder, voor wie
                        er interesse in heeft, weergegeven. Secties 1.10.32 en 1.10.33 van "de Finibus Bonorum et
                        Malorum" door Cicero zijn ook weergegeven in hun exacte originele vorm, vergezeld van engelse
                        versies van de 1914 vertaling door H. Rackham.</p>
                </div>
                <div class="col-6" id="backlog">
                    <img class="w-100" src="{{ asset('storage/img/mockup-retrospective.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>



@endsection
