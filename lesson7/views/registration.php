<form action="/registration/AddUser/" method="post" class="formRegister">
    <input type='text' name='login' placeholder='Логин' require id="login">
    <input type='password' name='pass' placeholder='Пароль' require id="pass">
    <input type='email' name='email' placeholder='Почта' id="email">
    <input type='tel' name='tel' placeholder='Телефон' id="tel">
    <input type='button' name='send' value="Зарегистрироваться" class="register">
</form>

<div class="infoMessage"></div>

<script>
  let button = document.querySelector('.register');
  button.addEventListener('click', async () => {
    let login = document.getElementById('login').value;
    let password = document.getElementById('pass').value;
    let email = document.getElementById('email').value;
    let tel = document.getElementById('tel').value;

    let data = {login, password, email, tel};
    (
      async () => {
        const response = await fetch('/registration/AddUser/', {
          method: 'POST',
          headers: new Headers({
            'Content-Type': 'application/json'
          }),
          body: JSON.stringify(data)
        });
        const answer = await response.json();
        console.log(answer);
        document.querySelector('.infoMessage').innerText = answer.message;
        document.querySelector('.formRegister').remove();
      }
    )();
  });
</script>
