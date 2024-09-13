<x-app title="Tienda electronica | home">

    <section class="publicationsContainer h-100">
        <The-Publication-List :publications="{{ $publications }}" :user="{{ $user }}" :postcount="{{ $postCount}}" />
    </section>
</x-app>