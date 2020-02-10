<?if ($auth):?>
    <p>Добро пожаловать <?=$username?> <a href="/auth/logout/"> [Выход]</a></p>
<?else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="submit" value="Войти">
    </form>

    <p>Еще не зарегистрированы? <a href="/registration/">Зарегистрироваться</a></p>
<?endif;?><br>
<div class="top-menu">
<a href="/" class="btn">Главная</a>
<a href="/product/catalog/" class="btn">Каталог</a>
<a href="/basket/" class="btn bask">Корзина <span id="count"><?=$count?></span></a>
<? if ($is_admin): ?>
    <a class="btn" href="/orders/" class="menu-link">Заказы</a>
<? endif; ?>
</div>
<br>
