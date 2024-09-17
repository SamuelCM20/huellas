<x-app title="{{$product->name}}">
    <section>
        <div class="products_container">

            <show-product :product ="{{ $product }}" :session="{{ $session }}" user="{{ Auth::user() }}" />
            
        </div>
    </section>
</x-app>
