<form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Название команды</label>
        <input type="text" name="name" id="name" required>
    </div>
    
    <div>
        <label for="logo">Логотип</label>
        <input type="file" name="logo" id="logo">
    </div>

    <div>
        <label for="color">Цвет команды</label>
        <select name="color" id="color">
            <option value="">Выберите цвет</option>
            @foreach($colors as $color)
                <option value="{{ $color->name }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="promo_code">Промокод</label>
        <input type="text" name="promo_code" id="promo_code">
    </div>

    <button type="submit">Создать команду</button>
</form>
