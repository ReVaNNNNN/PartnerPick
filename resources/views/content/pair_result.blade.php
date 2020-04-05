@extends('layout')
@section('content')
    <link rel="stylesheet" href="../css/app.css"/>
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <ul>
            {{--  OSTYLOWANIE WYNIKOW LOSOWANIA --}}
{{--                    Wyświetlanie błędów z PHP w HTML--}}
{{--                    Poprawienie wyglądu strony głownej i algorytmu losowania--}}
{{--                    dodanie brakujących tłumaczeń --}}

            <?php //dd($results)
            ?>
{{--                    @php var_dump($results)--}}
{{--                    @endphp--}}
                @foreach($results as $result)
                        <li>{{key($result)}}</li>
                        <li>{{$result[key($result)]}}</li>
{{--                        //podczas trzymania buttona pokaż przypisaną mu osobę--}}
                        <br>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
