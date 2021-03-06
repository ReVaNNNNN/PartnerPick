<div class="masthead clearfix">
    <div class="inner">
        <h3 class="masthead-brand">
            <a href="{{ route('home') }}">{{  config('app.name') }}</a>
        </h3>

        <nav class="nav nav-masthead">
            <a class="nav-link active" href="#">
                @lang('header_nav.start')
            </a>
            <a class="nav-link" href="#">
                @lang('header_nav.draw')
            </a>
            <a class="nav-link" href="#">
                @lang('header_nav.contact')
            </a>
            <a class="nav-link lang {{ setActive('pl', 'lang-active') }}" href="{{ url('locale/pl') }}">
                PL
            </a>
            <a class="nav-link lang {{ setActive('en', 'lang-active') }}" href="{{ url('locale/en') }}">
                EN
            </a>
        </nav>
    </div>
</div>
