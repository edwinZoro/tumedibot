<template>
  <v-app>
  <navigation-doctor />
   <v-main>
      <v-container class="fill-height" fluid>
        <v-row justify="center" align="center">
          <v-col cols="12" md="10" lg="8">
            <v-card class="pa-6 elevation-4">
      <v-banner
        rounded

        class="text-center"
      >
       <v-icon color="blue darken-3">mdi-doctor</v-icon> Toda la información del siguiente formulario será visible en el Perfil Médico
      </v-banner>
      <v-stepper v-model="e1" >
        <v-stepper-header>
          <v-stepper-step :complete="e1 > 1" step="1">
            Datos Personales
          </v-stepper-step>

          <v-stepper-step :complete="e1 > 2" step="2">
            Dirección y Contacto
          </v-stepper-step>

          <v-stepper-step step="3">
            Información Profesional
          </v-stepper-step>
        </v-stepper-header>

        <v-stepper-items>
          <!-- Paso 1 - Datos Personales -->
          <v-stepper-content step="1">
            <v-form ref="form1" v-model="valid1">
              <v-container>
                <v-row>
                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.nombre"
                      :rules="nombreRules"
                      label="Nombre"
                      required
                      
                    ></v-text-field>
                  </v-col>
                  
                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.apellido"
                      :rules="nombreRules"
                      label="Apellido"
                      required
                      
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.second_name"
                      label="Segundo Nombre"
                      
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.last_name"
                      label="Segundo Apellido"
                      
                    ></v-text-field>
                  </v-col>
                </v-row>

                <v-row>
                  <v-col cols="12" md="3">
                    <v-select
                      v-model="formData.sexo"
                      :items="['MASCULINO', 'FEMENINO']"
                      label="Sexo"
                      :rules="[v => !!v || 'Campo requerido']"
                      required
                      
                    ></v-select>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.telefono"
                      :rules="telefonoRules"
                      label="Teléfono de Consultorio"
                      required
                      
                      type="tel"
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.whatsapp"
                      :rules="telefonoRules"
                      label="WhatsApp"
                      
                      type="tel"
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="3">
                    <v-text-field
                      v-model="formData.email_dr"
                      :rules="emailRules"
                      label="Correo Electrónico"
                      required
                      
                      type="email"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>

            <v-btn color="primary" @click="validarPaso(1)">
              Continuar
            </v-btn>
            <v-btn text @click="resetearFormulario">
              Cancelar
            </v-btn>
          </v-stepper-content>

          <!-- Paso 2 - Dirección -->
          <v-stepper-content step="2">
            <v-form ref="form2" v-model="valid2">
              <v-container>
               <v-row>
                  <!-- Select de Países -->
                  <v-col cols="12" md="4">
                    <v-select
                      v-model="formData.pais"
                      :items="paises"
                      item-text="nombre_paises"
                      item-value="id"
                      label="País"
                      :rules="[v => !!v || 'Campo requerido']"
                      :loading="loadingPaises"
                      required
                      outlined
                      @change="cargarEstados"
                    ></v-select>
                  </v-col>

                  <!-- Select de Estados -->
                  <v-col cols="12" md="4">
                    <v-select
                      v-model="formData.estado"
                      :items="estados"
                      item-text="name"
                      item-value="id"
                      label="Estado"
                      :rules="[v => !!v || 'Campo requerido']"
                      :loading="loadingEstados"
                      :disabled="estadosDisabled"
                      required
                      outlined
                      @change="cargarCiudades"
                    ></v-select>
                  </v-col>

                  <!-- Select de Ciudades -->
                  <v-col cols="12" md="4">
                    <v-select
                      v-model="formData.ciudad"
                      :items="ciudades"
                      item-text="name"
                      item-value="id"
                      label="Ciudad"
                      :rules="[v => !!v || 'Campo requerido']"
                      :loading="loadingCiudades"
                      :disabled="ciudadesDisabled"
                      required
                      outlined
                    ></v-select>
                  </v-col>
                </v-row>

                <v-row>
                  <v-col cols="12">
                    <v-textarea
                      v-model="formData.direccion_completa"
                      :rules="direccionRules"
                      label="Dirección Completa de Consultorio"
                      hint="Incluya avenida/calle, número, edificio, piso, referencia"
                      required                      
                      rows="3"
                    ></v-textarea>
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
              </v-container>
            </v-form>

            <v-btn color="primary" @click="validarPaso(2)">
              Continuar
            </v-btn>
            <v-btn text @click="e1 = 1">
              Regresar
            </v-btn>
          </v-stepper-content>

          <!-- Paso 3 - Información Profesional -->
          <v-stepper-content step="3">
            <v-form ref="form3" v-model="valid3">
              <v-container>
                <v-row>
                  <v-col cols="12" md="4">
                    <v-select
                      v-model="formData.especialidad"
                      :items="especialidades"
                      item-text="nombre_especialidad"
                      item-value="id"
                      label="Especialidad Medica"
                      :loading="loadingEspecialidades"
                      :rules="[v => !!v || 'Campo requerido']"
                      required
                      outlined
                      @change="cargarEspecialidad"
                      
                    ></v-select>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.experiencia"
                      :rules="experienciaRules"
                      label="Años de Experiencia"
                      type="number"
                      min="1"
                      max="100"
                      required
                      
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.costo_consulta"
                      :rules="costoRules"
                      label="Costo de Consulta (USD)"
                      type="number"
                      required
                      
                      prefix="$"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.horario"
                      label="Horario de Trabajo"
                      :rules="[v => !!v || 'Campo requerido']"
                      required
                      
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.leyenda_dr"
                      :rules="leyendaRules"
                      label="Usted es"
                      hint="Cirujano, Odontologo"
                      required
                      
                    ></v-text-field>
                  </v-col>

                  <v-col cols="12" md="4">
                    <v-text-field
                      v-model="formData.codigo"
                      :rules="codigoRules"
                      label="Codigo Secreto"
                    ></v-text-field>
                  </v-col>
                </v-row>

                <v-row>
                  <v-col cols="12" md="6">
                    <v-file-input
                      v-model="formData.titulo_file"
                      :rules="fileRules"
                      label="Título Profesional (PDF/Imagen)"
                      accept=".pdf,.png,.jpg,.jpeg"
                      required
                      
                    ></v-file-input>
                  </v-col>

                  <v-col cols="12" md="6">
                    <v-file-input
                      v-model="formData.foto"
                      :rules="fotoRules"
                      label="Foto Profesional"
                      accept=".pdf,.png,.jpg,.jpeg"
                      required
                      
                      @change="previsualizarFoto"
                    ></v-file-input>
                  </v-col>
                </v-row>

                <v-row v-if="fotoPreview">
                  <v-col cols="12">
                    <v-img
                      :src="fotoPreview"
                      max-height="300"
                      contain
                      class="preview-image"
                    ></v-img>
                  </v-col>
                </v-row>

                <v-row>
                  <v-col cols="6">
                    <v-textarea
                      v-model="formData.perfil_med"
                      :rules="perfilRules"
                      label="Perfil Médico"                      
                      rows="6"
                      counter
                      maxlength="1500"
                      hint="Describa su experiencia y especialidades (máx. 1500 caracteres)"
                    ></v-textarea>
                  </v-col>
                  <v-col cols="6">
                    <v-textarea
                      v-model="formData.tratamientos"
                      :rules="tratamientosRules"
                      label="Tratamientos Disponibles"                      
                      rows="6"
                      counter
                      maxlength="1500"
                      hint="Describa sus tratamientos (máx. 1500 caracteres)"
                    ></v-textarea>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>

            <v-btn color="success" @click="enviarFormulario">
              Enviar
            </v-btn>
            <v-btn text @click="e1 = 2">
              Regresar
            </v-btn>
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
    e1: 1,
    valid1: false,
    valid2: false,
    valid3: false,
    fotoPreview: null,
    paises: [],
    estados: [],
    ciudades: [],
    loadingPaises: false,
    loadingEstados: false,
    loadingCiudades: false,
    loadingEspecialidades: false,
    estadosDisabled: true,
    ciudadesDisabled: true,
    especialidades: [],
    formData: {
      ciudad:null,
      pais:null,
      estado:null,
      nombre: '',
      apellido: '',
      second_name: '',
      last_name: '',
      sexo: null,
      telefono: '',
      email_dr: '',
      direccion_completa: '',
      especialidad: null,
      experiencia: null,
      costo_consulta: null,
      horario:'',
      leyenda_dr:'',
      codigo:null,
      titulo_file: null,
      foto: null,
      perfil_med: '',
      tratamientos:'',
      instagram: '',
      facebook: '',
      twitter: '',
      linkedin: '',
    },
    // Reglas de validación
    nombreRules: [
      v => !!v || 'Campo obligatorio',
      v => v.length >= 2 || 'Mínimo 2 caracteres'
    ],
    emailRules: [
      v => !!v || 'Email requerido',
      v => /.+@.+\..+/.test(v) || 'Email inválido'
    ],
    telefonoRules: [
      v => !!v || 'Teléfono requerido',
      v => /^[+]?[\d\s-]{6,15}$/.test(v) || 'Formato inválido'
    ],
    direccionRules: [
      v => !!v || 'Dirección requerida',
      v => v.length >= 10 || 'Mínimo 10 caracteres'
    ],
    experienciaRules: [
      v => !!v || 'Experiencia requerida',
      v => v >= 1 || 'Mínimo 1 año'
    ],
    codigoRules: [
      v => !!v || 'Campo requerido',
      v => v >= 4 || 'Mínimo 4 digitos'
    ],
    costoRules: [
      v => !!v || 'Costo requerido',
      v => v > 0 || 'Debe ser mayor a 0'
    ],
    fileRules: [
      v => !!v || 'Archivo requerido',
      v => !v || v.size < 5000000 || 'El archivo debe ser menor a 5MB'
    ],
    fotoRules: [
      v => !!v || 'Foto requerida',
     // v => !v || v.type.startsWith('image/') || 'Solo imágenes permitidas',
      v => !v || v.size < 5000000 || 'La imagen debe ser menor a 5MB'
    ],
    tratamientosRules: [
    v => !!v || 'Tratamientos requerido',
    v => v.length >= 100 || 'Mínimo 100 caracteres',
    v => v.length <= 1500 || 'Máximo 1500 caracteres'
    ],
    perfilRules: [
    v => !!v || 'Perfil requerido',
    v => v.length >= 100 || 'Mínimo 100 caracteres',
    v => v.length <= 1500 || 'Máximo 1500 caracteres'
    ],
    leyendaRules: [
      v => !!v || 'Campo obligatorio',
      v => (v && v.length >= 2) || 'Mínimo 2 caracteres' // Agregar validación para null
    ],
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
        isValidUrl(url) {
    try {
      new URL(url);
      return true;
    } catch (_) {
      return false;
    }
  },
      async cargarEspecialidad() {
      try {
        this.loadingEspecialidades = true;
        const response = await fetch('/api/especialidades');
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        this.especialidades = data;
        
      } catch (error) {
        console.error('Error cargando especilidades:', error);
        this.$swal.fire('Error', 'No se pudieron cargar las especialidades', 'error');
      } finally {
        this.loadingEspecialidades = false;
      }
    },

      async cargarPaises() {
      try {
        this.loadingPaises = true;
        const response = await fetch('/api/paises');
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        this.paises = data;
        
      } catch (error) {
        console.error('Error cargando países:', error);
        this.$swal.fire('Error', 'No se pudieron cargar los países', 'error');
      } finally {
        this.loadingPaises = false;
      }
    },

    async cargarEstados(paisId) {
      try {
        // Resetear valores
        this.formData.estado = null;
        this.formData.ciudad = null;
        this.estados = [];
        this.ciudades = [];
        this.ciudadesDisabled = true;

        if (!paisId) return;

        this.loadingEstados = true;
        this.estadosDisabled = true;

        const response = await fetch(`/api/states/${paisId}`);
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        this.estados = data;
        this.estadosDisabled = false;

      } catch (error) {
        console.error('Error cargando estados:', error);
        this.$swal.fire('Error', 'No se pudieron cargar los estados', 'error');
      } finally {
        this.loadingEstados = false;
      }
    },

    async cargarCiudades(stateId) {
      try {
        this.formData.ciudad = null;
        this.ciudades = [];

        if (!stateId) return;

        this.loadingCiudades = true;
        this.ciudadesDisabled = true;

        const response = await fetch(`/api/ciudades/${stateId}`);
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        this.ciudades = data;
        this.ciudadesDisabled = false;

      } catch (error) {
        console.error('Error cargando ciudades:', error);
        this.$swal.fire('Error', 'No se pudieron cargar las ciudades', 'error');
      } finally {
        this.loadingCiudades = false;
      }
    },
  


    validarPaso(paso) {
      if (this.$refs[`form${paso}`].validate()) {
        this.e1 = paso + 1
        this.guardarDatosLocalmente()
      }
    },

    previsualizarFoto(file) {
      if (file) {
        const reader = new FileReader()
        reader.onload = e => this.fotoPreview = e.target.result
        reader.readAsDataURL(file)
      }
    },

    guardarDatosLocalmente() {
      localStorage.setItem('formularioMedico', JSON.stringify(this.formData))
    },

    cargarDatosGuardados() {
      const datos = localStorage.getItem('formularioMedico')
      if (datos) {
        this.formData = JSON.parse(datos)
      }
    },

   /* async enviarFormulario() {
      if (this.$refs.form3.validate()) {
        const formData = new FormData()
        Object.keys(this.formData).forEach(key => {
          if (key === 'foto' || key === 'titulo_file') {
            if (this.formData[key]) formData.append(key, this.formData[key])
          } else {
            formData.append(key, this.formData[key])
          }
        })

        try {
          await this.$axios.post('/api/perfiles-medicos', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
          })
          this.limpiarFormulario()
          this.mostrarNotificacionExito()
        } catch (error) {
          this.mostrarError(error)
        }
      }
    },*/

    async enviarFormulario() {
    if (this.$refs.form3.validate()) {
        const formData = new FormData();
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         // Extraer el ID del usuario desde la URL
        const match = window.location.pathname.match(/\/calendar_example\/(\d+)/);
        const userId = match ? parseInt(match[1]) : null;
        // Mapear campos
        const payload = {
            nombre: this.formData.nombre,
            apellido: this.formData.apellido,
            second_name: this.formData.second_name,
            last_name: this.formData.last_name,
            sexo: this.formData.sexo,
            telefono: this.formData.telefono,
            whatsapp: this.formData.whatsapp,
            email_dr: this.formData.email_dr,
            pais: this.formData.pais,
            estado: this.formData.estado,
            ciudad: this.formData.ciudad,
            direccion_completa: this.formData.direccion_completa,
            especialidad_id: this.formData.especialidad,
            experiencia: this.formData.experiencia,
            costo_consulta: this.formData.costo_consulta,
            horario: this.formData.horario,
            leyenda_dr: this.formData.leyenda_dr,
            horario: this.formData.horario,
            perfil_med: this.formData.perfil_med,
            tratamientos: this.formData.tratamientos,
            facebook: this.formData.facebook,
            twitter: this.formData.twitter,
            linkedin: this.formData.linkedin,
            instagram: this.formData.instagram,
            user_id: userId 
        };

        // Agregar campos al FormData
        Object.entries(payload).forEach(([key, value]) => {
            formData.append(key, value);
        });

        // Archivos
        if (this.formData.foto) {
            formData.append('foto', this.formData.foto);
        }
        if (this.formData.titulo_file) {
            formData.append('titulo_file', this.formData.titulo_file);
        }

        console.log('Datos a enviar:', payload); // Agrega esta línea
        console.log('FormData a enviar:', formData); // Agrega esta línea

        try {
            const response = await fetch('/api/medicos', {
                method: 'POST', 
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            console.log('Dtatat:',data)

            if (!response.ok) {
                throw new Error(data.message || 'Error del servidor');
            }

            this.limpiarFormulario();
            window.location.href = data.redirect;

        } catch (error) {
            this.mostrarError(error);
        }
          }
      },


    limpiarFormulario() {
      this.$refs.form1.reset()
      this.$refs.form2.reset()
      this.$refs.form3.reset()
      localStorage.removeItem('formularioMedico')
      this.fotoPreview = null
    },

    resetearFormulario() {
      this.limpiarFormulario()
      this.e1 = 1
    },

    mostrarNotificacionExito() {
      this.$swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: 'Formulario enviado correctamente'
      })
    },

    mostrarError(error) {
      this.$swal.fire({
        icon: 'error',
        title: 'Error',
        text: error.response?.data?.message || 'Error en el envío'
      })
    }
  },

  mounted() {
    this.cargarDatosGuardados()
    this.cargarPaises();
    this.cargarEspecialidad();
  }
}
</script>

<style scoped>
.preview-image {
  border: 2px dashed #1976d2;
  border-radius: 8px;
  padding: 10px;
  margin-top: 20px;
}
</style>