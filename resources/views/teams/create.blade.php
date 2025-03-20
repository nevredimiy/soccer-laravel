@extends('layouts.app')

@section('title', 'Створення команди')

@section('content')
    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__team-setup team-setup">
                <div class="team-setup__block _block">
                    <div class="team-setup__name">
                        <div class="team-setup__label team-setup__label--big">
                            НАЗВА КОМАНДИ
                        </div>
                        <input type="text" value="Назва команди" name="name" class="team-setup__input">
                    </div>
                    <div class="team-setup__logo">
                        <div class="team-setup__image">
                            <img src="{{ asset('img/header/logo.svg') }}" alt="Logo" class="ibg ibg--contain">
                        </div>
                        <label class="team-setup__upload button button--blue upload-btn">
                            <input type="file" name="logo" accept="image.webp, image.webp, image/svg+xml" />
                            <span>Завантажити ЛОГОТИП</span>
                        </label>
                    </div>
                    <div class="team-setup__footer">
                        <div class="team-setup__field">
                            <div class="team-setup__label">
                                ВИБРАТИ КОЛІР КОМАНДИ
                            </div>
                            <div class="team-setup__colors">
                                <label style="--color: #8593a0" class="team-setup__color">
                                    <input disabled type="radio" name="team-color">
                                </label>
                                <label style="--color: #FF3B3B" class="team-setup__color">
                                    <input type="radio" name="team-color">
                                </label>
                                <label style="--color: #59C65D" class="team-setup__color">
                                    <input type="radio" name="team-color">
                                </label>
                                <label style="--color: #1B5BA2" class="team-setup__color">
                                    <input disabled type="radio" name="team-color">
                                </label>
                                <label style="--color: #F7E10E" class="team-setup__color">
                                    <input disabled type="radio" name="team-color">
                                </label>
                                <label style="--color: #FF7F27" class="team-setup__color">
                                    <input type="radio" name="team-color">
                                </label>
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
                            <button type="button" class="team-setup__pay-button button button--blue">
                                Оплатити внесок
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection