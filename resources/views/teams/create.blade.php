@extends('layouts.app')

@section('title', 'Створення команди')

@section('content')
    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__team-setup team-setup">
                @if ($errors->any())
                <div style="color: red; padding: 12px; text-align: center">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('teams.store') }}" method="post" class="team-setup__block _block" enctype="multipart/form-data">
                    @csrf
                    <div class="team-setup__name">
                        <div class="team-setup__label team-setup__label--big">
                            НАЗВА КОМАНДИ
                        </div>
                        <input type="text" placeholder="Назва команди" name="name" class="team-setup__input">
                    </div>
                    <div class="team-setup__logo">
                        <div class="team-setup__image">
                            <img src="{{ asset('img/header/logo.svg') }}" alt="Logo" class="ibg ibg--contain">
                        </div>
                        <label class="team-setup__upload button button--blue upload-btn">
                            <input type="file" name="logo" accept="image/webp, image/jpeg, image/png, image/gif, image/svg+xml" /> 
                            <span>Завантажити ЛОГОТИП</span>
                        </label>
                    </div>
                    <div class="team-setup__footer">
                        <div class="team-setup__field">
                            <div class="team-setup__label">
                                ВИБРАТИ КОЛІР КОМАНДИ
                            </div>
                            <div class="team-setup__colors">
                                @foreach ($colors as $color)
                                    <label style="--color: {{ $color->color_picker }}" class="team-setup__color">
                                        <input type="radio" value="{{ $color->name }}" name="color">
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="team-setup__field">
                            <div class="team-setup__label">
                                ПРОМОКОД
                            </div>
                            <div class="team-setup__code-input input-code">
                                <input type="text" maxlength="1" />
                                <input type="text" maxlength="1" />
                                <input type="text" maxlength="1" />
                                <input type="text" maxlength="1" />
                            </div>
                        </div>
                        <div class="team-setup__field">
                            <div class="team-setup__label">
                                ВНЕСОК: <span>650 ГРН</span>
                            </div>
                            <button type="submit" class="team-setup__pay-button button button--blue">
                                Оплатити внесок
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection