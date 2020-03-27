@extends('layout')
@section('content')
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <ul>
            {{-- NIEDODAWANIE PLUSA (który jest x'em) DO LOSOWANYCH IMION}}--}}
            {{-- REFACTOR CALEGO ALOGRYTM I PRZEKAZYWANI DANYCH MIEDZY PHP A AJAX
            + CSS SIE NIE ŁADUJĄ W TYM WIDOKU     --}}
            {{--  OSTYLOWANIE WYNIKOW LOSOWANIA --}}
{{--            @php(dd($results))--}}
{{--            @endphp--}}
                @foreach($results as $result)
                    <li>{{$result}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
