<template>
    <!-- Modal -->
    <div class="modal fade" id="profile_modal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Modal centrado y responsive -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
        				<backend-error :errors="back_errors"/>

                    <!-- Imagen circular con input para subir imagen -->
                    <div class="d-flex justify-content-center mb-4">
                        <div class="position-relative">
                            <img :src="image_preview"
                                alt="Foto de perfil" class="rounded-circle img-fluid"
                                style="width: 100px; height: 100px;">
                            <label for="file" title="Cambiar foto de perfil"
                                class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-1"
                                style="cursor: pointer;">
                                <i class="fas fa-camera text-white"></i>
                                <input type="file" id="file" class="d-none"  @change="previewImage">
                            </label>
                        </div>
                    </div>

                    <!-- Formulario para editar información -->
                    <Form ref="Form" :validation-schema="schema" @submit="saveUser">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <Field name="name" v-slot="{ errorMessage, field}" v-model="user.name">
                                <input type="text" v-model="user.name" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" id="name" v-bind="field" placeholder="Nombre">
                                <span class="invalid-feedback">{{errorMessage}}</span>
								<span class="invalid-feedback">{{ back_errors['name'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <Field name="last_name" v-slot="{ errorMessage, field}" v-model="user.last_name">
                            <input type="text" v-model="user.last_name" id="last_name" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" placeholder="Apellido">
                            <span class="invalid-feedback">{{errorMessage}}</span>
							<span class="invalid-feedback">{{ back_errors['last_name'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <Field name="address" v-slot="{ errorMessage, field}" v-model="user.address">
                                <input type="text" id="address"v-model="user.address" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" placeholder="Dirección">
                                <span class="invalid-feedback">{{errorMessage}}</span>
                                <span class="invalid-feedback">{{ back_errors['address'] }}</span>    
                            </Field>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Celular</label>
                            <Field name="phone" v-slot="{ errorMessage, field}" v-model="user.phone">
									<input type="number" id="phone" v-model="user.phone" :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field">
									<span class="invalid-feedback">{{errorMessage}}</span>
									<span class="invalid-feedback">{{ back_errors['phone'] }}</span>
							</Field>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                    </Form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import { Field, Form } from 'vee-validate'
import * as yup from 'yup'
import { successMessage, handlerErrors,imagenNoValida } from '@/helpers/Alert.js'
import BackendError from '../Components/BackendError.vue'

export default {
    props: ['user_data'],
    components: { Field, Form },
    watch: {
        user_data(new_value) {
            this.user = { ...new_value } //almacenar el objeto en otra parte de la memoria y no reemplazarla
            if (!this.user.id) return
            this.image_preview = this.user.file.route
        }
    },
    computed: {
        schema() {
            return yup.object({
                name: yup.string('el nombre debe ser una cadena de texto valida').required('el nombre es requerido').max(50,"El nombre no debe exceder los 50 caracteres"),
                last_name: yup.string('el apellido debe ser una cadena de texto valida').required('el apellido es requerido').max(50,"El apellido no debe exceder los 50 caracteres"),
                phone: yup.number('el telefono solo debe contener numeros').required('el numero celular es requerido').typeError('El numero de celular debe ser un número válido para colombia.'),
                address: yup.string('la direccion debe ser una cadena de texto valida').required('la dirección es requerido').max(100,"La dirección no debe exceder los 50 caracteres"),
            });
        },
    },
    data() {
        return {
            user: {},
            back_errors: {},
            file: null,
            image_preview: ''
        }
    },
    created() {
        this.index()
    },

    methods: {
        index() { },
        previewImage(event) {
            const file = event.target.files[0];

			const maxSize = 5 * 1024 * 1024; // 2 MB
			if (file && file.size > maxSize) {
				imagenNoValida()
				this.file = null; // Reiniciar el archivo si no es válido
				this.image_preview = '/storage/images/users/default.png'; // Reiniciar la imagen previa
				event.target.value = ''; // Limpiar el input
				return;
			}

			this.file = file;
			this.image_preview = URL.createObjectURL(file);
        },
        async saveUser() {
            try {
                const user = this.createFormData(this.user)
                await axios.post(`/users/update/${this.user.id}`, user)
                await successMessage({ reload: true })
            } catch (error) {
                this.back_errors = await handlerErrors(error)
            }
        },
        createFormData(data) {
            const form_data = new FormData()
            if (this.file) form_data.append('file', this.file, this.file.name)
            form_data.append('name', this.user.name)
            for (const prop in data) {
                form_data.append(prop, data[prop])

            }
            return form_data
        },

        reset() {
            this.user = {}
            this.$parent.user = {}
            this.back_errors
            this.file = null
            setTimeout(() => this.$refs.Form.resetForm(), 100)
        }


    }
}
</script>