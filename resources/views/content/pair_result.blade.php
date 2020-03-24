@extends('layout')
@section('content')
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <ul>
{{--            DANE SIĘ TO NIE PRZEKAZUJA Z METO RESULT()   + CSS SIE NIE ŁADUJĄ W TYM WIDOKU     --}}
                @foreach($drawResult as $res)
                    <li>{{$res}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection