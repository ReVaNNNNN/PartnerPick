@extends('layout')
@section('content')
    <div class="inner cover">
        <h1 class="cover-heading">PAIR</h1>
        <h3 class="description">Add names:</h3>
        {{--  Dodanie selecta z wyborem sposobu wyświetalania wyników ?    - panel boczny ?      --}}
        <form>
            <div class="form-group">
{{--                <label for="formGroupExampleInput">Example label</label>--}}
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name">
                {{--       Przycisk usuwający osobę z listy         --}}
                <button style="background-color: crimson" class="btn-secondary">X</button>
            </div>
            {{-- po kliknieciu dodaj kolejnego inputa oraz dodaj do listy Imięc   --}}
            <button class="btn-my-primary">Add</button>
            <br>
            {{--            Rozpoczecie losowania--}}
            <button class="btn-secondary">Draw</button>
        </form>
    </div>
@endsection
