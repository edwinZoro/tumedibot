<template>
    <v-app>
        <v-app-bar app>
            <v-tabs background-color="blue accent-3" centered dark icons-and-text>
                <v-tabs-slider></v-tabs-slider>

                <v-tab :href="hrefb">
                    Principal
                    <v-icon>mdi-home</v-icon>
                </v-tab>
                <v-tab :href="`/perfil_medico/${this.medico}`">
                    Perfil Médico
                    <v-icon>mdi-doctor</v-icon>
                </v-tab>
                <v-tab :href="hrefc">
                    Buscar Médicos
                    <v-icon>mdi-hospital-box</v-icon>
                </v-tab>
                <v-tab :href="hrefd">
                    Empresas de Salud
                    <v-icon>mdi-hospital-building</v-icon>
                </v-tab>
            </v-tabs>
        </v-app-bar>
        <!--
 <v-app-bar
      app
      color="darken-3"
      dark
    >
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          src="https://tumedibot.com/medibot_f.png"
          contain
          transition="scale-transition"
          width="40"
        />

      </div>

   <v-breadcrumbs divider="-" :items="itemss" class="white--text d-inline-block text-truncate mr-2" ></v-breadcrumbs>

      <div :items="itemss" class="white--text d-inline-block text-truncate">Dr/a {{medico_name}} {{medico_lastname}} - Especialista en {{especialidad}} </div>
      <v-spacer></v-spacer>

  <v-toolbar-title  :title="title" class="white--text">Agende su Cita Médica</v-toolbar-title>

    </v-app-bar> -->
        <v-main>
            <v-container>
                <h4 class="mt-5 blue--text d-flex justify-center">{{ medico_name }} {{ medico_lastname }} - Especialista
                    en
                    {{ especialidad }}</h4>
                <div>
                    <v-card class="blue accent-3 mt-5">
                        <h6 class="p-2 white--text d-flex justify-center">Instrucciones para usar Calendario de Citas
                            Médicas</h6>
                        <ul class="white--text ">
                            <li>Presione sobre el botón de cita.</li>
                            <li>Llene los datos del formulario, sólo si esta seguro de querer agendar cita médica.</li>
                            <li>Una vez enviado el formulario, ponganse en contacto con el médico.</li>
                        </ul>
                    </v-card>
                </div>
                <v-row no-gutters class="mt-5">
                    <v-col md="6" offset-md="3">
                        <v-alert border="top" colored-border type="info" elevation="2" v-if="valueb != 0"
                            :valueb="valueb" class="m-2 p-2">
                            Agendo Una Cita Con El Dr/a {{ medico_name }} {{ medico_lastname }} Correctamente. Pongase
                            en
                            contacto con el m&eacute;dico.
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
                    <!-- <v-row color="white">
  <v-col
        class="d-flex"
        cols="12"
        sm="6"
        color="white">
        <v-select
        v-model="selectedItem"
        :items="items"
        @change="(valor) => changeState(valor)"
        prepend-icon="mdi-doctor"
        hide-details
        class="ma-2"
        label="Minutos de la Cita"
        color="blue accent-1"
        item-color='blue accent-3'
        dense
        ></v-select>
  </v-col>
    </v-row> -->
                    <v-spacer></v-spacer>
                    <!-- <v-btn
x-small
outlined
color='white'
class="mr-1"
@click:event="storeCalendar"
disabled
>
  Guardar
</v-btn>
<v-btn
@click='deleteHora'
x-small
outlined
color='white'
disabled
>
eliminar
</v-btn> -->
                </v-toolbar>
                <v-row class="fill-height">
                    <v-col>
                        <v-sheet height="600">
                            <v-calendar ref="calendar" locale="es" :weekdays="[1, 2, 3, 4, 5, 6, 0]" first-interval="7"
                                interval-count="13" v-model="value" color="blue accent-2" type="week" :events="events"
                                :event-color="getEventColor" :event-ripple="false" @click:event="showEvent">
                                <template v-slot:event="{ event, timed, eventSummary }">
                                    <span>
                                        {{ event.estado !== 2 ? formatDate(event.start) : '' }}
                                        <p v-if="event.estado === 2" class="text-center">OCUPADO</p>
                                    </span>
                                </template>
                            </v-calendar>
                            <v-menu v-model="selectedOpen" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="grey lighten-4" min-width="350px" flat>
                                    <v-toolbar :color="selectedEvent.color" dark>
                                        <v-icon class="mr-2">mdi-doctor</v-icon>
                                        <v-toolbar-title>Agende su Cita Médica</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-icon>mdi-calendar-account</v-icon>
                                    </v-toolbar>
                                    <v-card-text>
                                        <div>
                                            - La informaci&oacute;n agregada se enviará al médico.<br>
                                            - Sí agenda una cita. Contacte al médico inmediatamente.
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
                                                    @click="selectedOpen = false">
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
        manual: null,
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
    },
    created() {
        this.fetchApiProbe()
    },
    methods: {
        startDrag({ event, timed }) {
            if (event && timed) {
                this.dragEvent = event
                this.dragTime = null
                this.extendOriginal = null
            }
        },
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
        roundTime(time, down = true) {
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
        },
        updateAppointment() {
            const requiredFields = {
                firstname: 'Nombre',
                phone: 'Teléfono',
                email: 'Email',
                edad: 'Edad',
                peso: 'Peso',
                estatura: 'Estatura',
                motivo_consulta: 'Motivo de consulta'
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
                            text: 'Los datos del paciente se han guardado correctamente.',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => {
                            this.selectedOpen = false,
                                this.firstname = '';
                            this.phone = '';
                            this.email = '';
                            this.edad = '';
                            this.peso = '';
                            this.estatura = '';
                            this.enfermedades = [];
                            this.motivo_consulta = '';
                            this.fetchApiProbe();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
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
        fetchApiProbe() {
            fetch(`/api/fetchAppointments/${this.medico}`, {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.events = response.dato;
                    this.href = `/perfil_medico/${this.medico}`
                    this.hrefb = `/diseaseRobot/`
                    this.hrefc = `/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador/`
                    this.hrefd = `/lista_de_empresas_de_salud_disponibles_en_tumedibot.com/Super_Buscador_Empresarial/`
                    this.policys = `/politicas/privacidad/`
                    this.terms = `/terminos/y/condiciones/`
                    this.cooki = `/cookies/politicas/`
                    this.manual = `/manual_de_usuario/`
                })
                .catch(err => { console.log(err) })
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
        mouseMove(tms) {
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
        },
        getEventColor(event) {
            return event.estado == 2 ? 'red' : event.color;
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
        rnd(a, b) {
            return Math.floor((b - a + 1) * Math.random()) + a
        },
        rndElement(arr) {
            return arr[this.rnd(0, arr.length - 1)]
        },
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
