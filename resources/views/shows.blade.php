@if($requests->count() == 0)
    <p>У вас нет активных заявок</p>
@else
    <h2>Ваши заявки</h2>
    @foreach ($requests as $request)
        <div class="request-item">
            <p>Курс: {{$request->cource}}</p>
            <p>Дата: {{$request->date}}</p>
            <p>Способ оплаты: {{$request->payment_metod}}</p>
        </div>
    @endforeach
@endif