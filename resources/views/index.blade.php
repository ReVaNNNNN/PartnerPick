@extends('layout')
@section('content')
    <div class="inner cover">
        <h1 class="cover-heading">@lang('index_content.body_title')</h1>
        <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
        <p class="lead">
            <a href="#"
               class="btn btn-lg btn-my-primary"
               data-toggle="tooltip"
               data-placement="bottom"
               title="@lang('index_content.pair_tooltip')">
                @lang('index_content.pair')
            </a>
            <a href="#"
               class="btn btn-lg btn-my-primary"
               data-toggle="tooltip"
               data-placement="bottom"
               title="@lang('index_content.assign_partner_tooltip')">
                @lang('index_content.assign_partner')
            </a>
            <a href="#"
               class="btn btn-lg btn-my-primary"
               data-toggle="tooltip"
               data-placement="bottom"
               title="@lang('index_content.draw_from_list_tooltip')">
                @lang('index_content.draw_from_list')
            </a>
        </p>
    </div>
{{--
   * ostylowanie tooltipa: https://www.w3schools.com/css/css_tooltip.asp
   * zmiana jezyka w menu PL/EN
   * dodać linki do hrefa przycisków
--}}
@endsection
