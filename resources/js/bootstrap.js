import _ from 'lodash'
import * as bootstrap from 'bootstrap'
import axios from 'axios'
import swal from 'sweetalert2'
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import jquery from 'jquery'
import '@fortawesome/fontawesome-free/js/all.js'

import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.html5.mjs';

import jszip from 'jszip';
// import pdfMake from 'pdfmake/build/pdfmake'
// import pdfFonts from 'pdfmake/build/vfs_fonts'
// pdfMake.vfs = pdfFonts.pdfMake.vfs

window.JSZip = jszip
window.$ = jquery
window._ = _
window.Swal = swal
window.axios = axios
window.bootstrap = bootstrap
window.L = L;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest' // ajax

const csrf_token = document.head.querySelector('meta[name="csrf-token"]')
if (csrf_token) {
	window.csrf_token = csrf_token.content
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.csrf_token
} else
	console.error(
		'CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token'
	)