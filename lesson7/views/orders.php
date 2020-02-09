<? if ($isAdmin): ?>
<h2>Заказы</h2>
<?//=var_dump($orders)?>
    <table border="1" cellpadding="4" cellspacing="1">
        <tr style="background-color:beige; text-align: center">
            <td width="5%">Номер</td>
            <td width="20%">Логин</td>
            <td width="20%">Телефон</td>
            <td width="45%">Адрес</td>
            <td width="10%">Статус</td>
        </tr>
			<? foreach ($orders as $order): ?>
          <tr style="text-align: start">
              <td width="5%" align="center">
                  <a href="/orders/order/?id=<?= $order['id'] ?>" id="<?= $order['id'] ?>"><?= $order['id'] ?> ...</a></td>
              <td width="20%"><?= $order['login'] ?></td>
              <td width="20%"><?= $order['tel'] ?></td>
              <td width="45%"><?= $order['email'] ?></td>
              <td width="10%"><?= $order['order_status_id'] ?></td>
          </tr>
			<? endforeach; ?>
    </table>
<? else: ?>
	Restricted area. Authorized personnel only
<? endif; ?>
