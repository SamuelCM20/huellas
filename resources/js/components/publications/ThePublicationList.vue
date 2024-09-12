<template>
    <div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <img src="" alt="Avatar" class="rounded-circle mb-3">
                <h5 class="card-title">Fulanito Fernandez</h5>
                <p class="card-text">0 Publicaciones</p>
            </div>
        </div>
    </div>
    <div class="col-md-7 scrollable-content">
        <div class="card mb-3">
            <div class="card-header text-center">
                <h1 class="h3">¿Necesitas ayuda para encontrar a tu mascota?</h1>
                <button class="btn btn-primary" @click="openModal">¡Publica ahora!</button>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="filtro" class="form-label">Filtrar por:</label>
                        <input type="text" class="form-control" id="filtro" placeholder="Ingrese su filtro">
                    </div>
                </form>
            </div>
        </div>
        <div v-for="publication in publications" :key="publication.id" class="card mb-3">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <img :src="publication.user.file.route" alt="Avatar" class="rounded-circle me-2"
                        style="width: 60px; height: 60px;">
                    <div>
                        <span class="username font-weight-bold fs-5">{{ publication.user.name }}</span>
                        <span class="publication-date text-muted d-block">{{ publication.created_at }}</span>
                    </div>
                </div>
                <p class="card-text">{{ publication.description }}</p>
                <img :src="publication.file && publication.file.route ? publication.file.route : '/storage/images/publications/default.jpeg'" alt="Imagen por defecto" class="img-fluid mb-4">
                <p><strong>Tipo animal:</strong> {{ publication.animal_type }} </p>
                <p><strong>Raza:</strong>  {{ publication.breed }}</p>
                <p><strong>Color:</strong> {{ publication.color }}</p>
                <p>Para ver la ubicacion en mapa <a href="#" @click="viewCoordinates(publication.id)" class="card-link">haz click aquí</a></p> 
            </div>
        </div>
    </div>
    <post-modal ref="post_modal"/>
</div>

</template>


<script>
import { successMessage } from '../../helpers/Alert';
import postModal from './postModal.vue';
import { deleteMessage } from '@/helpers/Alert.js';

export default {
    components: {postModal},
    props: ['publications'],
    data() {
        return {
            modal: null,
            post: {}
        };
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
        openModal() {
			this.modal.show()
		},
        async viewCoordinates(id){
            // console.log('viewCoordinates to publication number: ' + id)
            try {
                window.location.href = `coordinates/${id}`;
            } catch (error) {
                console.error('Error al obtener coordenadas:', error);
            }
        }
    }
};
</script>
<style scoped>
.scrollable-content {
  max-height: 600px;
  overflow-y: auto;
}
</style>