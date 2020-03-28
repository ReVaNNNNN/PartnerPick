@extends('layout')
@section('content')
    <h1 class="cover-heading">@lang('draw_pair_content.draw_name')</h1>
    <div class="inner cover">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h4 class="description">@lang('draw_pair_content.add_names'):</h4>
                    <br>
                    <div class="form-group">
                        <label for="name-btn">@lang('draw_pair_content.give_name'):</label>
                            <input type="text" class="form-control" id="name-btn" placeholder="Name" minlength="2" autofocus>
                            <span style="color: indianred" class="name-error">@lang('draw_pair_content.name_too_short').</span>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn-my-primary add-name-btn">@lang('draw_pair_content.button_add')</button>
                            <button class="btn-my-primary draw-btn ">@lang('draw_pair_content.button_draw')</button>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <h4>@lang('draw_pair_content.list_names'): </h4>
                    <br>
                    <ul class="name-list">
                    </ul>
                </div>
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

            //Press enter on name input
            $("#name-btn").keypress(function(event) {
                if (event.keyCode === 13) {
                    $(".add-name-btn").click();
                }
            });

            $('.name-error').hide();
            //Add name
            $('.add-name-btn').click(function (event) {
                event.preventDefault();

                let nameInput = $('#name-btn');
                let listItem = '<li class="name-item">'
                    + nameInput.val()
                    + '</li>'
                    + '<button style="color: crimson" class="close remove-name-btn">'
                    + '<span aria-hidden="true">&times;</span><'
                    + '/button>';

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
                        window.location.replace("{{ route('pair-result') }}" + '?id=' + response);
                    }
                });
            });
        });
    </script>
@endsection
