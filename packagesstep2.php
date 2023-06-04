<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Stationery Shop Supplies List</title>
    <link rel="stylesheet" href="style.css">
  </head>

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

main {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

section.supplies-list {
  margin-bottom: 50px;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

li {
  margin: 0 0 20px 0;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  position: relative;
}

h3 {
  margin: 0 0 10px 0;
}

.price {
  position: absolute;
  top: 20px;
  right: 20px;
  font-weight: bold;
}

</style>

  <body>
    <main>
      <section class="supplies-list">
        <h2>Supply List</h2>
        <ul>
          <li>
            <h3><img src="..." class="img-thumbnail" alt="..."> Ballpoint Pens</h3>
            <p>Black ink, pack of 12</p>
            <p class="price">400 EGP</p>
          </li>
          <li>
            <h3><img src="..." class="img-thumbnail" alt="..."> Highlighters</h3>
            <p>Assorted colors, pack of 6</p>
            <p class="price">350 EGP</p>
          </li>
          <li>
            <h3><img src="..." class="img-thumbnail" alt="..."> Notebooks</h3>
            <p>Wide-ruled, 80 sheets</p>
            <p class="price">1000 EGP</p>
          </li>
          <li>
            <h3><img src="..." class="img-thumbnail" alt="..."> Stapler</h3>
            <p>Includes 1000 staples</p>
            <p class="price">760 EGP</p>
          </li>
        </ul>
      </section>
    </main>
  </body>
</html>