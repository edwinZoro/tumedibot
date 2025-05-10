<template>
  <v-app>
    <navigation-doctor/>
    <v-main>
      <v-container class="fill-height" fluid>
        <v-row justify="center">
          <v-col cols="12" md="10" lg="8">
            <v-card class="pa-6 elevation-4">
              <v-alert type="warning" border="left" class="mb-4 text-center">
                <v-icon color="warning">mdi-alert</v-icon>
                Advertencia: No acepte pagar efectivo, ni en otra cuenta que no sea la que se proporciona en la factura...
              </v-alert>

              <v-stepper v-model="currentStep">
                <v-stepper-header>
                  <v-stepper-step :complete="currentStep > 1" step="1">
                    Datos de Empresa
                  </v-stepper-step>
                  <v-stepper-step :complete="currentStep > 2" step="2">
                    Dirección
                  </v-stepper-step>
                  <v-stepper-step step="3">
                    Perfil e Imágenes
                  </v-stepper-step>
                </v-stepper-header>

                <v-stepper-items>
                  <!-- Paso 1 -->
                  <v-stepper-content step="1">
                    <v-form ref="form1" v-model="valid1">
                      <v-row>
                        <v-col cols="12" md="6">
                          <v-select
                            v-model="formData.tipo_negocio"
                            :items="tiposNegocio"
                            label="Tipo de Negocio"
                            :rules="requiredRule"
                            required
                          ></v-select>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="formData.nombre"
                            label="Nombre de Empresa"
                            :rules="requiredRule"
                            required
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="formData.telefono"
                            label="Teléfono"
                            :rules="requiredRule"
                            required
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="formData.whatsapp"
                            label="WhatsApp"
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="formData.correo"
                            label="Correo"
                            type="email"
                            :rules="emailRules"
                            required
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                          <v-text-field
                            v-model="formData.revendedor"
                            label="Código Secreto"
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <v-btn color="primary" @click="validateStep(1)">
                        Continuar
                      </v-btn>
                    </v-form>
                  </v-stepper-content>

                  <!-- Paso 2 -->
                  <v-stepper-content step="2">
                    <v-form ref="form2" v-model="valid2">
                      <v-row>
                        <v-col cols="12" md="4">
                          <v-select
                            v-model="formData.pais"
                            :items="paises"
                            item-text="nombre_paises"
                            item-value="id"
                            label="País"
                            :rules="requiredRule"
                            @change="cargarEstados"
                          ></v-select>
                        </v-col>
                        <v-col cols="12" md="4">
                          <v-select
                            v-model="formData.estado"
                            :items="estados"
                            item-text="name"
                            item-value="id"
                            label="Estado"
                            :rules="requiredRule"
                            :disabled="!formData.pais"
                            @change="cargarCiudades"
                          ></v-select>
                        </v-col>
                        <v-col cols="12" md="4">
                          <v-select
                            v-model="formData.ciudad"
                            :items="ciudades"
                            item-text="name"
                            item-value="id"
                            label="Ciudad"
                            :rules="requiredRule"
                            :disabled="!formData.estado"
                          ></v-select>
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12">
                          <v-text-field
                            v-model="formData.direccion"
                            label="Dirección"
                            :rules="requiredRule"
                            required
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <v-btn color="primary" @click="validateStep(2)">
                        Continuar
                      </v-btn>
                      <v-btn text @click="currentStep = 1">
                        Regresar
                      </v-btn>
                    </v-form>
                  </v-stepper-content>

                  <!-- Paso 3 -->
                  <v-stepper-content step="3">
                    <v-form ref="form3" v-model="valid3">
                      <v-row>
                        <v-col cols="12">
                          <v-textarea
                            v-model="formData.perfil_clinica"
                            label="Perfil de Empresa"
                            :rules="perfilRules"
                            counter
                            rows="4"
                          ></v-textarea>
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12">
                          <v-text-field
                            v-model="formData.servicios"
                            label="Servicios"
                            :rules="requiredRule"
                            required
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <!-- Sección de imágenes -->
                      <v-row v-for="(image, index) in images" :key="index">
                        <v-col cols="6">
                          <v-img
                            :src="image.preview"
                            max-height="200"
                            contain
                          ></v-img>
                          <div v-if="image.error" class="red--text">
                            {{ image.error }}
                          </div>
                        </v-col>
                        <v-col cols="6">
                          <v-file-input
                            :label="image.label"
                            accept="image/*"
                            @change="handleImageUpload($event, index)"
                          ></v-file-input>
                        </v-col>
                      </v-row>
                      <v-row>
                        <v-col cols="12" md="3">
                          <v-text-field
                            v-model="formData.facebook"
                            label="Facebook"     
                            :rules="[urlRule]"                 
                          ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="3">
                          <v-text-field
                            v-model="formData.twitter"
                            label="Twitter"  
                            :rules="[urlRule]"                   
                          ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="3">
                          <v-text-field
                            v-model="formData.linkedin"
                            label="Linkedin"
                            :rules="[urlRule]"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                          <v-text-field
                            v-model="formData.instagram"
                            label="Instagram"
                            :rules="[urlRule]"
                          ></v-text-field>
                        </v-col>
                      </v-row>

                      <v-row>
                        <v-col cols="12">
                          <div class="g-recaptcha" data-sitekey="6LfZdwgiAAAAAPt84chdFLZYcerFy5TwWpUWy3HG"></div>
                        </v-col>
                      </v-row>

                      <v-btn color="success" @click="submitForm">
                        Enviar
                      </v-btn>
                      <v-btn text @click="currentStep = 2">
                        Regresar
                      </v-btn>
                    </v-form>
                  </v-stepper-content>
                </v-stepper-items>
              </v-stepper>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <footer-doctor />
  </v-app>
</template>

<script>
export default {
  data: () => ({
    currentStep: 1,
    valid1: false,
    valid2: false,
    valid3: false,
    formData: {
      tipo_negocio: '',
      nombre: '',
      telefono: '',
      whatsapp: '',
      correo: '',
      revendedor: '',
      pais: null,
      estado: null,
      ciudad: null,
      direccion: '',
      perfil_clinica: '',
      servicios: '',
      instagram: '',
      facebook: '',
      twitter: '',
      linkedin: '',
    },
    images: [
      { label: 'Imagen 1 (Carrousel)', preview: null, error: null },
      { label: 'Imagen 2 (Carrousel)', preview: null, error: null },
      { label: 'Imagen 3 (Mapa)', preview: null, error: null },
      { label: 'Imagen 4 (Perfil)', preview: null, error: null },
      { label: 'Imagen 5 (Servicios)', preview: null, error: null },
      { label: 'Imagen 6 (Contacto)', preview: null, error: null }
    ],
    paises: [],
    estados: [],
    ciudades: [],
    tiposNegocio: [
      'Ambulatorio', 'Clínica', 'Hospital',
      'Laboratorio', 'Farmacia', 'Seguro'
    ],
    requiredRule: [v => !!v || 'Campo obligatorio'],
    emailRules: [
      v => !!v || 'Email requerido',
      v => /.+@.+\..+/.test(v) || 'Email inválido'
    ],
    perfilRules: [
      v => !!v || 'Perfil requerido',
      v => v.length >= 100 || 'Mínimo 100 caracteres',
      v => v.length <= 500 || 'Máximo 500 caracteres'
    ],
    imageRules: [
      v => !!v || 'Imagen requerida',
      v => !v || v.size < 5000000 || 'La imagen debe ser menor a 5MB'
    ]
  }),

   computed: {
  urlRule() {
    return value => 
      !value || 
      this.isValidUrl(value) || 
      'Debe ser una URL válida (ej: https://example.com)';
  }
  },


  methods: {
    async cargarPaises() {
      try {
        const response = await fetch('/api/paises');
        this.paises = await response.json();
      } catch (error) {
        console.error('Error cargando países:', error);
      }
    },

    async cargarEstados(paisId) {
      try {
        const response = await fetch(`/api/states/${paisId}`);
        this.estados = await response.json();
      } catch (error) {
        console.error('Error cargando estados:', error);
      }
    },

    async cargarCiudades(stateId) {
      try {
        const response = await fetch(`/api/ciudades/${stateId}`);
        this.ciudades = await response.json();
      } catch (error) {
        console.error('Error cargando ciudades:', error);
      }
    },

  handleImageUpload(file, index) {
  if (file) {
    // Validar tamaño
    if (file.size > 5000000) {
      this.images[index].error = 'La imagen excede los 5MB';
      this.images[index].file = null; // Asegurar que el file sea null
      return;
    }
    
    this.images[index].error = null;
    this.images[index].file = file; // ⚠️¡Falta esta línea crítica!
    
    const reader = new FileReader();
    reader.onload = e => {
      this.images[index].preview = e.target.result;
    };
    reader.readAsDataURL(file);
  } else {
    this.images[index].file = null; // Limpiar si se elimina la imagen
  }
},

  /* handleImageUpload(file, index) {
      if (file) {
        if (file.size > 5000000) {
          this.images[index].error = 'La imagen excede los 5MB';
          return;
        }
        this.images[index].error = null;
        const reader = new FileReader();
        reader.onload = e => {
          this.images[index].preview = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    },

    // Verifica que estés asignando correctamente el archivo al array
     handleImageUpload(event, index) {
      const file = event.target.files[0];
      if (file) {
        this.images[index].file = file; // ✅ Debes asignar el archivo aquí
        this.images[index].preview = URL.createObjectURL(file);
      } else {
        this.images[index].file = null; // ⚠️ Si no hay archivo, se envía null
      }
    },*/

    validateStep(step) {
      if (this.$refs[`form${step}`].validate()) {
        this.currentStep = step + 1;
        this.savelocaldata()
      }
    },

    savelocaldata(){
      localStorage.setItem('companyform',JSON.stringify(this.formData))
    },

    loadlocaldata(){
      const data = localStorage.getItem('companyform')
      if(data){
        this.formData = JSON.parse(data)
      }
    },

    async submitForm() {
      if (this.$refs.form3.validate()) {
        const formData = new FormData();
        const match = window.location.pathname.match(/\/companyProfileForm\/(\d+)/);
        const userId = match ? parseInt(match[1]) : null;
         // Mapear campos
        const payload = {
             tipo_negocio: this.formData.tipo_negocio, 
             nombre: this.formData.nombre, 
             telefono: this.formData.telefono,
             whatsapp: this.formData.whatsapp ,
             correo: this.formData.correo, 
             revendedor: this.formData.revendedor, 
             pais: this.formData.pais, 
             estado: this.formData.estado ,
             ciudad: this.formData.ciudad, 
             direccion: this.formData.direccion, 
             perfil_clinica: this.formData.perfil_clinica,
             servicios: this.formData.servicios, 
             instagram: this.formData.instagram,
             facebook: this.formData.facebook, 
             twitter: this.formData.twitter, 
             linkedin: this.formData.linkedin,
             user_id: userId, 
        };
        
        // Agregar campos al FormData
        Object.entries(payload).forEach(([key, value]) => {
            formData.append(key, value);
        });


         // Nombres correctos para las imágenes
        const imageFields = ['imagen', 'imagenb', 'imagenc', 'imagend', 'imagene', 'imagenf'];
        
        this.images.forEach((image, index) => {
          if (image.file) {
            formData.append(imageFields[index], image.file);
          }
        });
        console.log([...formData.entries()]);
        console.log('Datos a enviar:', payload); // Agrega esta línea
        console.log('FormData a enviar:', formData); // Agrega esta línea
        
        try {
          const response = await fetch('/api/companyProfilePost', {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
              'Accept': 'application/json',
              },
              body: formData
          });

           const data = await response.json();

          console.log('Dtatat:',data)

          if (response.ok) {
            console.log('ok')
          } else {
            console.log('error')
          }
        } catch (error) {
          console.error('Error:', error);
        }
      }
    }
  },

  mounted() {
    this.loadlocaldata();
    this.cargarPaises();
  }
};
</script>

<style>
.v-stepper {
  background: transparent !important;
}
</style>