@extends('layout')
@section('content')
    <h1 class="cover-heading">PAIR</h1>
    <div class="inner cover">
        {{--  Dodanie selecta z wyborem sposobu wyświetalania wyników ?    - panel boczny ?      --}}
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h4 class="description">Add names:</h4>
                    <br>
                    <div class="form-group">
                        <label for="name-btn">Give name to draw:</label>
                            <input type="text" class="form-control" id="name-btn" placeholder="Name" minlength="2">
                            <span style="color: indianred" class="name-error">Name should cantain at least 2 letter.</span>
                    </div>
                    <button class="btn-my-primary add-name-btn">Add</button>
                    <br>
                </div>
                <div class="col-4">
                    <h4>Names: </h4>
                    <br>
                    <ul class="name-list">
                    </ul>
                </div>
            </div>
            <div class="row">
                <label>
                    <input type="radio" name="print-type" value="show-all"> Show All Result
                </label>
                <label>
                    <input type="radio" name="print-type" value="one-by-one"> Show one by one
                </label>
            </div>
            <div class="row">
                <button class="btn-my-primary draw-btn">Draw</button>
            </div>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.name-error').hide();
            //Add name
            $('.add-name-btn').click(function (event) {
                event.preventDefault();

                let nameInput = $('#name-btn');
                let listItem = '<li class="name-item">' + nameInput.val() + '<button style="background-color: crimson" class="btn-secondary remove-name-btn">x</button></li>';
                let errorText = $('.name-error');

                //Validation
                if (nameInput.val().length < 2) {
                    nameInput.css({
                        border: 'solid 2px indianred'
                    });

                    errorText.show();
                    return;
                }

                nameInput.val("");
                $('.name-list').append(listItem);

                errorText.hide();
                nameInput.css({
                    border: 'none'
                });

                //Remove name
                $('.remove-name-btn').click(function () {
                    $(this).parent().remove();
                });
            });

            collectData = function() {
                names = [];

                $('.name-item').each(function () {
                    names.push($(this).text());
                });
                return names;
            };

            //Send data form
            $('.draw-btn').click(function () {
                let names = collectData();

                $.ajax({
                    url: "{{ route('pair-draw') }}",
                    type: "POST",
                    data: {
                        names: names,
                    },
                    success: function (response) {
                        console.log('Sukces');
                    }
                });
            });
        });
    </script>
@endsection
