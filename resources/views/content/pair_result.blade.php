@extends('layout')
@section('content')
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <ul>
            {{-- DANE SA CHYBA POD INNA ZMIENNA PRZEKAZYWANE - ZDEBUGOWAC }}--}}
            {{-- REFACTOR CALEGO ALOGRYTM I PRZEKAZYWANI DANYCH MIEDZY PHP A AJAX
            + CSS SIE NIE ŁADUJĄ W TYM WIDOKU     --}}
            {{--  OSTYLOWANIE WYNIKOW LOSOWANIA --}}
                @foreach($drawResult as $res)
                    <li>{{$res}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
