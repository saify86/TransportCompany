@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background:#07090c;border-bottom:1px solid #2a3038;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="color:#ff8a00;">TransportCompany</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navTC">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navTC">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/trips') }}">Рейсы</a></li>
            </ul>
            @if(!Auth::user())
            @else
                <div class="d-flex align-items-center gap-3">
                    <span class="text-secondary">👤 {{ Auth::user()->name }}</span>
                    <a class="btn btn-sm btn-outline-tc" href="{{ route('logout') }}">Выйти</a>
                </div>
            @endif
        </div>
    </div>
</nav>

