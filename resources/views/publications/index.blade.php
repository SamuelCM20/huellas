<x-app title="Tienda electronica | home">

    <section class="ContainerPrimary h-100 p-5">
        <The-Publication-List :publications="{{ $publications }}" :user="{{ $user }}" :postcount="{{ $postCount}}" />
    </section>
</x-app>