
import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'
import 'sweetalert2/dist/sweetalert2.min.css';
import Swal from 'sweetalert2';

// Hacerlo disponible en todos los componentes (opcional)
Vue.prototype.$swal = Swal;
Vue.use(Vuetify);
Vue.use(VueRouter);

Vue.component(
    'example-component', require('./components/ExampleComponent.vue').default,
);

Vue.component(
    'calendar', require('./components/ExampleComponent2.vue').default,
);

Vue.component(
    'pacientes', require('./components/Pacientes.vue').default,
);

Vue.component(
    'medical-profile-form-component', require('./components/MedicalProfileFormComponent.vue').default,
);

Vue.component(
    'company-profile-form-component', require('./components/CompanyProfileFormComponent.vue').default,
);

Vue.component(
    'custom-ckeditor', require('./components/CustomCKEditor.vue').default,
);

Vue.component(
    'navigation-doctor', require('./components/NavigationComponent.vue').default,
);

Vue.component(
    'footer-doctor', require('./components/FooterComponent.vue').default,
);

Vue.component(
    'medical-profile-edit-form-component', require('./components/MedicalProfileEditFormComponent.vue').default,
);

new Vue({
	vuetify: new Vuetify(),
	router:new VueRouter(),
	el: '#app',
	  icons: {
    iconfont: 'mdi', // default - only for display purposes
  },
})
