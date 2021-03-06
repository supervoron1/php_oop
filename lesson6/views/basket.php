<h2>Корзина</h2>
<hr>
<? foreach ($products as $item): ?>
    <div id="<?= $item['id_basket'] ?>">
        <h2><?= $item['name'] ?></h2>
        <p>Описание: <?= $item['description'] ?></p>
        <p>Цена:<?= $item['price'] ?></p>
        <button data-id="<?= $item['id_basket'] ?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>

<script>
  //TODO реализовать удаление из корзины асинхпронно - DONE
  let buttons = document.querySelectorAll('.delete');
  buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
      let id = elem.getAttribute('data-id');
      (
        async () => {
          const response = await fetch('/basket/DeleteFromBasket/', {
            method: 'POST',
            headers: new Headers({
              'Content-Type': 'application/json'
            }),
            body: JSON.stringify({
              id: id
            })
          });
          const answer = await response.json();
          document.getElementById('count').innerText = answer.count;
          document.getElementById(id).remove();
          console.log(answer);
        }
      )();
    })
  });
</script>
</script>
