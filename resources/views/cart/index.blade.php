<x-app title="Carrito">
	<div class="products_container">

        <cart :user = "{{ Auth::user() }}"/>
    </div>
	
</x-app>
