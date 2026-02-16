@if ($errors->any())
    <div class="alert alert-danger tc-card">
        <div class="fw-bold mb-1">Ошибки:</div>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('ok'))
    <div class="alert alert-success tc-card">{{ session('ok') }}</div>
@endif
@if(session('message'))
    <div class="alert alert-warning tc-card">{{ session('message') }}</div>
@endif
