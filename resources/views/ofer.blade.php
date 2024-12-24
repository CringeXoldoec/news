<form action="{{ route('ofer.post') }}" method="POST">

    @csrf
    <input type="text" name="cource" placeholder="курс">
    <input type="date" name="date" placeholder="дата">
    <select name="payment_metod">
        <option value="card">Картой</option>
        <option value="cash">Наличкой</option>
    </select>
    <button type="submit">Отправить</button>
</form>

<a href="{{ route('shows') }}">Посмотреть</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <button>Выход</button>
</form>


