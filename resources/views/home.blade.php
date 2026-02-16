@extends('layout')
@section('title','Главная')
@section('content')
    <div class="tc-card p-4 mb-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h1 class="h3 mb-2">TransportCompany</h1>
                <p class="text-secondary mb-0">
                    Наша компания представляет клиентам возможность оформлять для себя и близких: рейсы, маршруты, транспорт и грузы.
                </p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-tc" href="{{ url('/trips/create') }}">Оформить рейс</a>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="tc-card h-100 overflow-hidden">
                <img src="{{ asset('img/1.jpg') }}" class="w-100" style="height:190px;object-fit:cover;" alt="Автопарк">
                <div class="p-3">
                    <div class="fw-semibold">Автопарк</div>
                    <div class="text-secondary small">Современные тягачи и фуры для междугородних перевозок.</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="tc-card h-100 overflow-hidden">
                <img src="{{ asset('img/2.jpg') }}" class="w-100" style="height:190px;object-fit:cover;" alt="Логистика">
                <div class="p-3">
                    <div class="fw-semibold">Логистика</div>
                    <div class="text-secondary small">Планирование маршрутов и контроль сроков отправления/прибытия.</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="tc-card h-100 overflow-hidden">
                <img src="{{ asset('img/3.jpg') }}" class="w-100" style="height:190px;object-fit:cover;" alt="Бренд">
                <div class="p-3">
                    <div class="fw-semibold">Доставка грузов</div>
                    <div class="text-secondary small">Учёт грузов по рейсам и заказчикам (отправителям).</div>
                </div>
            </div>
        </div>
    </div>
    <div class="tc-card p-4">
        <h2 class="h5 mb-3">О транспортной компании</h2>
        <div class="row g-3">
            <div class="col-12 col-lg-8">
                <p class="text-secondary mb-3">
                    Система предназначена для ведения рейсов: выбор маршрута, назначение транспорта,
                    фиксация времени отправления и прибытия, а также учёт перевозимых грузов.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge rounded-pill" style="background:#151a21;border:1px solid #2a3038;color:#ffb25a;">Маршруты</span>
                    <span class="badge rounded-pill" style="background:#151a21;border:1px solid #2a3038;color:#ffb25a;">Транспорт</span>
                    <span class="badge rounded-pill" style="background:#151a21;border:1px solid #2a3038;color:#ffb25a;">Рейсы</span>
                    <span class="badge rounded-pill" style="background:#151a21;border:1px solid #2a3038;color:#ffb25a;">Грузы</span>
                </div>
            </div>
        </div>
    </div>
@endsection
