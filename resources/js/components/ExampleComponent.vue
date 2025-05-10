<template>
    <v-app>
      <navigation-doctor />
        <v-main>
            <v-container>
                <h3 class="mt-5 teal--text d-flex justify-center">Calendario Médico de Citas</h3>
                    <h5 class="mt-5 teal--text text-accent-4 d-flex justify-center">Se reflejan todas las citas activas guardadas desde pacientes. (<span class="red--text darken-3">Solo Se Asignan Citas Desde Pacientes.</span>)</h5>
              <!--  <v-expansion-panels>
                    <v-expansion-panel v-for="(item, i) in instruc.text" :key="i" class="teal accent-4 white--text">
                        <v-expansion-panel-header>
                            Desplegar
                        </v-expansion-panel-header>
                        <v-expansion-panel-content>
                            {{ item }}
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>-->
            </v-container>
            <div class="text-center">
                <v-progress-circular v-if="valueb != 0" :rotate="-90" :size="70" :width="10" :valueb="valueb"
                    color="blue" indeterminate>
                    {{ valueb }}
                </v-progress-circular>
                <p class="blue--text" v-if="valueb != 0">Estamos Creando los Botones de Cita para su selección. Gracias
                    por esperar y ser paciente.</p>
            </div>
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
                    <v-toolbar-title :title="title" class="white--text text-sm-body-2 mr-2">{{ title
                        }}</v-toolbar-title>
                  <!--  <v-row color="white" class="">
                        <v-col class="d-flex white-text" cols="6" sm="3" color="white">
                            <v-select v-model="selectedItem" :items="items" @change="changeState"
                                prepend-icon="mdi-timer-outline" hide-details class="ma-2 grey lighten-3"
                                color="blue accent-1" item-color='blue accent-3' dense></v-select>
                        </v-col>
                        <v-col class="d-flex" cols="6" sm="3" color="white--text">
                            <v-select v-model="selectedItemb" :items="item" @change="changeStateb"
                                prepend-icon="mdi-wallet-plus-outline" hide-details
                                class="ma-2 grey lighten-3 indigo--text" color="blue accent-1 indigo--text"
                                item-color='blue accent-3' dense></v-select>
                        </v-col>
                    </v-row>-->
                    <v-spacer></v-spacer>
                </v-toolbar>
                <v-row class="fill-height">
                    <v-col>

                        <v-sheet height="600">
                            <v-calendar ref="calendar" locale="es" :weekdays="[1, 2, 3, 4, 5, 6, 0]" first-interval="0"
                                interval-count="24" v-model="value" color="primary" type="week" :events="events"
                                :event-color="getEventColor" @click:event="showEvent">
                                <!-- @mousedown:event="startDrag"
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
                            <v-menu v-model="selectedOpen" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="grey lighten-4" min-width="400px" flat>
                                    <v-toolbar
                                        :color="selectedEvent.paciente ? getEventColor(selectedEvent) : selectedEvent.color"
                                        dark class="px-4">
                                        <div class="d-flex align-center">
                                            <v-btn @click="delete_calendar(selectedEvent.id)" icon>
                                                <v-icon>mdi-delete</v-icon>
                                            </v-btn>
                                            <span class="ml-2 text-subtitle-1">Eliminar</span>
                                        </div>
                                        <v-spacer></v-spacer>
                                        <template v-if="selectedEvent.estado == 1">
                                            <div class="d-flex align-center">
                                                <v-btn @click="selectPatient(selectedEvent)" icon>
                                                    <v-icon>mdi-account-plus</v-icon>
                                                </v-btn>
                                                <span class="ml-2 text-subtitle-1">Agregar paciente</span>
                                            </div>
                                        </template>
                                    </v-toolbar>
                                    <v-card-text>
                                        <div v-if="selectedEvent.paciente !== null">
                                            <v-list>
                                                <v-list-item><small>Ocupado por el paciente:</small> <b
                                                        class="mr-2 blue--text">{{
                                                            selectedEvent.paciente?.nombre_paciente }}.</b></v-list-item>
                                                <v-list-item><small>Puede comunicarse al siguiente tlf:</small> <b
                                                        class="mr-2 blue--text">{{ selectedEvent.paciente?.tlf_paciente
                                                        }}</b></v-list-item>
                                            </v-list>
                                        </div>
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
                <!-- Modal para la gestión de citas -->
                <v-dialog v-model="attendAppointment" max-width="800px">
                    <v-card color="lighten-4">
                        <v-toolbar dark>
                            <v-icon class="mr-2">mdi-medical-bag</v-icon>
                            <v-toolbar-title>Atender Cita de {{ selectedAppointment?.paciente?.nombre_paciente
                                }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-card color="lighten-4">
                            <v-container style="height: 30rem; overflow-y: auto;">
                                <v-row class="justify-center gap-4 mt-4">
                                    <v-card class="pa-4" style="width: 90%;">
                                        <v-list dense>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-account</v-icon>
                                                <strong>Nombre:</strong> {{
                                                    selectedAppointment?.paciente?.nombre_paciente }}
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-phone</v-icon>
                                                <strong>Teléfono:</strong> {{
                                                    selectedAppointment?.paciente?.tlf_paciente }}
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-email</v-icon>
                                                <strong>Email:</strong> {{ selectedAppointment?.paciente?.email_paciente
                                                }}
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-calendar</v-icon>
                                                <strong>Edad:</strong> {{ selectedAppointment?.paciente?.edad }} años
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-weight</v-icon>
                                                <strong>Peso:</strong> {{ selectedAppointment?.paciente?.peso }} kg
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-human-male-height</v-icon>
                                                <strong>Estatura:</strong> {{ selectedAppointment?.paciente?.estatura }}
                                                m
                                            </v-list-item>
                                        </v-list>
                                    </v-card>
                                    <v-card class="pa-4" style="width: 90%;">
                                        <v-list dense>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-hospital</v-icon>
                                                <strong>Motivo de Consulta:</strong> {{
                                                    selectedAppointment?.motivo_consulta }}
                                            </v-list-item>
                                            <v-list-item>
                                                <v-icon class="mr-2">mdi-heart-pulse</v-icon>
                                                <strong>Sintomas:</strong>
                                            </v-list-item>
                                            <v-card-text style="max-height: 10rem; overflow-y: auto">
                                                <v-chip-group column>
                                                    <v-chip v-for="(sintoma, index) in sintomasArray" :key="index"
                                                        closable @click="removeSintoma(index)">
                                                        {{ sintoma }}
                                                    </v-chip>
                                                </v-chip-group>
                                                <v-text-field v-model="nuevoSintoma" label="Añadir síntoma"
                                                    @keyup.enter="addSintoma" append-icon="mdi-plus"
                                                    @click:append="addSintoma" />
                                            </v-card-text>
                                        </v-list>
                                    </v-card>
                                </v-row>
                                <v-row class="justify-center gap-4 mt-4">
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                            <strong>Exámen Físico:</strong>
                                        </div>
                                        <v-textarea v-model="examen_fisico" label="Exámen físico (Opcional)" outlined
                                            auto-grow rows="5" class="w-100" />
                                    </v-card>
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                            <strong>Exámen Funcional:</strong>
                                        </div>
                                        <v-textarea v-model="examen_funcional" label="Exámen funcional (Opcional)"
                                            outlined auto-grow rows="5" class="w-100" />
                                    </v-card>
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                            <strong>Exámen Paraclínico:</strong>
                                        </div>
                                        <v-textarea v-model="examen_paraclinico" label="Exámen paraclínico (Opcional)"
                                            outlined auto-grow rows="5" class="w-100" />
                                    </v-card>
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-alert-circle</v-icon>
                                            <strong>Diagnóstico:</strong>
                                        </div>
                                        <v-textarea v-model="diagnostico" label="Diagnóstico" outlined auto-grow
                                            rows="5" class="w-100" />
                                    </v-card>
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-pill</v-icon>
                                            <strong>Tratamiento:</strong>
                                        </div>
                                        <v-textarea v-model="tratamiento" label="Tratamiento" outlined auto-grow
                                            rows="5" class="w-100" />
                                    </v-card>
                                </v-row>
                                <v-row class="justify-center gap-4 mt-4 mb-5">
                                    <v-card class="pa-4" style="width: 90%;">
                                        <v-list-item class="justify-center">
                                            <v-icon class="mr-2">mdi-note-text</v-icon>
                                            <strong>Notas:</strong>
                                        </v-list-item>
                                        <v-row>
                                            <v-col cols="12" class="d-flex flex-column align-start">
                                                <v-list dense class="w-100">
                                                    <template
                                                        v-if="selectedAppointment?.historiales[0]?.notas.length > 0">
                                                        <v-list-item
                                                            v-for="(nota, index) in selectedAppointment?.historiales[0]?.notas"
                                                            :key="index">
                                                            <v-card
                                                                class="mt-2 pa-3 d-flex align-center justify-space-between w-100">
                                                                <div class="d-flex align-center">
                                                                    <v-icon class="mr-2">mdi-note</v-icon>
                                                                    <strong
                                                                        style="display: inline-block;width: 22vw;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{
                                                                            nota.contenido }}</strong>
                                                                </div>
                                                                <v-btn :color="'red'" icon
                                                                    @click="delete_note(nota.id)">
                                                                    <v-icon>mdi-delete</v-icon>
                                                                </v-btn>
                                                            </v-card>
                                                        </v-list-item>
                                                    </template>
                                                    <p v-else class="text-center w-100">No hay notas registradas.</p>
                                                </v-list>
                                            </v-col>
                                            <v-col cols="8" class="d-flex justify-center mx-auto">
                                                <v-text-field v-model="nuevaNota" label="Añadir nota"
                                                    @keyup.enter="addNota" append-icon="mdi-plus"
                                                    @click:append="addNota" class="w-100 mx-auto" />
                                            </v-col>
                                        </v-row>
                                    </v-card>
                                </v-row>
                                <v-row class="justify-center gap-4 mt-5 mb-5">
                                    <v-card class="pa-4" style="width: 90%;">
                                        <v-list-item class="justify-center">
                                            <v-icon class="mr-2">mdi-file-document</v-icon>
                                            <strong>Archivos:</strong>
                                        </v-list-item>
                                        <v-row>
                                            <v-col cols="12" class="d-flex flex-column align-start">
                                                <v-list dense class="w-100">
                                                    <template
                                                        v-if="selectedAppointment?.historiales[0]?.archivos.length > 0">
                                                        <v-list-item
                                                            v-for="(archivo, index) in selectedAppointment?.historiales[0]?.archivos"
                                                            :key="index">
                                                            <v-card
                                                                class="mt-2 pa-3 d-flex align-center justify-space-between w-100">
                                                                <div class="d-flex align-center">
                                                                    <v-icon class="mr-2">{{ archivo?.extension == "pdf"
                                                                        ? "mdi-file-pdf-box" : "mdi-file-image"
                                                                        }}</v-icon>
                                                                    <strong
                                                                        style="display: inline-block;width: 22vw;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{
                                                                            archivo.nombre_archivo }}</strong>
                                                                </div>
                                                                <div>
                                                                    <v-btn :color="'red'" icon
                                                                        @click="eliminarArchivo(archivo.id)">
                                                                        <v-icon>mdi-delete</v-icon>
                                                                    </v-btn>
                                                                </div>
                                                            </v-card>
                                                        </v-list-item>
                                                    </template>
                                                    <p v-else class="text-center w-100">No hay archivos registrados.</p>
                                                </v-list>
                                            </v-col>
                                            <v-col cols="12">
                                                <div class="d-flex align-center justify-center gap-4">
                                                    <p style="width: 60%;">{{ nuevoArchivo ? nuevoArchivo.name
                                                        : "No se ha seleccionado ningún archivo." }}</p>
                                                    <input type="file" id="fileInput" @change="handleFileChange"
                                                        class="d-none" accept="application/pdf, image/*" />
                                                    <v-btn color="secondary" @click="abrirSelector">
                                                        <v-icon>mdi-upload</v-icon>
                                                    </v-btn>
                                                </div>
                                                <div class="w-100 d-flex justify-center"
                                                    style="flex-direction: column;">
                                                    <v-select v-model="tipoArchivo" class="mx-auto"
                                                        style="height: 3rem; width: 90%;" :items="options"
                                                        label="Tipo de archivo" item-text="name"
                                                        item-value="id"></v-select>
                                                    <v-btn color="primary" class="w-75 mx-auto mt-5"
                                                        @click="subirArchivo">
                                                        <v-icon>mdi-content-save</v-icon> Subir archivo
                                                    </v-btn>
                                                </div>
                                            </v-col>
                                        </v-row>
                                    </v-card>
                                </v-row>
                                <v-row class="justify-center gap-4 mt-4 mb-5">
                                    <v-card class="pa-4" style="width: 90%;">
                                        <div class="mb-3">
                                            <v-icon class="mr-2">mdi-lightbulb-outline</v-icon>
                                            <strong>Conclusiones:</strong>
                                        </div>
                                        <v-textarea v-model="conclusion" label="Conclusiones (Opcional)" outlined
                                            auto-grow rows="5" class="w-100" />
                                    </v-card>
                                </v-row>
                            </v-container>
                        </v-card>
                        <v-card-actions class="d-flex justify-center gap-2">
                            <v-btn x-small outlined color="red darken-3" @click="attendAppointment = false">
                                Cancelar
                            </v-btn>
                            <v-btn outlined elevation="6"
                                @click="submitAppointment(selectedAppointment?.historiales[0]?.id)"
                                color="blue darken-3" x-small type="submit">
                                Terminar Cita
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                <!-- Modal para agregar pacientes a las citas -->
                <v-dialog v-model="addPatient" max-width="800px">
                    <v-card color="lighten-4">
                        <v-toolbar dark>
                            <v-icon class="mr-2">mdi-account-plus</v-icon>
                            <v-toolbar-title>Agrega un paciente a la cita del día {{
                                formatDate(selectedAppointment?.start) }}</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-form @submit.prevent="updateAppointment" v-model="valid">
                            <v-container style="height: 30rem; overflow-y: auto;">
                                <div class="d-flex justify-center align-center mb-5">
                                    <v-col cols="5" class="justify-center">
                                        <v-btn color="blue" @click="newPatient = true" dark elevation="2">
                                            <v-icon left>mdi-account-plus</v-icon>
                                            Crear Paciente
                                        </v-btn>
                                    </v-col>
                                    <v-col cols="7">
                                        <h4 class="text-start">Selecciona al paciente:</h4>
                                    </v-col>
                                </div>
                                <div style="max-height: 200px; overflow: auto;">
                                    <v-data-table class="text-center justify-center" :headers="patientHeaders"
                                        :items="pacientesArray" :search="search" dense fixed-header height="200px">
                                        <template v-slot:item="{ item }">
                                            <tr>
                                                <td class="text-center">{{ item?.nombre_paciente || '-' }}</td>
                                                <td class="text-center">{{ item.tlf_paciente || '-' }}</td>
                                                <td class="text-center">{{ item.email_paciente || '-' }}</td>
                                                <td class="text-center">{{ item?.edad }}</td>
                                                <td class="text-center">{{ item?.peso }}</td>
                                                <td class="text-center">{{ item?.estatura }}</td>
                                                <td class="text-center justify-center">
                                                    <v-btn color="green" icon @click="setPatient(item)">
                                                        <v-icon>mdi-check</v-icon>
                                                    </v-btn>
                                                </td>
                                            </tr>
                                        </template>
                                    </v-data-table>
                                </div>

                                <h4 class="text-center mt-5 mb-5">Paciente seleccionado: {{
                                    selectedPatient?.nombre_paciente ||
                                    "No has seleccionado ningún paciente." }}</h4>
                                <v-row class="justify-center">
                                    <v-col cols="8">
                                        <v-text-field v-model="newMotive" label="Motivo de la consulta"
                                            required></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-row class="justify-center">
                                    <v-col cols="6">
                                        <v-text-field v-model="newDisease" label="Nuevo síntoma"
                                            outlined></v-text-field>
                                    </v-col>
                                    <v-col cols="2" class="justify-center">
                                        <v-btn color="blue darken-2" @click="agregarSintoma">
                                            Agregar
                                        </v-btn>
                                    </v-col>
                                </v-row>
                                <v-list class="mx-auto" style="width: 50%;">
                                    <v-list-item-group v-if="newDiseasesArray.length > 0">
                                        <v-list-item v-for="(sintoma, index) in newDiseasesArray" :key="index">
                                            <v-list-item-content>
                                                <v-list-item-title>{{ sintoma }}</v-list-item-title>
                                            </v-list-item-content>
                                            <v-list-item-action>
                                                <v-btn icon @click="eliminarSintoma(index)">
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </v-list-item-action>
                                        </v-list-item>
                                    </v-list-item-group>
                                    <v-alert v-else type="info" outlined>No hay síntomas registrados</v-alert>
                                </v-list>
                            </v-container>
                            <v-card-actions class="d-flex justify-center gap-2">
                                <v-btn x-small outlined color="red darken-3" @click="addPatient = false">
                                    Cancelar
                                </v-btn>
                                <v-btn outlined elevation="6" color="blue darken-3" x-small type="submit">
                                    Agregar al paciente
                                </v-btn>
                            </v-card-actions>
                        </v-form>
                    </v-card>
                </v-dialog>
                <!-- Modal para crear pacientes -->
                <v-dialog v-model="newPatient" max-width="800px">
                    <v-card color="lighten-4">
                        <v-toolbar dark>
                            <v-icon class="mr-2">mdi-account-plus</v-icon>
                            <v-toolbar-title>Agrega un paciente</v-toolbar-title>
                            <v-spacer></v-spacer>
                        </v-toolbar>
                        <v-form @submit.prevent="createPatient" v-model="valid">
                            <v-container style="height: 30rem; overflow-y: auto;">
                                <h4 class="text-center mt-5 mb-5">Datos del paciente: </h4>
                                <v-row class="justify-center">
                                    <v-col cols="8">
                                        <v-text-field v-model="namePatient" :rules="nameRules" :counter="20"
                                            label="Nombre" required></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field v-model="telephonePatient" :rules="phoneRules" :counter="14"
                                            label="Teléfono" required></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field v-model="emailPatient" :rules="emailRules" label="E-mail"
                                            required></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field v-model="edadPatient" :rules="edadRules" :counter="3" label="Edad"
                                            required></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field v-model="pesoPatient" :rules="pesoRules" label="Peso (Kg)"
                                            required></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-text-field v-model="estaturaPatient" :rules="estaturaRules" :counter="4"
                                            label="Estatura (Mts)" required></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                            <v-card-actions class="d-flex justify-center gap-2">
                                <v-btn x-small outlined color="red darken-3" @click="newPatient = false">
                                    Cancelar
                                </v-btn>
                                <v-btn outlined elevation="6" color="blue darken-3" x-small type="submit">
                                    Crear
                                </v-btn>
                            </v-card-actions>
                        </v-form>
                    </v-card>
                </v-dialog>
                <!-- Tabla de citas -->
                <template>
                    <!--<h3 class="mt-5 blue--text d-flex justify-center">Tabla de Citas Activas</h3>-->
                    <v-card class="mt-5 blue accent-3">
                        <v-card-title class="white--text">
                            Citas Activas
                            <v-spacer></v-spacer>
                            <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                                hide-details></v-text-field>
                        </v-card-title>
                        <v-data-table class="text-center justify-center" :headers="headers" :items="events"
                            :search="search">
                            <template v-slot:item="{ item }">
                                <tr>
                                    <td>{{ item.paciente?.nombre_paciente ||
                                        'Aún no se ha asignado un paciente' }}</td>
                                    <td class="text-center">{{ item.paciente?.tlf_paciente || '-' }}</td>
                                    <td class="text-center">{{ item.paciente?.email_paciente || '-' }}</td>
                                    <td class="text-center">{{ item.motivo_consulta || '-' }}</td>
                                    <td class="text-center">{{ item.sintomas || '-' }}</td>
                                    <td class="text-center">{{ item.tipo || '-' }}</td>
                                    <td class="text-center">{{ item.estado_cita || '-' }}</td>
                                    <td class="text-center">{{ formatDate(item.start) || '-' }}</td>
                                    <td class="text-center">
                                        <template>
                                            <v-btn :color="'red'" icon @click="delete_calendar(item.id)"
                                                :disabled="item.estado === 3">
                                                <v-icon>mdi-delete</v-icon>
                                            </v-btn>
                                            <v-btn :color="'blue'" icon @click="selectPatient(item)"
                                                :disabled="item.estado !== 1">
                                                <v-icon>mdi-account-plus</v-icon>
                                            </v-btn>
                                            <v-btn :color="'green'" icon @click="showAttendAppointment(item)"
                                                :disabled="item.estado !== 2">
                                                <v-icon>mdi-plus-outline</v-icon>
                                            </v-btn>
                                        </template>
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
                </template>
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
        tabIndex: 2,
        value: '',
        items: ['30', '60'],
        item: ['1 Día', '1 Mes', '2 Meses', '3 Meses', '4 Meses', '6 Meses', '1 Año'],
        href: null,
        hrefb: null,
        hrefc: '/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador',
        hrefd: "/lista_de_empresas_de_salud_disponibles_en_tumedibot.com/Super_Buscador_Empresarial",
        policys: null,
        terms: null,
        cooki: null,
        manual: null,
        medicoId: null,
        userId: null,
        hasMedicalAccess: false,
        hasEmpresarialAccess: false,
        instruc:
        {
            text: ['1. Es muy fácil de usar. Sólo debe presionar un click dentro del calendario y tendrá su botón de cita creado automáticamente.', '2. En Minutos de Cita tendrá solo dos tiempos de cita: De 30 minutos y De 60 minutos. El botón de cita automáticamente se ajustará a su selección.'],
            icon: ['mdi-doctor', 'mdi-phone', 'mdi-phone']
        },
        itemss: [
            {
                text: 'Área Médico',
                disabled: false,
                href: null,
            },
        ],
        tiempito: null,
        selectedItem: '30',
        selectedItemb: '1 Día',
        events: [],
        colors: ['#2196F3', '#3F51B5', '#673AB7', '#00BCD4', '#4CAF50', '#FF9800', '#757575'],
        names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'horario', 'Birthday', 'Conference', 'Party'],
        selectedEvent: {},
        title: null,
        selectedElement: null,
        selectedOpen: false,
        dragEvent: null,
        dragStart: null,
        medico_id: null,
        ending: 0,
        createEvent: null,
        createStart: null,
        extendOriginal: null,
        name: null,
        valid: false,
        firstname: '',
        links: [
            'Home',
            'About Us',
            'Team',
            'Services',
            'Blog',
            'Contact Us',
        ],
        phone: '',
        nameRules: [
            v => !!v || 'Nombre es obligatorio',
            v => v.length <= 20 || 'Nombre debe tener máximo 20 caracteres',
        ],
        phoneRules: [
            v => !!v || 'Telefono es obligatorio',
            v => /^\d+$/.test(v) || 'Telefono debe contener solo números',
            v => v.length >= 7 || 'Telefono debe tener mínimo 7 caracteres',
            v => v.length <= 14 || 'Telefono debe tener máximo 14 caracteres',
        ],
        email: '',
        emailRules: [
            v => !!v || 'E-mail es obligatorio',
            v => /.+@.+/.test(v) || 'E-mail debe tener un @',
        ],
        edadRules: [
            v => !!v || 'Edad es obligatorio',
            v => v.length <= 3 || 'Edad debe tener máximo 3 números',
            v => /[0-9]/.test(v) || 'Edad debe ser números',
        ],
        pesoRules: [
            v => !!v || 'Peso es obligatorio',
        ],
        estaturaRules: [
            v => !!v || 'Estatura es obligatorio',
            v => v.length <= 4 || 'Estatura debe tener máximo 4 caracteres',
        ],
        search: '',
        headers: [
            {
                text: 'Nombre del Paciente',
                align: 'center',
                sortable: false,
                value: 'nombre_paciente',
            },
            { text: 'Teléfono', value: 'tlf_paciente', align: 'center', },
            { text: 'Correo', value: 'email_paciente', align: 'center', },
            { text: 'Motivo de la cita', value: 'motivo_cita', align: 'center', },
            { text: 'Síntomas', value: 'sintomas', align: 'center', },
            { text: 'Tipo', value: 'tipo', align: 'center', },
            { text: 'Estado de Cita', value: 'estado_cita', align: 'center', },
            { text: 'Fecha y hora de Cita', value: 'start', align: 'center', },
            { text: 'Acciones', value: 'notes', align: 'center', }
        ],
        citas: [],
        interval: {},
        valueb: 0,
        attendAppointment: false,
        selectedAppointment: null,
        sintomasArray: [],
        nuevoSintoma: "",
        nuevaNota: "",
        nuevoArchivo: null,
        tipoArchivo: null,
        options: [
            { id: "EXAMEN", name: 'Exámen' },
            { id: "RADIOLOGIA", name: 'Radiología' },
            { id: "RECETA", name: 'Receta' },
            { id: "LABORATORIO", name: 'Laboratorio' },
            { id: "OTRO", name: 'Otro' },
        ],
        diagnostico: '',
        tratamiento: '',
        examen_paraclinico: '',
        examen_fisico: '',
        examen_funcional: '',
        conclusion: '',
        addPatient: false,
        patientHeaders: [
            {
                text: 'Nombre',
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
        pacientesArray: [],
        selectedPatient: null,
        newDisease: "",
        newMotive: "",
        newDiseasesArray: [],
        newPatient: false,
        namePatient: "",
        telephonePatient: "",
        emailPatient: "",
        edadPatient: "",
        pesoPatient: "",
        estaturaPatient: "",
    }),
    props: {
        medico: { type: String },
        user: { type: String },
    },
    mounted() {
        this.title = this.$refs.calendar.title.toUpperCase()
        this.fetchApiProbe()
        this.extractDataFromUrl();
    },
    created() {
        this.fetchApiProbe()
    },
    computed: {
        enfermedadesArray() {
            return this.currentItem.enfermedades ? this.currentItem.enfermedades.split(',') : [];
        }
    },
    methods: {
         extractDataFromUrl() {
          const path = window.location.pathname;
          const parts = path.split('/');

          // Asume que la URL siempre tiene el formato /api/calendario/medico/medicoId/userId
          if (parts.length >= 6) {
            this.medicoId = parts[4];
            this.userId = parts[5];
          }
        },
        startDrag({ event, timed }) {
            if (event && timed) {
                this.dragEvent = event
                this.dragTime = null
                this.extendOriginal = null
            }
        },
        startTime(tms) {
            const mouse = this.toTime(tms);
            if (this.dragEvent && this.dragTime === null) {
                const start = this.dragEvent.start;
                this.dragTime = mouse - start;
            } else {
                this.createStart = this.roundTime(mouse);

                let startDate = new Date(this.createStart);
                let day = startDate.toISOString().substring(0, 10);
                let hour = startDate.toTimeString().substring(0, 5);

                let sum = this.createStart + this.ending;
                let endDate = new Date(sum);
                let day_ = endDate.toISOString().substring(0, 10);
                let hour_ = endDate.toTimeString().substring(0, 5);

                if (endDate <= startDate) {
                    endDate.setMinutes(endDate.getMinutes() + 30);
                    day_ = endDate.toISOString().substring(0, 10);
                    hour_ = endDate.toTimeString().substring(0, 5);
                }

                this.createEvent = {
                    name: "hora:",
                    color: this.rndElement(this.colors),
                    start: `${day} ${hour}`,
                    end: `${day_} ${hour_}`,
                    medico: this.medico,
                    timed: true,
                };
                this.storeCalendar();
            }
        },
        extendBottom (event) {
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
            }
        },
        endDrag() {
            const date = new Date(this.dragEvent.start);
            const date2 = new Date(this.dragEvent.end);

            date.setHours(date.getHours() - 5);
            date2.setHours(date2.getHours() - 5);

            if (date2 <= date) {
                date2.setMinutes(date2.getMinutes() + 30);
            }

            const formattedDate = date.toISOString().slice(0, 19).replace('T', ' ');
            const formattedDate2 = date2.toISOString().slice(0, 19).replace('T', ' ');

            fetch(`/api/calendar_doctor/update_time/${this.dragEvent.id}`, {
                method: 'PATCH',
                mode: 'cors',
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    start: formattedDate,
                    end: formattedDate2,
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al actualizar la cita');
                    }
                    this.fetchApiProbe();
                    this.dragTime = null
                    this.dragEvent = null
                    this.createStart = null
                    this.extendOriginal = null
                })
                .catch(err => console.error('Error:', err));
        },

          async checkNavigationAccess() {
      try {
        const response = await fetch('/navigation-access', {
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
          }
        });
        
        if (!response.ok) throw new Error('Error en la solicitud');
        
        const { medical_access, empresarial_access } = await response.json();
        
        this.hasMedicalAccess = medical_access;
        this.hasEmpresarialAccess = empresarial_access;
        
      } catch (error) {
        console.error('Error:', error);
        // Opcional: Mostrar notificación al usuario
      }
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
            this.createEvent = null
            this.createStart = null
            this.dragTime = null
            this.dragEvent = null
        },
        delete_calendar(id) {
            Swal.fire({
                title: "¿Está seguro de eliminar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: '<span style="color: white;">Sí, eliminar</span>',
                cancelButtonText: '<span style="color: white;">No, cancelar</span>',
                confirmButtonColor: "#d33",
                cancelButtonColor: "green"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/api/calendar/delete/${id}`, {
                        method: 'delete',
                        mode: 'cors',
                        headers: {
                            'Content-Type': 'Application/json',
                            'Accept': 'Application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                        .then(res => res.json())
                        .then(data => {
                            this.selectedOpen = false;
                            this.fetchApiProbe();
                            Swal.fire({
                                title: "Eliminado!",
                                text: "",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton: false
                            });
                        })
                        .catch(err => {
                            console.error(err);
                            Swal.fire(
                                "Error",
                                "Hubo un error al eliminar el registro.",
                                "error"
                            );
                        });
                }
            });
        },
        changeState(valor) {
            this.selected = this.selectedItem;
            this.ending = this.selected * 60 * 1000;
            this.updateEventDuration();
        },
        changeStateb(valor) {
            this.selected = this.selectedItemb;
            this.ending = this.selected * 60 * 1000;
            this.updateEventDuration();
        },
        updateEventDuration() {
            if (this.createEvent) {
                let endDate = new Date(this.createStart + this.ending);
                let day_ = endDate.toISOString().substring(0, 10);
                let hour_ = endDate.toTimeString().substring(0, 5);
                this.createEvent.end = `${day_} ${hour_}`;
            }
        },
        toTime(tms) {
            return new Date(tms.year, tms.month - 1, tms.day, tms.hour, tms.minute).getTime()
        },
        roundTime(time, down = true) {
            const roundTo = 30 // minutes
            const roundDownTime = roundTo * 60 * 1000
            return down
                ? time - time % roundDownTime
                : time + (roundDownTime - (time % roundDownTime))
        },
        toTime2(tms, i) {
            return new Date(tms.year, tms.month - 1, tms.day + i, tms.hour, tms.minute).getTime()
        },
        storeCalendar() {
            fetch('/api/calendar_doctor/store/', {
                method: 'post',
                mode: 'cors',
                body: JSON.stringify(this.createEvent),
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then(response => response.json())
            this.fetchApiProbe()
                .catch(err => { console.log(err) })
        },
        async fetchApiProbe() {
            try {
                const response = await fetch('/api/calendar_doctor/', {
                    headers: { 'Content-Type': 'Application/json' }
                });
                const data = await response.json();
                this.events = data.dato
                    .filter(event => event.estado !== 3 && event.name != null)
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
        redirected() {
            fetch('/api/calendar_doctor/back')
                .catch(err => { console.log(err) })
        },
        prev() {
            this.$refs.calendar.prev()
            this.title = this.$refs.calendar.title.toUpperCase()
        },
        next() {
            this.$refs.calendar.next()
            this.title = this.$refs.calendar.title.toUpperCase()
        },
        getEventColor(event) {
            return event.estado == 2 ? event.color : 'red';
        },
        showEvent({ nativeEvent, event }) {
            const open = () => {
                this.selectedEvent = event
                this.selectedElement = nativeEvent.target
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
        formatDate(date) {
            const parsedDate = new Date(date);
            const day = String(parsedDate.getDate()).padStart(2, '0');
            const month = String(parsedDate.getMonth() + 1).padStart(2, '0');
            const year = parsedDate.getFullYear();
            const hours = String(parsedDate.getHours()).padStart(2, '0');
            const minutes = String(parsedDate.getMinutes()).padStart(2, '0');
            return `${day}/${month}/${year} a las ${hours}:${minutes}`;
        },
        showAttendAppointment(appointment) {
            this.attendAppointment = true;
            this.sintomasArray = appointment?.sintomas ? appointment.sintomas.split(", ") : [];
            this.selectedAppointment = appointment;
        },
        addSintoma() {
            if (this.nuevoSintoma.trim()) {
                this.sintomasArray.push(this.nuevoSintoma.trim());
                this.nuevoSintoma = "";
            }
        },
        removeSintoma(index) {
            this.sintomasArray.splice(index, 1);
        },
        delete_note(id) {
            Swal.fire({
                title: "¿Está seguro de eliminar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: '<span style="color: white;">Sí, eliminar</span>',
                cancelButtonText: '<span style="color: white;">No, cancelar</span>',
                confirmButtonColor: "#d33",
                cancelButtonColor: "green"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/api/calendar_doctor/notes/delete/${id}`, {
                        method: 'delete',
                        mode: 'cors',
                        headers: {
                            'Content-Type': 'Application/json',
                            'Accept': 'Application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al eliminar la nota');
                            }
                            const historial = this.selectedAppointment?.historiales[0];
                            if (historial) {
                                historial.notas = historial.notas.filter(nota => nota.id !== id);
                            }
                            Swal.fire({
                                title: "Eliminado!",
                                text: "La nota ha sido eliminada.",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton: false
                            });
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            Swal.fire(
                                "Error",
                                "Hubo un error al eliminar la nota.",
                                "error"
                            );
                        });
                }
            });
        },
        addNota() {
            fetch(`/api/calendar_doctor/notes/create`, {
                method: 'POST',
                mode: 'cors',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    id_historial: this.selectedAppointment?.historiales[0]?.id,
                    contenido: this.nuevaNota
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al crear la nota');
                    }
                    return response.json();
                })
                .then(data => {
                    if (this.selectedAppointment?.historiales?.[0]) {
                        this.selectedAppointment.historiales[0].notas.push(data.data);
                    }
                    this.nuevaNota = '';
                })
                .catch(err => console.error('Error:', err));
        },
        abrirSelector() {
            document.getElementById('fileInput')?.click();
        },
        handleFileChange(event) {
            const file = event.target.files[0];
            if (file) {
                const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        title: "Atención",
                        text: "Por favor, selecciona un archivo PDF o Imágen.",
                        icon: "error",
                        confirmButtonText: '<span style="color: white;">Entendido</span>',
                        confirmButtonColor: "green"
                    });
                    return;
                }
                this.nuevoArchivo = file;
            }
        },
        subirArchivo() {
            if (!this.nuevoArchivo) {
                Swal.fire({
                    title: "Atención",
                    text: "Por favor, selecciona un archivo.",
                    icon: "error",
                    confirmButtonText: '<span style="color: white;">Entendido</span>',
                    confirmButtonColor: "green"
                });
            } else if (!this.tipoArchivo) {
                Swal.fire({
                    title: "Atención",
                    text: "Por favor, selecciona el tipo de archivo a subir.",
                    icon: "error",
                    confirmButtonText: '<span style="color: white;">Entendido</span>',
                    confirmButtonColor: "green"
                });
            }
            const formData = new FormData();
            formData.append('id_historial', this.selectedAppointment?.historiales?.[0]?.id);
            formData.append('archivo', this.nuevoArchivo);
            formData.append('tipo', this.tipoArchivo);
            fetch(`/api/calendar_doctor/file/upload`, {
                method: 'POST',
                mode: 'cors',
                headers: {
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al crear la nota');
                    }
                    return response.json();
                })
                .then(data => {
                    if (this.selectedAppointment?.historiales?.[0]) {
                        this.selectedAppointment.historiales[0].archivos.push(data.archivo);
                    }
                    this.nuevoArchivo = null;
                    this.tipoArchivo = null;
                })
                .catch(err => console.error('Error:', err));
        },
        verArchivo(ruta) {
            window.location.href = `/${ruta}`;
        },
        eliminarArchivo(id) {
            Swal.fire({
                title: "¿Está seguro de eliminar el archivo?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: '<span style="color: white;">Sí, eliminar</span>',
                cancelButtonText: '<span style="color: white;">No, cancelar</span>',
                confirmButtonColor: "#d33",
                cancelButtonColor: "green"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/api/calendar_doctor/file/destroy/${id}`, {
                        method: 'delete',
                        mode: 'cors',
                        headers: {
                            'Content-Type': 'Application/json',
                            'Accept': 'Application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al eliminar el archivo.');
                            }
                            const historial = this.selectedAppointment?.historiales[0];
                            if (historial) {
                                historial.archivos = historial.archivos.filter(archivo => archivo.id !== id);
                            }
                            Swal.fire({
                                title: "Eliminado!",
                                text: "El archivo ha sido eliminado.",
                                icon: "success",
                                timer: 1000,
                                showConfirmButton: false
                            });
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            Swal.fire(
                                "Error",
                                "Hubo un error al eliminar el archivo.",
                                "error"
                            );
                        });
                }
            });
        },
        submitAppointment(id) {
            Swal.fire({
                title: "¿Quieres dar esta cita como terminada?",
                text: "Al hacerlo, se guardará en el historial del paciente.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: '<span style="color: white;">Si, terminar</span>',
                cancelButtonText: '<span style="color: white;">No, cancelar</span>',
                confirmButtonColor: "green",
                cancelButtonColor: "#d33"
            }).then((result) => {
                if (result.isConfirmed) {
                    if (!this.tratamiento.trim() || !this.diagnostico.trim()) {
                        Swal.fire({
                            title: "Atención",
                            text: "Ni el tratamiento ni el diagnóstico pueden estar vacíos.",
                            icon: "warning",
                            confirmButtonText: '<span style="color: white;">Entendido</span>',
                            confirmButtonColor: "green"
                        });
                        return;
                    }
                    fetch(`/api/calendar_doctor/finish/${id}`, {
                        method: 'PATCH',
                        mode: 'cors',
                        headers: {
                            'Content-Type': 'Application/json',
                            'Accept': 'Application/json, text-plain, */*',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            sintomas: this.sintomasArray.join(", ") || "",
                            diagnostico: this.diagnostico,
                            tratamiento: this.tratamiento,
                            examen_fisico: this.examen_fisico || "",
                            examen_funcional: this.examen_funcional || "",
                            examen_paraclinico: this.examen_paraclinico || "",
                            conclusion: this.conclusion || "",
                        })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error al actualizar la cita');
                            }
                            this.fetchApiProbe();
                            this.attendAppointment = false;
                        })
                        .catch(err => console.error('Error:', err));
                }
            })
        },
        selectPatient(appointment) {
            this.selectedAppointment = appointment;
            this.addPatient = true;
            fetch('/api/patients/', {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.pacientesArray = response.dato;
                })
                .catch(err => { console.log(err) });
        },
        agregarSintoma() {
            this.newDiseasesArray.push(this.newDisease);
            this.newDisease = "";
        },
        eliminarSintoma(index) {
            this.newDiseasesArray.splice(index, 1);
        },
        setPatient(patient) {
            this.selectedPatient = patient;
        },
        updateAppointment() {
            if (!this.selectedPatient || !this.newMotive || !this.selectedAppointment) {
                Swal.fire({
                    title: "Atención",
                    text: "Recuerda seleccionar el paciente, la cita y proporcionar el motivo de la consulta.",
                    icon: "warning",
                    confirmButtonText: '<span style="color: white;">Entendido</span>',
                    confirmButtonColor: "green"
                });
            }
            fetch(`/api/calendar_doctor/update/${this.selectedAppointment?.id}`, {
                method: 'PATCH',
                mode: 'cors',
                body: JSON.stringify({
                    id_paciente: this.selectedPatient.id,
                    motivo_consulta: this.newMotive,
                    sintomas: this.newDiseasesArray.join(", ") || ""
                }),
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code == 200) {
                        this.selectedPatient = null;
                        this.newMotive = '';
                        this.newDiseasesArray = [];
                        this.newDisease = '';
                        this.addPatient = false;
                        this.fetchApiProbe();
                    } else {
                        console.log('Error al añadir el paciente a la cita: ', data.message);
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                });
        },
        createPatient() {
            fetch('/api/patients/create', {
                method: 'POST',
                mode: 'cors',
                body: JSON.stringify({
                    nombre: this.namePatient,
                    telefono: parseInt(this.telephonePatient),
                    email: this.emailPatient,
                    edad: this.edadPatient,
                    peso: this.pesoPatient,
                    estatura: this.estaturaPatient
                }),
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.code == 200) {
                        this.name = '';
                        this.telephone = '';
                        this.email = '';
                        this.edad = '';
                        this.peso = '';
                        this.estatura = '';
                        this.newPatient = false;
                        this.pacientesArray.push(data.data);
                    } else {
                        console.log('Error al crear paciente: ', data.message);
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                });
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

.v-progress-circular {
    margin: 1rem;
}

.v-breadcrumbs {
    color: white;
}

.v-label {
    color: white;
}

.truncate {
    display: inline-block;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>