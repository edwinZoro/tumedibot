<template>
    <v-container>
        <v-app>
            <v-app-bar app color="primary
      " dark>
                <div class="d-flex align-center">
                    <v-img alt="Vuetify Logo" class="shrink mr-2" src="https://ed.tumedibot.com/medibot_f.png" contain
                        transition="scale-transition" width="40" />

                </div>
                <div class="white--text">
                    <v-btn fab text small color="blue accent-1 " @click="redirected">
                        <v-icon>
                            mdi-chevron-left
                        </v-icon>
                    </v-btn>
                </div>

                <v-spacer></v-spacer>

                <v-toolbar-title :title="title" class="white--text">Calendario tumedibot</v-toolbar-title>

            </v-app-bar>

            <v-main>
                <h3 class="mt-5 blue--text d-flex justify-center">Configura Calendario</h3>
                <v-container>

                    <v-toolbar flat class="blue accent-3">
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
                        <v-toolbar-title :title="title"
                            class="white--text text-sm-body-2 mr-2">{{ title }}</v-toolbar-title>
                        <v-row color="white">
                            <v-col class="d-flex" cols="12" sm="6" color="white">
                                <v-select v-model="selectedItem" :items="items" @change="(valor) => changeState(valor)"
                                    prepend-icon="mdi-doctor" hide-details class="ma-2" label="Minutos de la Cita"
                                    color="blue accent-1" item-color='blue accent-3' dense></v-select>
                            </v-col>
                        </v-row>
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
                                    interval-count="13" v-model="value" color="blue accent-2" type="week"
                                    :events="events" :event-color="getEventColor" :event-ripple="false"
                                    @click:event="showEvent" @mousedown:event="startDrag" @mousedown:time="startTime"
                                    @mousemove:time="mouseMove" @mouseup:event="endDrag"
                                    @mouseleave.native="cancelDrag">
                                    <template v-slot:event="{ event, timed, eventSummary }">
                                        <div class="v-event-draggable" v-html="eventSummary()"></div>
                                        <div v-if="timed" class="v-event-drag-bottom"
                                            @mousedown.stop="extendBottom(event)"></div>
                                    </template>
                                </v-calendar>
                                <v-menu v-model="selectedOpen" :close-on-content-click="false"
                                    :activator="selectedElement" offset-x>
                                    <v-card color="grey lighten-4" min-width="350px" flat>
                                        <v-toolbar :color="selectedEvent.color" dark>

                                            <v-btn @click='delete_calendar' icon>
                                                <v-icon>mdi-delete</v-icon>
                                            </v-btn>

                                            <v-toolbar-title>Eliminar Evento</v-toolbar-title>
                                            <v-spacer></v-spacer>
                                            <v-icon class="mr-2">mdi-calendar-remove</v-icon>

                                            <!-- <v-icon>mdi-dots-vertical</v-icon> -->

                                        </v-toolbar>
                                        <v-card-text>
                                            <div v-if="pac !== null">
                                                <v-list>
                                                    <v-list-item><small>Ocupado por el paciente:</small> <b
                                                            class="mr-2 blue--text">{{ firstname }}.</b></v-list-item>
                                                    <v-list-item><small>Puede comunicarse al siguiente tlf:</small> <b
                                                            class="mr-2 blue--text">{{ phone }}</b></v-list-item>
                                                </v-list>
                                            </div>
                                            <!--   <v-form v-model="valid">
    <v-container>
      <v-row>
        <div>
          - La informaci&oacute;n agregada se enviará al médico.<br>
          - Contacte al médico.
        </div>
        <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="firstname"
            :rules="nameRules"
            :counter="10"
            label="Nombre"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="phone"
            :rules="phoneRules"
            :counter="11"
            label="Telefono"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>
              <v-col
          cols="12"
          md="3"
        >
            <v-btn
            class="mt-7"
            outlined
            elevation="6"
            color="blue darken-3"
        x-small
        type="submit"
      >
        enviar
      </v-btn>
      </v-col>
      </v-row>
    </v-container>
  </v-form> -->
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-btn x-small outlined color="red darken-3" @click="selectedOpen = false">
                                                Cancelar
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-menu>
                            </v-sheet>
                        </v-col>
                    </v-row>
                    <v-divider></v-divider>
                    <template>
                        <h3 class="mt-5 blue--text d-flex justify-center">Tabla de Citas de Pacientes</h3>
                        <v-card class="mt-5 blue accent-3">
                            <v-card-title class="white--text">
                                Citas Pendientes
                                <v-spacer></v-spacer>
                                <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                                    hide-details></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="headers" :items="pacientes" :search="search"></v-data-table>
                        </v-card>
                    </template>
                </v-container>

            </v-main>
        </v-app>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        value: '',
        items: ['15', '30', '45', '60'],
        itemss: [
            {
                text: 'Dashboard',
                disabled: false,
                href: 'area_medico/107',
            },
            {
                text: 'Link 1',
                disabled: false,
                href: 'breadcrumbs_link_1',
            },
            {
                text: 'Link 2',
                disabled: true,
                href: 'breadcrumbs_link_2',
            },
        ],
        selectedItem: '30',
        events: [],
        colors: ['#2196F3', '#3F51B5', '#673AB7', '#00BCD4', '#4CAF50', '#FF9800', '#757575'],
        names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'horario', 'Birthday', 'Conference', 'Party'],
        selectedEvent: {},
        title: null,
        selectedElement: null,
        selectedOpen: false,
        dragEvent: null,
        dragStart: null,
        hou: null,
        pac: null,
        medico_id: null,
        ending: null,
        createEvent: null,
        createStart: null,
        extendOriginal: null,
        name: null,
        valid: false,
        firstname: '',
        phone: '',
        nameRules: [
            v => !!v || 'Nombre es obligatorio',
            v => v.length <= 10 || 'Nombre debe tener mínimo 10 caracteres',
        ],
        phoneRules: [
            v => !!v || 'Telefono es obligatorio',
            v => v.length <= 11 || 'Telefono debe tener mínimo 11 caracteres',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail es obligatorio',
            v => /.+@.+/.test(v) || 'E-mail debe tener un @',
        ],

        search: '',
        headers: [
            {
                text: 'Nombre del Paciente',
                align: 'center',
                sortable: false,
                value: 'nombre_paciente',
            },
            { text: 'Teléfono', value: 'tlf_paciente', align: 'end', },
            { text: 'Correo', value: 'email_paciente', align: 'end', },
            { text: 'Fecha de Cita', value: 'start', align: 'end', }
        ],
        pacientes: [],
    }),
    props: {
        medico: { type: String },
    },
    mounted() {
        this.$refs.calendar.scrollToTime('08:00')
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
            const roundTo = 30 // minutes
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
        storeCalendar() {
            fetch('/api/calendar_doctor/store/', {
                method: 'post',
                body: JSON.stringify(this.createEvent),
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.ok ? response.json() : Promise.reject(response))
                .then(response => {
                    this.events.push(this.createEvent);
                    this.fetchApiProbe()
                })
                .catch(err => { console.log(err) })
        },
        startTime(tms) {
            const mouse = this.toTime(tms)
            const e = this.changeState()
            if (this.dragEvent && this.dragTime === null) {
                const start = this.dragEvent.start
                this.dragTime = mouse - start
            } else {
                this.createStart = this.roundTime(mouse)
                const fixty = 900000
                const zerty = 1800000
                const forty = 2700000
                const sixty = 3600000
                if (e == 15) {
                    this.ending = fixty
                } else if (e == 30) {
                    this.ending = zerty
                } else if (e == 45) {
                    this.ending = forty
                } else if (e == 60) {
                    this.ending = sixty
                }
                this.createEvent = {
                    name: `hora:`,
                    color: this.rndElement(this.colors),
                    start: this.createStart,
                    end: this.createStart + this.ending,
                    timed: true,
                    medico: this.medico,
                }
                this.events.push(this.createEvent)
                this.storeCalendar()
            }

        },
        /*        for(let i=7;i<=21;i+=7){
                  const mouse2 = this.toTime2(tms,i)
                 if (this.dragEvent && this.dragTime === null) {
                    const start = this.dragEvent.start
                    this.dragTime = mouse2 - start
                 }
                 else{
                    this.createStart2 = this.roundTime(mouse2)
                    this.createEvent2 = {
                    name: `hora`,
                    color: this.rndElement(this.colors),
                    start:this.createStart2,
                    end: this.createStart2,
                    timed: true,
                  }
                  this.events.push(this.createEvent2)
                  this.events.push(this.createEvent)
                  fetch('/api/calendar_doctor/store/',{
                    method:'post',
                    body:JSON.stringify(this.createEvent2),
                    headers: {
                      'Content-Type': 'Application/json'
                    },
                  })
                  .then(response => response.json())
                  .then(response => this.events.push(this.createEvent2))
                  .catch(err=>{console.log(err)})
                  }
                  }*/
        fetchApiProbe() {
            fetch('/api/calendar_doctor/', {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.events = response.dato.filter((response) => { return response.medico_id == this.medico })
                    this.pacientes = response.dato.filter((response) => { return response.medico_id == this.medico && response.paciente == 'parked' })
                    for (var i = 0; i < this.pacientes.length; ++i) {
                        let date = new Date(this.pacientes[i].start)
                        let a = new Date(`${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}-${date.getHours()}:${date.getMinutes()}`)
                        this.pacientes[i].start = a
                    }
                })
                .catch(err => { console.log(err) })
        },

        redirected() {
            fetch('/api/calendar_doctor/back')
                .catch(err => { console.log(err) })
        },


        prev() {
            this.$refs.calendar.prev()
            this.title = this.$refs.calendar.title
        },
        next() {
            this.$refs.calendar.next()
            this.title = this.$refs.calendar.title
        },
        extendBottom(event) {
            this.createEvent = event
            this.createStart = event.start
            this.extendOriginal = event.end
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
            const rgb = parseInt(event.color.substring(1), 16)
            const r = (rgb >> 16) & 0xFF
            const g = (rgb >> 8) & 0xFF
            const b = (rgb >> 0) & 0xFF

            return event === this.dragEvent
                ? `rgba(${r}, ${g}, ${b}, 0.7)`
                : event === this.createEvent
                    ? `rgba(${r}, ${g}, ${b}, 0.7)`
                    : event.color
        },
        showEvent({ nativeEvent, event }) {
            const open = () => {
                this.selectedEvent = event
                this.selectedElement = nativeEvent.target

                this.hou = this.selectedEvent.id
                this.firstname = this.selectedEvent.nombre_paciente
                this.pac = this.selectedEvent.paciente
                this.phone = this.selectedEvent.tlf_paciente
                requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen = true))
            }

            if (this.selectedOpen) {
                this.selectedOpen = false
                requestAnimationFrame(() => requestAnimationFrame(() => open()))
            } else {
                open()
            }

            nativeEvent.stopPropagation()
        },

        rnd(a, b) {
            return Math.floor((b - a + 1) * Math.random()) + a
        },
        rndElement(arr) {
            return arr[this.rnd(0, arr.length - 1)]
        },
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
