
   <?php include "./components/header.html"?>

  <link rel="stylesheet" href="./assets/carro/carrito.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <style>
      p {
        margin: 0 !important;
      }
    </style>
    <main>
      <section class="cart-header">
        <img src="./assets/carro/titulocarrito.png" alt="Título Carrito" />
      </section>
      <section class="cart-body">
        <div class="cart-products-header">
          <p>Productos en el carrito:</p>
          <div class="cart-products-list">
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
            <div class="cart-item">
              <div class="cart-item-remove">
                <img src="./assets/carro/cruzlol.png" alt="Eliminar Producto" />
              </div>
              <p class="cart-item-name">Gorra SKIBIDI</p>
              <div class="cart-item-quantity">
                <p>Cantidad:</p>
                <input
                  type="text"
                  pattern="\d*"
                  inputmode="numeric"
                  class="cart-item-quantity-input"
                />
              </div>
              <p class="cart-item-total">Total: <span>$260.611</span></p>
            </div>
          </div>
          <button class="cart-clear-button">Vaciar carrito</button>
        </div>

        <div class="cart-summary">
          <p>Precios unitarios</p>
          <div class="cart-summary-price">
            <p>$260.611 Gorra SKIBIDI</p>
            <p>$260.611 Gorra SKIBIDI</p>
            <p>$260.611 Gorra SKIBIDI</p>
          </div>
          <div class="cart-summary-details">
            <p><span>Total a pagar: </span> <span> $34.800</span></p>
            <button>
              <p>Proceder con la compra</p>
              <div class="icon-button"><img src="./assets/carro/pagar.png" /></div>
            </button>
          </div>
        </div>
      </section>
    </main>
  </body>
  <script>
    document
      .querySelectorAll(".cart-item-quantity-input")
      .forEach(function (input) {
        input.addEventListener("input", function (event) {
          this.value = this.value.replace(/\D/g, "");
        });
      });   
        function adjustMainMargin() {
            const headerHeight = document.querySelector('header').offsetHeight;
            document.querySelector('main').style.paddingTop = headerHeight + 'px';
        }

        adjustMainMargin();

  
        const resizeObserver = new ResizeObserver(adjustMainMargin);

    
        resizeObserver.observe(header);
  </script>
</html>
