@extends('layout')
@section('content')
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <ul>
            {{-- REFACTOR CALEGO ALOGRYTM I PRZEKAZYWANI DANYCH MIEDZY PHP A AJAX
            X zle ostylowany w liście imion
            + CSS SIE NIE ŁADUJĄ W TYM WIDOKU     --}}
            {{--  OSTYLOWANIE WYNIKOW LOSOWANIA --}}
            <?php //dd($results)
            ?>
{{--                    @php var_dump($results)--}}
{{--                    @endphp--}}
                @foreach($results as $result)
                        <li>{{key($result)}}</li>
                        <li>{{$result[key($result)]}}</li>
                        <br>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
