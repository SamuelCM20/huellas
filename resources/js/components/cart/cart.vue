<template>
        <div class="row p-5">
            <!-- Columna izquierda: Carrito -->
            <div class="card col-lg-8">
					<h1 class="h1 m-2">Carrito</h1>
					<a href="#" class="text-primary mx-3" @click="cleanCart(user_data.id)">Vaciar carrito</a>
				<hr>
                <div class="card-body mt-2 overflow-auto" style="max-height: 350px;">
					<div v-if="!products.length > 0" class="card-body mt-2 text-center">
                    	<p class="fw-bold fs-5">El carrito está vacío</p>
                	</div>
                    <div class="card-item mb-2 shadow-sm" v-for="(product, index) in products" :key="index">
                        <div class="row align-items-center">
                            <!-- Imagen del producto -->
                            <div class="col-3 col-md-2">
                                <img :src="product.file.route" :alt="product.name" class="img-product img-fluid shadow-sm" alt="Imagen no disponible">
                            </div>
                            <!-- Detalles del producto -->
                            <div class="col-5 col-md-6">
                                <h5 class="fw-bold">{{product.name}}</h5>
                                <p class="text-muted">{{product.details}}</p>
								<p class="text-muted">{{product.stock}} disponibles</p>
                                <p v-if="product.shipping_cost != 0"  class="text-muted fw-bold">Costo de envio: ${{product.shipping_cost}}</p>
                                <p v-else class="text-muted fw-bold">Costo de envio: <span>Gratuito</span></p>
                            </div>
                            <!-- Precio -->
                            <div class="col-4 col-md-2">
                                <span class="fw-bold fs-4">${{product.subtotal}}</span>
                            </div>
                            <!-- Controles de cantidad -->
                            <div class="col-12 col-md-2 mt-3 mt-md-0">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-outline-secondary btn-sm"  @click="decrease(product)">-</button>
                                    <span class="mx-auto fw-bolder">{{product.quantity}}</span>
                                    <button class="btn btn-outline-secondary btn-sm" @click="increase(product)">+</button>
                                </div>
                                <button class="btn btn-outline-danger btn-sm mt-2 w-100" @click="removeProduct(product.id)">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Resumen del carrito -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title h4">Subtotal de los productos:</h5>
                        <h4 class="card-text text-end fw-bold">${{total}}</h4>
                        <button class="btn button-success w-100 mt-3" @click="buyAlert">Realizar compra</button>
                    </div>
                </div>
            </div>
    </div>
</template>

<script setup>
import {
	addObject,
	getObject,
	cleanObjects,
	getProductsObject,
	deleteObject,
	addTotal,
} from "@/helpers/LocalStorage";

import { ref, onMounted } from "vue";
import { noDisponible } from '../../helpers/Alert';

const props = defineProps(["user"]);

const user_data = ref({});
const products = ref([]);
const total = ref(0);

const decrease = (product) => {
	if (product.quantity > 1) {
		let newQuantity = product.quantity - 1;
		let newSubtotal = product.price * newQuantity;

		product.quantity = newQuantity;
		product.subtotal = newSubtotal;

		const key = `${user_data.value.id}-${product.id}`;
		addObject(key, product);
		total.value = addTotal(user_data.value.id);
	}
};
const increase = (product) => {
	if (product.stock > product.quantity) {
		let newQuantity = product.quantity + 1;
		let newSubtotal = product.price * newQuantity;

		product.quantity = newQuantity;
		product.subtotal = newSubtotal;

		const key = `${user_data.value.id}-${product.id}`;
		addObject(key, product);
		total.value = addTotal(user_data.value.id);
	}
};

const removeProduct = (idProduct) => {
	const key = `${user_data.value.id}-${idProduct}`;
	deleteObject(key);

	products.value = getProductsObject(user_data.value.id);
	total.value = addTotal(user_data.value.id);
};


const index = () => {

	try {

		user_data.value = props.user;
		products.value = getProductsObject(user_data.value.id);
		total.value = addTotal(user_data.value.id);
	} catch (error) {
		console.log(error);
	}
};

const cleanCart = (productId) => {
		cleanObjects(user_data.value.id);

		products.value = [];
		total.value = 0;
	};

const buyAlert = () => {
		noDisponible()
	};

onMounted(() => index());
</script>

<style>
.img-product{
	width: 80px;
	height: 80px;
}
</style>
