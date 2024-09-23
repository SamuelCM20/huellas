<template>
    <div class="row justify-content-center">
        <div class="col-md-3 my-4 user_content">
            <div class="card">
                <div class="card-body text-center">
                    <img :src="user.file.route" alt="Avatar" class="rounded-circle mb-3 shadow-sm"
                        style="height: 150px; width: 150px;">
                    <h5 class="card-title fs-4">{{ user.full_name }}</h5>
                    <p class="card-text">{{ postcount }} publicaciones</p>
                </div>
            </div>
        </div>
        <div class="col-md-7 scrollable-content my-4">
            <div class="card mb-3">
                <div class="card-header text-center">
                    <h1 class="h3">¿Necesitas ayuda para encontrar a tu mascota?</h1>
                    <button class="btn button-success" @click="openModal">¡Publica ahora!</button>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="filtro" class="form-label fs-4">Filtrar por:</label>
                            <input type="text" class="form-control" id="filtro" v-model="filter"
                                placeholder="Ingrese su filtro (tipo de animal ,raza ,color)">
                        </div>
                    </form>
                </div>
            </div>
            <div v-if="filteredPublications.length === 0" class="alert alert-warning">
                No se encontraron publicaciones que coincidan con tu filtro.
            </div>
            <div v-for="publication in filteredPublications" :key="publication.id" class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <img :src="publication.user.file.route" alt="Avatar" class="rounded-circle me-2"
                            style="width: 60px; height: 60px;">
                        <div>
                            <span class="username font-weight-bold fs-5">{{ publication.user.name }}</span>
                            <span class="publication-date text-muted d-block">{{ publication.created_at }}</span>
                        </div>
                        <a href="#" class="ms-auto fs-1 text-danger" v-if="isAdmin(user)" title="Eliminar Publicacion"  @click="deletePublication(publication.id)" >
                            <i class="fa-solid fa-circle-minus"></i>
                        </a>
                        
                    </div>
                    <p class="card-text">{{ publication.description }}</p>
                    <img :src="publication.file && publication.file.route ? publication.file.route : '/storage/images/publications/default.jpeg'"
                        alt="Imagen por defecto" class="publication-img img-fluid mb-4">
                    <p><strong>Tipo animal:</strong> {{ publication.animal_type }} </p>
                    <p><strong>Raza:</strong> {{ publication.breed }}</p>
                    <p><strong>Color:</strong> {{ publication.color }}</p>
                    <p>Para ver la ubicacion en mapa <a href="#" @click="viewCoordinates(publication.id)"
                            class="card-link">haz click aquí</a></p>
                </div>
            </div>
        </div>
        <post-modal ref="post_modal" />
    </div>

</template>


<script>
// import { successMessage } from '../../helpers/Alert';
import postModal from './postModal.vue';
import { successMessage , deleteMessage } from '@/helpers/Alert.js';

export default {
    components: { postModal },
    props: ['publications', 'user', 'postcount'],
    data() {
        return {
            filter: '',
            modal: null,
            post: {}
        };
    },
    computed: {
        filteredPublications() {
            const filterText = this.filter.toLowerCase();
            return this.publications.filter(publication => {
                const animalType = publication.animal_type.toLowerCase();
                const breed = publication.breed.toLowerCase();
                const color = publication.color.toLowerCase();
                return (
                    animalType.includes(filterText) ||
                    breed.includes(filterText) ||
                    color.includes(filterText)
                );
            });
        }
    },
    mounted() {
        this.index();
    },
    methods: {
        async index() {
            const modal_id = document.getElementById('post_modal')
            this.modal = new bootstrap.Modal(modal_id)
            modal_id.addEventListener('hidden.bs.modal', e => {
                this.$refs.post_modal.reset()
            })
            modal_id.addEventListener('show.bs.modal', e => {
                this.$refs.post_modal.initMap()
            })
        },
        isAdmin(user) {
            return user.roles.some(role => role.name === 'admin');
        },
        getUserRole(user) {
            return user.roles.length ? user.roles[0].name : 'Sin Rol';
        },
        openModal() {
            this.modal.show()
        },
        async viewCoordinates(id) {
            // console.log('viewCoordinates to publication number: ' + id)
            try {
                window.location.href = `coordinates/${id}`;
            } catch (error) {
                console.error('Error al obtener coordenadas:', error);
            }
        },
        async deletePublication(postId) {
			if (!await deleteMessage()) return
			try {
				await axios.delete(`/publications/${postId}`)
				await successMessage({ is_delete: true, reload: true })
				window.location.reload()
			} catch (error) {
				console.error('Error eliminando la publicación:', error);
			}
		},
    }
};
</script>
<style scoped>
.scrollable-content {
    max-height: 100vh;
    overflow-y: auto;
}
</style>