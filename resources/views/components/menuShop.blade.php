<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <!-- Search bar -->
      <form class="d-flex flex-grow-1">
        <input class="form-control w-50" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-secondary " type="submit">
          <i class="fa-solid fa-search"></i>
        </button>
      </form>
      <!-- Cart Icon -->
      <div class="navbar-nav">
        <a class="nav-link" href="{{route('products.cart')}}" title="Ir al carrito">
          <i class="fa-solid fa-cart-shopping fs-2"> </i>
        </a>
      </div>
    </div>
  </nav>