<template>
	<div class="container my-5">
		<div class="row justify-content-center">
			<!-- Tarjeta de perfil -->
			<div class="col-lg-5 mb-4">
				<div class="card text-center">
					<div class="card-body p-4"> <!-- Espaciado ajustado en la tarjeta de perfil -->
						<img :src="users.file.route" alt="Foto de perfil"
							class="rounded-circle img-fluid mb-3" style="height: 80px; width: 80px;">
						<h2 class="card-title">{{ users.full_name }}</h2>
						<hr> <!-- Línea horizontal debajo del nombre -->
						<h5 class="text-start">Información Básica</h5>
						<div class="text-start mt-3">
							<p><strong>Cédula:</strong> {{users.number_id}}</p>
							<p><strong>Dirección:</strong>{{ users.address }}</p>
							<p><strong>Celular:</strong> {{ users.phone }}</p>
							<p><strong>Correo Electrónico:</strong> {{ users.email }}</p>
						</div>
						<button type="button" class="btn btn-warning mt-3" @click="editInfo(users)">Editar Perfil</button>
					</div>
				</div>
			</div>

			<!-- Tarjeta de publicaciones -->
			<div class="col-lg-5 mb-4">
				<div class="card">
					<div class="card-body p-4">
						<h3 class="card-title">Mis publicaciones</h3>
						<!-- Contenedor con scroll -->
						<div class="overflow-auto" style="height: 400px; max-height: 400px;">
							<div v-for="p in post" :key="p.id"
								class="d-flex align-items-center p-3 bg-white rounded shadow-sm mb-3">
								<img :src="p.file.route" class="rounded img-fluid me-3"
									style="height: 40px; width: 40px;">
								<div class="flex-grow-1">
									<p class="mb-0"><strong>{{ p.user.name }} <span class="text-muted">{{ p.created_at
												}}</span></strong></p>
									<p class="text-muted mb-0" style="font-size: 1.1rem;">{{ truncateText(p.description,
										40) }}
									</p>
								</div>
								<div class="text-success fs-3">
									<button class="btn btn-danger" title="Borrar publicación"
										@click="confirmDelete(p.id)">
										<i class="fas fa-trash"></i>
									</button>
								</div>
							</div>
							<!-- Repite esta estructura si hay más publicaciones -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<profile-modal ref="profile_modal" :user_data = "user"/>
	</div>
</template>
<script>
import { post } from 'jquery';
import { successMessage } from '../../helpers/Alert';
import ProfileModal from './ProfileModal.vue';
import { deleteMessage } from '@/helpers/Alert.js'



export default {
	components: {
		ProfileModal
	},
	props: ['users', 'post'],
	data() {
		return {
			user: {},
			modal: null
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			const modal_id = document.getElementById('profile_modal')
			this.modal = new bootstrap.Modal(modal_id)
			modal_id.addEventListener('hidden.bs.modal', e => {
				 this.$refs.profile_modal.reset()				
			})
		},
		editInfo(user) {
            this.user = user
            this.openModal()
		},
		async confirmDelete(postId) {
			if (!await deleteMessage()) return
			try {
				await axios.delete(`/publications/${postId}`)
				this.deleteCoordinates(postId)
				await successMessage({ is_delete: true, reload: true })
				window.location.reload()
			} catch (error) {
				console.error('Error eliminando la publicación:', error);
			}
		},
		async deleteCoordinates(postId) {
			await axios.delete(`/coordinates/${postId}`);
			console.log('deleting coordinates')
		},
		truncateText(text, length) {
			if (text.length > length) {
				return text.substring(0, length) + '...';
			}
			return text;
		},
		openModal() {
			this.modal.show()
		},
	}
}
</script>