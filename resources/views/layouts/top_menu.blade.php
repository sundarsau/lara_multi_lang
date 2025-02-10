<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">Website Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{__('site.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('languages.index')}}">{{__('site.maintain_lang')}}</a>
                </li>
            </ul>
            <!-- dropdown for the languages -->
            <div class="pull-right">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ $cLang->name ?? ''}}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($otherLangs as $lang)
                            <li><a class="dropdown-item" href="{{ route('setlocale',['locale' => $lang->code]) }}">{{ $lang->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>