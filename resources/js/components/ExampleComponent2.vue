<template>
    <v-app>
     <navigation-doctor />
        <v-main>
            <v-container>
                <h4 class="mt-5 blue--text d-flex justify-center">{{ medico_name }} {{ medico_lastname }} - Especialista
                    en
                    {{ especialidad }} </h4>
                <v-card color="lighten-4">
                  <v-data-table v-show="!proveMa" class="text-center justify-center" :headers="headers" :items="pacientes"
                        :search="search">
                        <template v-slot:item="{ item }">
                            <tr>
                                <td>{{ item.nombre_paciente }}</td>
                                <td class="text-center">{{ item.tlf_paciente || '-' }}</td>
                                <td class="text-center">{{ item.email_paciente || '-' }}</td>
                                <td class="text-center">{{ item.edad || '-' }}</td>
                                <td class="text-center">{{ item.peso || '-' }}</td>
                                <td class="text-center">{{ item.estatura || '-' }}</td>
                                <td class="text-center justify-center">
                                <v-tooltip bottom>
                                 <template v-slot:activator="{ on, attrs }">
                                    <v-btn           
                                        v-bind="attrs"
                                        v-on="on"
                                        :color="'green'" 
                                        icon @click="newAppointment = true"
                                    >
                                        <v-icon>mdi-send</v-icon>
                                    </v-btn>
                                  </template>
                                      <span>Agendar Cita</span>
                                </v-tooltip>    
                                <v-tooltip bottom>
                                 <template v-slot:activator="{ on, attrs }">
                                    <v-btn           
                                        v-bind="attrs"
                                        v-on="on"
                                        :color="'orange'" 
                                        icon @click="abrirModalEditar = true"
                                    >
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                  </template>
                                      <span>Editar</span>
                                </v-tooltip>
                                </td>
                            </tr>
                        </template>
                        <template v-slot:item.history="{ item }">
                            <div class="d-flex align-center justify-center">
                                <v-btn icon color="primary" @click="verHistorial(item)">
                                    <v-icon>mdi-clipboard-text</v-icon>
                                </v-btn>
                            </div>
                        </template>
                    </v-data-table>
                  </v-card> 
            </v-container>
            <v-container>
                <v-row no-gutters class="mt-5">
                    <v-col md="6" offset-md="3">
                        <v-alert border="top" colored-border type="info" elevation="2" v-if="valueb != 0"
                            :valueb="valueb" class="m-2 p-2">
                            Agendo Una Cita Con El Dr/a {{ medico_name }} {{ medico_lastname }} Correctamente. Cuando el m&eacute;dico le asigné la fecha le llegará un correo.
                        </v-alert>
                    </v-col>
                </v-row>
                <v-toolbar flat class="blue accent-3 mt-5">
                    <v-btn fab text small color="blue accent-1 " @click="prev">
                        <v-icon>
                            mdi-chevron-left
                        </v-icon>
                    </v-btn>
                    <v-btn fab text small class="white--text mr-2" color="blue accent-1" @click="next">
                        <v-icon>
                            mdi-chevron-right
                        </v-icon>
                    </v-btn>

                    <v-toolbar-title :title="title" class="white--text text-sm-body-2 mr-2">{{ title
                        }}</v-toolbar-title>
                     <v-btn v-show="proveMa" color="blue" @click="newPatient = true" dark elevation="2">
                            <v-icon left>mdi-account-plus</v-icon>
                            Crear Paciente
                            </v-btn>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <v-row class="fill-height">
                    <v-col>
                        <v-sheet height="600">
                             <v-calendar ref="calendar" locale="es" :weekdays="[1, 2, 3, 4, 5, 6, 0]" first-interval="0"
                                interval-count="24" v-model="value" color="primary" type="week" :events="events"
                                :event-color="getEventColor" >
                                <!--  @click:event="showEvent" @mousedown:event="startDrag"
                                @mousedown:time="startTime" @mousemove:time="mouseMove" @mouseup:time="endDrag"
                                @mouseleave.native="cancelDrag"-->
                                <template v-slot:event="{ event, timed }">
                                    <div class="flex justify-center">
                                        <span>
                                            {{ event.estado !== 2 ? formatDate(event.start) : '' }}
                                            <p v-if="event.estado === 2" class="text-center">{{
                                                            event.paciente.nombre_paciente }}.</p>
                                        </span>
                                    </div>
                                    <div
                                      v-if="timed"
                                      class="v-event-drag-bottom"
                                      @mousedown.stop="extendBottom(event)"
                                    ></div>
                                </template>
                            </v-calendar>
                            <v-menu v-model="newPatient" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="gray lighten-4" min-width="350px" flat>
                                    <v-toolbar color="blue" dark>
                                        <v-icon class="mr-2">mdi-doctor</v-icon>
                                        <v-toolbar-title>Agende su Cita Médica</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-icon>mdi-calendar-account</v-icon>
                                    </v-toolbar>
                                    <v-card-text>
                                        <div>
                                            - La informaci&oacute;n agregada se enviará al médico.<br>
                                            - Una vez enviado el médico se encargará de asignarle la fecha y le llegará una notificación a usted en su correo.
                                        </div>
                                        <v-form @submit.prevent="updateAppointment" v-model="valid">
                                            <v-container style="height: 20rem; overflow-y: auto;">
                                                <h4 class="text-center">Datos de Contacto: </h4>
                                                <v-col cols="12">
                                                    <v-text-field v-model="firstname" :rules="nameRules" :counter="20"
                                                        label="Nombre" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="phone" :rules="phoneRules" :counter="14"
                                                        label="Telefono" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="email" :rules="emailRules" label="E-mail"
                                                        required></v-text-field>
                                                </v-col>
                                                <h4 class="text-center">Datos del paciente: </h4>
                                                <v-col cols="12">
                                                    <v-text-field v-model="edad" :rules="edadRules" :counter="3"
                                                        label="Edad" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="peso" :rules="pesoRules" label="Peso(Kg)"
                                                        required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="estatura" :rules="estaturaRules" :counter="4"
                                                        label="Estatura(Mts)" required></v-text-field>
                                                </v-col>
                                                <h4 class="text-center">Datos de la cita: </h4>
                                                 <v-row class="justify-center">
                                                  <v-col
                                                    cols="12"
                                                  >
                                                    <v-select
                                                      :items="typeAppointment"
                                                      label="Tipo de Cita"
                                                      v-model="newTypeAppointment"
                                                    ></v-select>
                                                  </v-col>
                                                </v-row>  
                                                <v-col cols="12">
                                                    <v-text-field v-model="motivo_consulta"
                                                        label="Motivo de la consulta"></v-text-field>
                                                </v-col>
                                                <v-row align="center" no-gutters>
                                                    <v-col cols="10">
                                                        <v-text-field v-model="enfermedad" label="Síntomas" dense
                                                            outlined hide-details
                                                            @keyup.enter="agregarEnfermedad"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="2" class="d-flex align-center justify-center">
                                                        <v-btn color="primary" @click="agregarEnfermedad" icon>
                                                            <v-icon>mdi-plus</v-icon>
                                                        </v-btn>
                                                    </v-col>
                                                </v-row>
                                                <v-col cols="12">
                                                    <v-list>
                                                        <v-list-item v-if="enfermedades.length === 0">
                                                            <v-list-item-content>
                                                                <v-list-item-title>No has registrado
                                                                    síntomas.</v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>

                                                        <v-list-item v-for="(item, index) in enfermedades" :key="index"
                                                            v-else>
                                                            <v-list-item-content>
                                                                <v-list-item-title>{{ item }}</v-list-item-title>
                                                            </v-list-item-content>
                                                            <v-list-item-action>
                                                                <v-btn icon @click="eliminarEnfermedad(index)">
                                                                    <v-icon>mdi-delete</v-icon>
                                                                </v-btn>
                                                            </v-list-item-action>
                                                        </v-list-item>
                                                    </v-list>
                                                </v-col>
                                            </v-container>
                                            <v-card-actions class="d-flex justify-center gap-2">
                                                <v-btn x-small outlined color="red darken-3"
                                                    @click="newPatient = false">
                                                    Cancelar
                                                </v-btn>
                                                <v-btn outlined elevation="6" color="blue darken-3" x-small
                                                    type="submit">
                                                    Enviar
                                                </v-btn>
                                            </v-card-actions>
                                        </v-form>
                                    </v-card-text>
                                </v-card>
                            </v-menu>
                            <v-menu v-model="newAppointment" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="gray lighten-4" min-width="350px" flat>
                                    <v-toolbar color="blue" dark>
                                        <v-icon class="mr-2">mdi-doctor</v-icon>
                                        <v-toolbar-title>Agende su Cita Médica</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-icon>mdi-calendar-account</v-icon>
                                    </v-toolbar>
                                    <v-card-text>
                                        <div>
                                            - La informaci&oacute;n agregada se enviará al médico.<br>
                                            - Una vez enviado el médico se encargará de asignarle la fecha y le llegará una notificación a usted en su correo.
                                        </div>
                                        <v-form @submit.prevent="saveEnviar" v-model="valid">
                                            <v-container style="height: 20rem; overflow-y: auto;">
                                                
                                                <h4 class="text-center">Datos de la cita: </h4>
                                                 <v-row class="justify-center">
                                                  <v-col
                                                    cols="12"
                                                  >
                                                    <v-select
                                                      :items="typeAppointment"
                                                      label="Tipo de Cita"
                                                      v-model="newTypeAppointment"
                                                    ></v-select>
                                                  </v-col>
                                                </v-row>  
                                                <v-col cols="12">
                                                    <v-text-field v-model="motivo_consulta"
                                                        label="Motivo de la consulta"></v-text-field>
                                                </v-col>
                                                <v-row align="center" no-gutters>
                                                    <v-col cols="10">
                                                        <v-text-field v-model="enfermedad" label="Síntomas" dense
                                                            outlined hide-details
                                                            @keyup.enter="agregarEnfermedad"></v-text-field>
                                                    </v-col>
                                                    <v-col cols="2" class="d-flex align-center justify-center">
                                                        <v-btn color="primary" @click="agregarEnfermedad" icon>
                                                            <v-icon>mdi-plus</v-icon>
                                                        </v-btn>
                                                    </v-col>
                                                </v-row>
                                                <v-col cols="12">
                                                    <v-list>
                                                        <v-list-item v-if="enfermedades.length === 0">
                                                            <v-list-item-content>
                                                                <v-list-item-title>No has registrado
                                                                    síntomas.</v-list-item-title>
                                                            </v-list-item-content>
                                                        </v-list-item>

                                                        <v-list-item v-for="(item, index) in enfermedades" :key="index"
                                                            v-else>
                                                            <v-list-item-content>
                                                                <v-list-item-title>{{ item }}</v-list-item-title>
                                                            </v-list-item-content>
                                                            <v-list-item-action>
                                                                <v-btn icon @click="eliminarEnfermedad(index)">
                                                                    <v-icon>mdi-delete</v-icon>
                                                                </v-btn>
                                                            </v-list-item-action>
                                                        </v-list-item>
                                                    </v-list>
                                                </v-col>
                                            </v-container>
                                            <v-card-actions class="d-flex justify-center gap-2">
                                                <v-btn x-small outlined color="red darken-3"
                                                    @click="newPatient = false">
                                                    Cancelar
                                                </v-btn>
                                                <v-btn outlined elevation="6" color="blue darken-3" x-small
                                                    type="submit">
                                                    Enviar
                                                </v-btn>
                                            </v-card-actions>
                                        </v-form>
                                    </v-card-text>
                                </v-card>
                            </v-menu>
                            <v-menu v-model="abrirModalEditar" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="gray lighten-4" min-width="350px" flat>
                                    <v-toolbar color="blue" dark>
                                        <v-icon class="mr-2">mdi-doctor</v-icon>
                                        <v-toolbar-title>Editar Paciente</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-icon>mdi-calendar-account</v-icon>
                                    </v-toolbar>
                                    <v-card-text>
                                        <div>
                                            - La informaci&oacute;n agregada solo se editará.<br>
                                        </div>
                                        <v-form @submit.prevent="editPatient" v-model="valid">
                                            <v-container style="height: 20rem; overflow-y: auto;">
                                                
                                                <h4 class="text-center">Datos de Contacto: </h4>
                                                <v-col cols="12">
                                                    <v-text-field v-model="firstname" :rules="nameRules" :counter="20"
                                                        label="Nombre" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="phone" :rules="phoneRules" :counter="14"
                                                        label="Telefono" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="email" :rules="emailRules" label="E-mail"
                                                        required></v-text-field>
                                                </v-col>
                                                <h4 class="text-center">Datos del paciente: </h4>
                                                <v-col cols="12">
                                                    <v-text-field v-model="edad" :rules="edadRules" :counter="3"
                                                        label="Edad" required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="peso" :rules="pesoRules" label="Peso(Kg)"
                                                        required></v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                    <v-text-field v-model="estatura" :rules="estaturaRules" :counter="4"
                                                        label="Estatura(Mts)" required></v-text-field>
                                                </v-col>
                                               
                                              
                                            </v-container>
                                            <v-card-actions class="d-flex justify-center gap-2">
                                                <v-btn x-small outlined color="red darken-3"
                                                    @click="abrirModalEditar = false">
                                                    Cancelar
                                                </v-btn>
                                                <v-btn outlined elevation="6" color="blue darken-3" x-small
                                                    type="submit">
                                                    Enviar
                                                </v-btn>
                                            </v-card-actions>
                                        </v-form>
                                    </v-card-text>
                                </v-card>
                            </v-menu>
                        </v-sheet>
                    </v-col>
                </v-row>             
            </v-container>
            <v-footer class="mt-5" color="blue accent-3" padless>
                <v-row justify="center" no-gutters>

                    <v-col class="blue accent-3 py-4 text-center white--text" cols="12">
                        <a class="white--text" :href="policys">Privacidad</a> &middot;
                        <a class="white--text" :href="terms">Terminos y Condiciones</a> &middot;
                        <a class="white--text" :href="cooki">Politica de Cookies</a> &middot;
                        <a class="white--text" :href="manual">Manual de Usuario</a>
                    </v-col>
                    <v-col class="blue accent-3 py-4 text-center white--text" cols="12">
                        {{ new Date().getFullYear() }} — <strong>tumedibot.com</strong>
                    </v-col>
                </v-row>
            </v-footer>
        </v-main>
    </v-app>
</template>

<script>
import Swal from 'sweetalert2';
export default {
    data: () => ({
        value: '',
        href: null,
        hrefb: null,
        hrefc: null,
        hrefd: null,
        policys: null,
        terms: null,
        cooki: null,
        search: null,
        manual: null,
        newPatient:false,
        id_patient:null,
        typeAppointment:['Presencial','Videoconferencia'],
        newTypeAppointment: null,
        newAppointment:false,
        abrirModalEditar:false,
        items: ['30', '60'],
        itemss: [
            {
                text: 'Perfil Médico',
                disabled: false,
                href: null,
            },
            {
                text: 'Buscar Médicos',
                disabled: false,
                href: null,
            },
        ],
        selectedItem: '30',
        events: [],
        eventsp: [],
        colors: ['#2196F3', '#3F51B5', '#673AB7', '#00BCD4', '#4CAF50', '#FF9800', '#757575'],
        names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'horario', 'Birthday', 'Conference', 'Party'],
        selectedEvent: {},
        title: null,
        selectedElement: null,
        selectedOpen: false,
        dragEvent: null,
        dragStart: null,
        hou: null,
        ruta: '/web/lista_medico/',
        nombre: null,
        nombre_paciente: null,
        tlf_paciente: null,
        email_paciente: null,
        medico_id: null,
        paciente: null,
        pacientetwo: null,
        ending: null,
        color: null,
        timed: null,
        createEvent: null,
        createStart: null,
        extendOriginal: null,
        name: null,
        faf: false,
        valid: false,
        valueb: 0,
        tiempito: null,
        firstname: '',
        phone: '',
        proveMa:false,
                headers: [
            {
                text: 'Nombre del Paciente',
                align: 'center',
                sortable: false,
                value: 'nombre_paciente',
            },
            { text: 'Teléfono', value: 'tlf_paciente', align: 'center', },
            { text: 'Correo', value: 'email_paciente', align: 'center', },
            { text: 'Edad', value: 'edad', align: 'center', },
            { text: 'Peso', value: 'peso', align: 'center', },
            { text: 'Estatura', value: 'estatura', align: 'center', },
            { text: 'Acciones', value: 'notes', align: 'center', }
        ],
        pacientes: [],
        nameRules: [
            v => !!v || 'Nombre es obligatorio',
            v => v.length <= 20 || 'Nombre debe tener mínimo 20 caracteres',
        ],
        phoneRules: [
            v => !!v || 'Telefono es obligatorio',
            v => v.length <= 14 || 'Telefono debe tener máximo 14 números',
            v => /[0-9]/.test(v) || 'Telefono debe ser números',

        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail es obligatorio',
            v => /.+@.+/.test(v) || 'E-mail debe tener un @',
        ],
        edad: '',
        edadRules: [
            v => !!v || 'Edad es obligatorio',
            v => v.length <= 3 || 'Edad debe tener máximo 3 números',
            v => /[0-9]/.test(v) || 'Edad debe ser números',
        ],
        peso: '',
        pesoRules: [
            v => !!v || 'Peso es obligatorio',
        ],
        estatura: '',
        estaturaRules: [
            v => !!v || 'Estatura es obligatorio',
            v => v.length <= 4 || 'Estatura debe tener máximo 4 caracteres',
        ],
        motivo_consulta: '',
        enfermedad: '',
        enfermedades: [],
    }),
    props: {
        medico: { type: String },
        medico_nombre: { type: String },
        medico_apellido: { type: String },
        especialidad: { type: String },
        calendario_id: { type: String },
        ma:{type: String},
    },
    computed: {
        medico_name: function () {
            return this.medico_nombre.toUpperCase()
        },
        medico_lastname: function () {
            return this.medico_apellido.toUpperCase()
        },
    },
    mounted() {
        this.title = this.$refs.calendar.title
        this.fetchApiProbe()
        this.fetchApiProbePatient()
        this.ma !== 'si' ? this.proveMa = true : this.proveMa = false
    },
    created() {
        this.fetchApiProbe()
    },
    methods: {
        obtenerIdPosterior() {
      const rutaCompleta = window.location.href;
      const partes = rutaCompleta.split('/');
      const partesFiltradas = partes.filter(parte => parte !== '');
      const indiceMedico = partesFiltradas.indexOf('medico');

      if (indiceMedico !== -1 && indiceMedico + 2 < partesFiltradas.length) {
        return partesFiltradas[indiceMedico + 2].split('#')[0];
      }

      return null;
    },
    obtenerIdMedicoDesdeRuta() {
          const rutaCompleta = window.location.href;
          const partes = rutaCompleta.split('/');
          const partesFiltradas = partes.filter(parte => parte !== '');
          const indiceMedico = partesFiltradas.indexOf('medico');

          if (indiceMedico !== -1 && indiceMedico + 1 < partesFiltradas.length) {
            return partesFiltradas[indiceMedico + 1];
          }

          return null;
        },
     /*   startDrag({ event, timed }) {
            if (event && timed) {
                this.dragEvent = event
                this.dragTime = null
                this.extendOriginal = null
            }
        },*/
        delete_calendar(id) {
            if (confirm('Esta seguro de eliminar?')) {
                fetch(`/api/calendar/delete/${this.hou}`, {
                    method: 'delete'
                })
                    .then(res => res.json)
                    .then(data => {
                        this.selectedOpen = false
                        this.fetchApiProbe();
                    })
                    .catch(err => console.log(err));
            }
        },
        changeState(valor) {
            this.selected = this.selectedItem
            return this.selected
        },
      /*  roundTime(time, down = true) {
            const roundTo = 15 // minutes
            const roundDownTime = roundTo * 60 * 1000
            return down
                ? time - time % roundDownTime
                : time + (roundDownTime - (time % roundDownTime))
        },
        toTime(tms) {
            return new Date(tms.year, tms.month - 1, tms.day, tms.hour, tms.minute).getTime()
        },
        toTime2(tms, i) {
            return new Date(tms.year, tms.month - 1, tms.day + i, tms.hour, tms.minute).getTime()
        },*/
        saveEnviar(){
            console.log('pacientes:',this.pacientes[0].id)
            console.log('id_medico:',this.obtenerIdMedicoDesdeRuta())
             const requiredFields = {
                motivo_consulta: 'Motivo de consulta',
                newTypeAppointment:'Tipo de cita'
            };
            for (const field in requiredFields) {
                if (!this[field]) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `${requiredFields[field]} es obligatorio.`,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    return;
                }
            }
            this.createEvent = {
                id_paciente: this.pacientes[0].id,
                sintomas: this.enfermedades.join(", "),
                motivo_consulta: this.motivo_consulta,
                newTypeAppointment: this.newTypeAppointment,
                id_medico: this.obtenerIdMedicoDesdeRuta()
            };
              fetch('/api/calendar_doctor/store/data_paciente_for_date', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(this.createEvent)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Paciente creado/actualizado',
                            text: 'Los datos del paciente se han guardado correctamente. Se enviará la información al médico',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            this.enfermedades = [];
                            this.motivo_consulta = '';
                            this.newTypeAppointment = '';
                            this.fetchApiProbe();
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Guardado Correctamente',
                            text: data.message || 'Error al guardar los datos del paciente.',
                        });
                        console.error('Error al guardar datos:', data);
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error de conexión con el servidor.',
                    });
                    console.error('Error de conexión:', error);
                });

        },
        updateAppointment() {
            const requiredFields = {
                firstname: 'Nombre',
                phone: 'Teléfono',
                email: 'Email',
                edad: 'Edad',
                peso: 'Peso',
                estatura: 'Estatura',
                motivo_consulta: 'Motivo de consulta',
                newTypeAppointment:'Tipo de cita'
            };
            for (const field in requiredFields) {
                if (!this[field]) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `${requiredFields[field]} es obligatorio.`,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    return;
                }
            }
            this.createEvent = {
                id_cita: this.hou,
                nombre: this.firstname,
                telefono: this.phone,
                email: this.email,
                edad: this.edad,
                peso: this.peso,
                estatura: this.estatura,
                sintomas: this.enfermedades.join(", "),
                motivo_consulta: this.motivo_consulta,
                newTypeAppointment: this.newTypeAppointment,
                id_medico: this.obtenerIdMedicoDesdeRuta()
            };
            fetch('/api/calendar_doctor/store/data_paciente', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(this.createEvent)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Paciente creado/actualizado',
                            text: 'Los datos del paciente se han guardado correctamente. Se enviará la información al médico',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            this.newPatient = false,
                            this.firstname = '';
                            this.phone = '';
                            this.email = '';
                            this.edad = '';
                            this.peso = '';
                            this.estatura = '';
                            this.enfermedades = [];
                            this.motivo_consulta = '';
                            this.newTypeAppointment = '';
                            this.fetchApiProbe();
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Guardado Correctamente',
                            text: data.message || 'Error al guardar los datos del paciente.',
                        });
                        console.error('Error al guardar datos:', data);
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error de conexión con el servidor.',
                    });
                    console.error('Error de conexión:', error);
                });
        },
        fetchApiProbePatient() {
            fetch('/api/patients/', {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.pacientes = response.dato;
                      const id = this.obtenerIdPosterior();
                      let ultimoPacienteId;

                      for (let i = 0; i < this.pacientes.length; i++) {
                        const paciente = this.pacientes[i];
                        console.log('Paciente (for):', paciente.user_id);
                        ultimoPacienteId = paciente.user_id;
                      }
                      console.log('Paciente (for) último user_id:', ultimoPacienteId);

                      // Filtramos el array 'this.pacientes' para obtener solo los que tienen user_id igual a 'id'
                      this.pacientes = this.pacientes.filter(paciente => paciente.user_id == id);
                      console.log('Pacientes filtrados:', this.pacientes);

                      if (id == ultimoPacienteId) {
                        console.log('El ID obtenido coincide con el user_id del último paciente.');
                      } else {
                        console.log('El ID obtenido no coincide con el user_id del último paciente.');
                      }


                })
                .catch(err => { console.log(err) });
        },

      async fetchApiProbe() {
            try {
                const response = await fetch(`/api/fetchAppointments/${this.medico}`, {
                    headers: { 'Content-Type': 'Application/json' }
                });
                const data = await response.json();
                this.events = data.dato
                    .filter(event => event.estado !== 3)
                    .map(event => ({
                        ...event,
                        start: new Date(event.start),
                        end: new Date(event.end),
                        timed: true
                    }));
            } catch (err) {
                console.error("Error al obtener eventos:", err);
            }
        },

        formatDate(date) {
            const parsedDate = new Date(date);
            const day = String(parsedDate.getDate()).padStart(2, '0');
            const month = String(parsedDate.getMonth() + 1).padStart(2, '0');
            const year = parsedDate.getFullYear();
            const hours = String(parsedDate.getHours()).padStart(2, '0');
            const minutes = String(parsedDate.getMinutes()).padStart(2, '0');
            return `${day}/${month}/${year} a las ${hours}:${minutes}`;
        },

        prev() {
            this.$refs.calendar.prev()
            this.title = this.$refs.calendar.title
        },
        next() {
            this.$refs.calendar.next()
            this.title = this.$refs.calendar.title
        },
      /*  mouseMove(tms) {
            const mouse = this.toTime(tms)
            if (this.dragEvent && this.dragTime !== null) {

                const start = this.dragEvent.start
                const end = this.dragEvent.end
                const duration = end - start
                const newStartTime = mouse - this.dragTime
                const newStart = this.roundTime(newStartTime)
                const newEnd = newStart + duration
                this.dragEvent.start = newStart
                this.dragEvent.end = newEnd
            } else
                if (this.createEvent && this.createStart !== null) {

                    const mouseRounded = this.roundTime(mouse, false)
                    const min = Math.min(mouseRounded, this.createStart)
                    const max = Math.max(mouseRounded, this.createStart)
                    this.createEvent.start = min
                    this.createEvent.end = max
                }
        },
        endDrag() {
            this.dragTime = null
            this.dragEvent = null
            this.createStart = null
            this.extendOriginal = null
        },
        cancelDrag() {
            if (this.createEvent) {
                if (this.extendOriginal) {
                    this.createEvent.end = this.extendOriginal
                } else {
                    const i = this.events.indexOf(this.createEvent)
                    if (i !== -1) {
                        this.events.splice(i, 1)
                    }
                }
            }
            this.createStart = null
            this.dragTime = null
            this.dragEvent = null
        },*/
        getEventColor(event) {
            return event.estado == 2 ? 'blue' : event.color;
        },
        editPatient(){
              const requiredFields = {
                firstname: 'Nombre',
                phone: 'Teléfono',
                email: 'Email',
                edad: 'Edad',
                peso: 'Peso',
                estatura: 'Estatura',
            };
            for (const field in requiredFields) {
                if (!this[field]) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `${requiredFields[field]} es obligatorio.`,
                        timer: 1000,
                        showConfirmButton: false
                    });
                    return;
                }
            }
            this.createEvent = {
                nombre: this.firstname,
                telefono: this.phone,
                email: this.email,
                edad: this.edad,
                peso: this.peso,
                estatura: this.estatura,
                id_paciente: this.pacientes[0].id,
            };
            fetch('/api/calendar_doctor/edit/editPatient', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(this.createEvent)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Paciente creado/actualizado',
                            text: 'Los datos del paciente se han guardado correctamente.',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            this.abrirModalEditar = false,
                            this.firstname = '';
                            this.phone = '';
                            this.email = '';
                            this.edad = '';
                            this.peso = '';
                            this.estatura = '';
                            this.fetchApiProbe();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'error al guardar',
                            text: data.message || 'Error al guardar los datos del paciente.',
                        });
                        console.error('Error al guardar datos:', data);
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error de conexión con el servidor.',
                    });
                    console.error('Error de conexión:', error);
                });

        },
        showEvent({ nativeEvent, event }) {
            if (event.estado == 1) {
                const open = () => {
                    this.selectedEvent = event;
                    this.selectedElement = nativeEvent.target;
                    this.hou = event.id;
                    this.nombre = this.selectedEvent.name;
                    this.pacientetwo = this.selectedEvent.paciente;
                    this.color_paciente = '#cc0000';
                    requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen = true));
                };
                if (this.selectedOpen) {
                    this.selectedOpen = false;
                    requestAnimationFrame(() => requestAnimationFrame(() => open()));
                } else {
                    open();
                }
                nativeEvent.stopPropagation();
            }
        },
      /*  rnd(a, b) {
            return Math.floor((b - a + 1) * Math.random()) + a
        },
        rndElement(arr) {
            return arr[this.rnd(0, arr.length - 1)]
        },*/
        agregarEnfermedad() {
            if (this.enfermedad.trim() !== "") {
                this.enfermedades.push(this.enfermedad.trim());
                this.enfermedad = "";
            }
        },
        eliminarEnfermedad(index) {
            this.enfermedades.splice(index, 1);
        }
    },
}
</script>
<style scoped lang="scss">
.v-event-draggable {
    padding-left: 6px;
}

.v-event-timed {
    user-select: none;
    -webkit-user-select: none;
}

.v-event-drag-bottom {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 4px;
    height: 4px;
    cursor: ns-resize;

    &::after {
        display: none;
        position: absolute;
        left: 50%;
        height: 4px;
        border-top: 1px solid white;
        border-bottom: 1px solid white;
        width: 16px;
        margin-left: -8px;
        opacity: 0.8;
        content: '';
    }

    &:hover::after {
        display: block;
    }
}
</style>
