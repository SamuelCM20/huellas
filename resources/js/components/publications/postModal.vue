<template>
    <div class="modal fade" id="post_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crea una publicacion</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Errorers backend -->
                <backend-error :errors="back_errors" />

                <div class="modal-body">
                    <Form ref="Form" :validation-schema="schema" @submit="savePost">
                        <div class="mb-3">
                            <!-- informacion -->
                            <label for="description" class="form-label">Información</label>
                            <Field name="description" v-slot="{ errorMessage, field }" v-model="post.description">
                                <textarea id="description" v-model="post.description"
                                    :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field" rows="3"
                                    placeholder="Brinda información especifica de tu mascota"></textarea>
                                <span class="invalid-feedback">{{ errorMessage }}</span>
                                <span class="invalid-feedback">{{ back_errors['description'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <!-- tipo de animal -->
                            <label for="animal_type" class="form-label">Tipo de Animal</label>
                            <Field name="animal_type" v-slot="{ errorMessage, field }" v-model="post.animal_type">
                                <select id="animal_type" :class="`form-select ${errorMessage ? 'is-invalid' : ''}`"
                                    v-bind="field">
                                    <option value="" disabled selected>Selecciona un tipo de animal</option>
                                    <option value="Perro">Perro</option>
                                    <option value="Gato">Gato</option>
                                    <option value="Pájaro">Pájaro</option>
                                    <option value="Reptil">Reptil</option>  
                                    <option value="Conejo">Conejo</option>
                                    <option value="Hurón">Hurón</option>
                                    <option value="Roedor">Roedor</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <span class="invalid-feedback">{{ errorMessage }}</span>
                                <span class="invalid-feedback">{{ back_errors['animal_type'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <!-- Raza del animal -->
                            <label for="breed" class="form-label">Raza</label>
                            <Field name="breed" v-slot="{ errorMessage, field }" v-model="post.breed">
                                <input type="text" id="breed" v-model="post.breed"
                                    :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field"
                                    placeholder="Escribe la raza (opcional)">
                                <span class="invalid-feedback">{{ errorMessage }}</span>
                                <span class="invalid-feedback">{{ back_errors['breed'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <!-- Color -->
                            <label for="color" class="form-label">Color</label>
                            <Field name="color" v-slot="{ errorMessage, field }" v-model="post.color">
                                <input type="text" id="color" v-model="post.color"
                                    :class="`form-control ${errorMessage ? 'is-invalid' : ''}`" v-bind="field"
                                    placeholder="Escribe el color">
                                <span class="invalid-feedback">{{ errorMessage }}</span>
                                <span class="invalid-feedback">{{ back_errors['color'] }}</span>
                            </Field>
                        </div>
                        <div class="mb-3">
                            <!-- Load images -->
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" id="image"
                                :class="`form-control ${back_errors['image'] ? 'is-invalid' : ''}`" accept="image/*"
                                @change="previewImage">
                            <span class="invalid-feedback" v-if="back_errors['image']">
                                {{ back_errors['image'] }}
                            </span>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <!-- Image -->
                            <img :src="image_preview" alt="Previsualización" class="img-thumbnail"
                                style="max-width: 100%; height: auto;">
                        </div>
                        <!-- Map -->
                        <label for="map" class="form-label">Agregar ubicación</label>
                        <div id="map" style="height: 300px; width: 100%;"></div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Field, Form } from 'vee-validate'
import * as yup from 'yup'
import { successMessage, handlerErrors } from '@/helpers/Alert.js'
import BackendError from '../Components/BackendError.vue'
import L from 'leaflet'

export default {
    props: [],
    components: { Field, Form },
    computed: {
        schema() {
            return yup.object({
                description: yup.string()
                    .required('La descripción es obligatoria') // Campo obligatorio
                    .min(10, 'La descripción debe tener al menos 10 caracteres') // Mínimo de caracteres
                    .max(500, 'La descripción no puede exceder los 500 caracteres'), // Máximo de caracteres

                animal_type: yup.string()
                    .required('El tipo de animal es obligatorio'),   // Campo obligatorio
                color: yup.string()
                    .required('El color es obligatorio') // Campo obligatorio
                    .max(50, 'El color no puede exceder los 50 caracteres'), // Máximo de caracteres

                breed: yup.string()
                    .max(50, 'La raza no puede exceder los 50 caracteres'), // Máximo de caracteres
            })
        }

    },
    data() {
        return {
            coords: {},
            map: null,
            currentMarker: null,
            post: {},
            back_errors: {},
            file: null,
            image_preview: '/storage/images/images/default.jpeg',
        }
    },
    created() {
        this.index()
    },
    methods: {
        index() { },
        previewImage(event) {
            this.file = event.target.files[0]
            this.image_preview = URL.createObjectURL(this.file)
        },
        async savePost() {
            
            const coordsValidate = await this.valiteCoords()
            if(!coordsValidate) return;
            if (!this.file) {
            const userConfirmed = await this.confirmImage()
            if(!userConfirmed) return;
            }
            
            try {
                const post = this.createFormData(this.post)
                const response = await axios.post('/publications/store', post)
                const postId = response.data.id;
                this.saveCoordinates(postId)
                await successMessage({ reload: true })
            } catch (error) {
                this.back_errors = await handlerErrors(error)
            }
        },
        createFormData(data) {
            const form_data = new FormData()
            if (this.file) form_data.append('file', this.file, this.file.name)
            for (const prop in data) {
                form_data.append(prop, data[prop])
            }
            return form_data
        },
        reset() {
            this.post = {}
            this.$parent.post = {}
            this.back_errors
            this.file = null
            this.image_preview = '/storage/images/images/default.jpeg'
            document.getElementById("image").value = ''
            setTimeout(() => this.$refs.Form.resetForm(), 100)
        },

        initMap() {
            if (this.map) return;

            setTimeout(() => {
                this.map = L.map('map').setView([3.4516, -76.5320], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                }).addTo(this.map);

                this.map.on('click', this.onMapClick);
            }, 500);
        },
        onMapClick(event) {
            if (this.currentMarker) {
                this.currentMarker.setLatLng(event.latlng).bindPopup("Nueva ubicación Elegida");
            } else {
                // Si no existe un marcador, crea uno nuevo
                this.currentMarker = L.marker(event.latlng).addTo(this.map).bindPopup("Ubicación Elegida");
            }
            // Guarda las coordenadas       
            this.coords = event.latlng;
            console.log('Marcador colocado en:', this.coords);
        },
        async confirmImage(){
        const result = await Swal.fire({
            title: '¿Estás seguro?',
            text: 'No has seleccionado una imagen. ¿Deseas continuar sin subir una imagen?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, continuar',
            cancelButtonText: 'Cancelar',
        });

        return result.isConfirmed;
        },
        async valiteCoords(){
            if (!this.coords || !this.coords.lat || !this.coords.lng) {  
            await Swal.fire({
                icon: 'warning',
                title: 'Ubicación requerida',
                text: 'Por favor, selecciona un punto en el mapa antes de continuar.',
                confirmButtonText: 'Entendido'
            });
            return false;  
            }
            return true;
        },
        async saveCoordinates(postId){
            if (this.coords) {
                try {
                    const coords = this.createFormData({
                        latitude: this.coords.lat,
                        longitude: this.coords.lng,
                        post_id: postId
                    });
                    await axios.post('/coordinates/store', coords ); 
                    console.log("Saved coordinates")
                } catch (error) {
                    this.back_errors = await handlerErrors(error)

                }
            }
        }
    }
}
</script>