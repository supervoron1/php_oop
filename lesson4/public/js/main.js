document.addEventListener('click',  async (e) => {
  async function responseAPI (action, data) {
    let response = await fetch(`${action}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    return response.json();
  }

  /**
   * Открывается каталог по 4 штуки товаров по нажатию
   */

  if (e.target.classList[0] === "also") {
    e.preventDefault();
    let items = document.querySelectorAll(".card").length;
    //console.log(items);
    let data = {items};
    let result = await responseAPI("/product/ApiCatalog", data);
    let catalog = document.querySelector(".catalog");
    catalog.innerHTML = "";

    result.forEach(item => {
      catalog.insertAdjacentHTML('beforeend', `<div class="card mb-3" style="width: 15rem;">
      <div class="card-body text-center p-3">
      <a href="/product/item/${item.id}">
      <h5 class="card-title">${item.name}</h5>
    <img id="<?= $item['id'] ?>" src="/img/${item.image}"
  class="card-img-top" alt="img"></a>
      <h5 class="card-subtitle mb-3">Цена: ${item.price}</h5>
    <a href="#" class="btn btn-primary">Купить</a>
      </div>
      </div>`);
    });
  }

  /**
   * Добавление товаров в корзину
   */

  if (e.target.classList[0] === "buy") {
    e.preventDefault();
    let id = e.target.id;
    let data = {id};
    console.log(data);
    let result = await responseAPI("/basket/ApiAdd",data);
    console.log(result);
    //document.getElementById('counter').innerHTML = result;
  }
});
