<form action={{route("register.post")}}
method="POST">
@csrf
    <input type="text" name="login" placeholder="логин">
    @if($errors->has('login'))
        <span class="errors">{{$errors->first('login')}}</span>
    @endif
    <input type="text" name="full_name" placeholder="ФИО">
    <input type="tel" name="phone" placeholder="телефон">
    <input type="email" name="email" placeholder="почта">
    <input type="password" name="password" placeholder="пароль">
    <button type="submit">Зарегестрироваться</button>
</form>