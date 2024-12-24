<form action={{route('login.post')}}
method="POST">
    @csrf
    <input type="tel" name="phone" placeholder="телефон">
    @if($errors->has('phone'))
        <span class="errors">{{$errors->first('phone')}}</span>
    @endif
    <input type="password" name="password" placeholder="пароль">
    @if($errors->has('password'))
        <span class="errors">{{$errors->first('password')}}</span>
    @endif
    <button type="submit">Войти</button>
</form>