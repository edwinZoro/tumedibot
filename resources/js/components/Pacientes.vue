<template>
    <v-app class="d-flex flex-column fill-height">
        <navigation-doctor />
        <v-main class="flex-grow-1">
            <!-- Crear Pacientes -->
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
                                    <v-text-field v-model="name" :rules="nameRules" :counter="20" label="Nombre"
                                        required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="telephone" :rules="phoneRules" :counter="14" label="Teléfono"
                                        required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="email" :rules="emailRules" label="E-mail"
                                        required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="edad" :rules="edadRules" :counter="3" label="Edad"
                                        required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="peso" :rules="pesoRules" label="Peso (Kg)"
                                        required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="estatura" :rules="estaturaRules" :counter="4"
                                        label="Estatura (Mts)" required></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <v-card-actions class="d-flex justify-center gap-2">
                            <v-btn x-small outlined color="red darken-3" @click="newPatient = false">
                                Cancelar
                            </v-btn>
                            <v-btn outlined elevation="6" color="blue darken-3" x-small type="submit">
                                Enviar
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-dialog>
            <!-- Agregar paciente a una cita -->
            <v-dialog v-model="newAppointment" max-width="800px">
                <v-card color="lighten-4">
                    <v-toolbar dark>
                        <v-icon class="mr-2">mdi-clipboard-plus</v-icon>
                        <v-toolbar-title>Agrega el paciente a una cita</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-form @submit.prevent="updateAppointment" v-model="valid">
                        <v-container style="height: 30rem; overflow-y: auto;">
                            <h4 class="text-center mt-5 mb-5">Paciente: </h4>
                            <v-row class="justify-center">
                                <v-col cols="3">
                                    <v-text-field v-model="nombrePaciente" label="Nombre del paciente"
                                        readonly></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field v-model="emailPaciente" label="Email del paciente"
                                        readonly></v-text-field>
                                </v-col>
                                <v-col cols="3">
                                    <v-text-field v-model="tlfPaciente" label="Teléfono del paciente"
                                        readonly></v-text-field>
                                </v-col>
                            </v-row>
                            <!-- <h4 class="text-center mt-5 mb-5">Tus citas: </h4>
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
                            </v-toolbar>
                           <v-calendar ref="calendar" locale="es" :weekdays="[1, 2, 3, 4, 5, 6, 0]" first-interval="7"
                                interval-count="15" v-model="value" color="blue accent-2" type="week" v-if="valueb == 0"
                                :valueb="valueb" :events="events" :event-color="getEventColor" :event-ripple="false"
                                @click:event="showEvent" @mousedown:event="startDrag" @mousedown:time="startTime"
                                @mousemove:time="mouseMove" @mouseup:event="endDrag" @mouseleave.native="cancelDrag">
                                <template v-slot:event="{ event, timed, eventSummary }">
                                    <div class="v-event-draggable"
                                        v-html="event.paciente ? '<p style=\'font-weight: bold; font-size: 0.9em;\' class=\'text-center\'> OCUPADO </p>' : eventSummary()">
                                    </div>
                                </template>
                            </v-calendar>-->
                            <v-menu v-model="selectedOpen" :close-on-content-click="false" :activator="selectedElement"
                                offset-x>
                                <v-card color="grey lighten-4" flat>
                                    <v-toolbar
                                        :color="selectedEvent.paciente ? getEventColor(selectedEvent) : selectedEvent.color"
                                        dark>
                                        <v-btn @click='setEventToUse(selectedEvent)' icon>
                                            <v-icon>mdi-checkbox-marked-circle-outline</v-icon>
                                        </v-btn>
                                    </v-toolbar>
                                </v-card>
                            </v-menu>
                            <!--<h4 class="text-center mt-5 mb-5">Cita Seleccionada: {{ formatDate(eventToUse.start) }}</h4>-->
                             <h4 class="text-center mt-5 mb-5">Agregar Cita Al Paciente</h4>
                             <v-row class="justify-center">
                              <v-col cols="8">
                                <v-text-field
                                  label="Fecha de Cita"
                                  value=""
                                  type="date"
                                  v-model="dateAppointment"
                                ></v-text-field>
                              </v-col>
                            </v-row>
                             <v-row class="justify-center">
                              <v-col cols="8">
                                <v-text-field
                                  label="Hora De Cita"
                                  value="12:30:00"
                                  type="time"
                                  suffix="PST"
                                  v-model="timeAppointment"
                                ></v-text-field>
                              </v-col>
                            </v-row>
                            <v-row class="justify-center">
                              <v-col
                                cols="8"
                              >
                                <v-select
                                  :items="typeAppointment"
                                  label="Tipo de Cita"
                                  v-model="newTypeAppointment"
                                ></v-select>
                              </v-col>
                            </v-row>  
                            <v-row class="justify-center">
                                <v-col cols="8">
                                    <v-text-field v-model="motivo" label="Motivo de la consulta"
                                        required></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="justify-center">
                                <v-col cols="6">
                                    <v-text-field v-model="nuevoSintoma" label="Nuevo síntoma" outlined></v-text-field>
                                </v-col>
                                <v-col cols="2" class="justify-center">
                                    <v-btn color="blue darken-2" @click="agregarSintoma">
                                        Agregar
                                    </v-btn>
                                </v-col>
                            </v-row>
                            <v-list class="mx-auto" style="width: 50%;">
                                <v-list-item-group v-if="sintomas.length > 0">
                                    <v-list-item v-for="(sintoma, index) in sintomas" :key="index">
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
                            <v-btn x-small outlined color="red darken-3" @click="newAppointment = false">
                                Cancelar
                            </v-btn>
                            <v-btn outlined elevation="6" color="blue darken-3" x-small type="submit">
                                Enviar
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-dialog>
            <!-- Ver historiales de un paciente -->
            <v-dialog v-model="historyShow" max-width="800px">
                <v-card color="lighten-4">
                    <v-toolbar dark>
                        <v-icon class="mr-2">mdi-book</v-icon>
                        <v-toolbar-title>Historial médico</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-data-table class="text-center justify-center" :headers="historyHeaders" :items="historial"
                        :search="search">
                        <template v-slot:item="{ item }">
                            <tr>
                                <td class="text-center">{{ item?.cita?.start || '-' }}</td>
                                <td class="text-center">{{ item.diagnostico || '-' }}</td>
                                <td class="text-center">{{ item.tratamiento || '-' }}</td>
                                <td class="text-center">{{ item?.notas?.length }}</td>
                                <td class="text-center">{{ item?.archivos?.length }}</td>
                                <td class="text-center justify-center">
                                    <v-btn :color="'orange'" icon @click="abrirModalHistorialEspecifico(item)">
                                        <v-icon>mdi-pencil</v-icon>
                                    </v-btn>
                                    <v-btn :color="'green'" icon @click="openUploadLogo(item)">
                                        <v-icon>mdi-printer</v-icon>
                                    </v-btn>
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
                    <v-card-actions class="d-flex justify-center gap-2">
                        <v-btn x-small outlined color="red darken-3" @click="historyShow = false">
                            Volver
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <!-- Ver historial de un paciente -->
            <v-dialog v-model="specificHistoryShow" max-width="800px">
                <v-card color="lighten-4">
                    <v-toolbar dark>
                        <v-icon class="mr-2">mdi-clipboard-plus</v-icon>
                        <v-toolbar-title>Historial del paciente {{ selectedPatient?.nombre_paciente }} - {{
                            formatDate(selectedHistory?.cita?.start) }}</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-container style="height: 30rem; overflow-y: auto;">
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-account</v-icon> Información del Paciente
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-account</v-icon>
                                    <strong>Nombre:</strong> {{ selectedPatient?.nombre_paciente }}
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-phone</v-icon>
                                    <strong>Teléfono:</strong> {{ selectedPatient?.tlf_paciente }}
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-email</v-icon>
                                    <strong>Email:</strong> {{ selectedPatient?.email_paciente }}
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-calendar</v-icon>
                                    <strong>Edad:</strong> {{ selectedPatient?.edad }} años
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-weight</v-icon>
                                    <strong>Peso:</strong> {{ selectedPatient?.peso }} kg
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-human-male-height</v-icon>
                                    <strong>Estatura:</strong> {{ selectedPatient?.estatura }} cm
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-calendar-check</v-icon> Información de la Cita
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-hospital</v-icon>
                                        <strong>Motivo de Consulta:</strong>
                                    </div>
                                    <v-textarea v-model="motivoConsulta" @input="dataChange" outlined auto-grow rows="1"
                                        class="w-100" />
                                </v-list-item>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-heart-pulse</v-icon>
                                        <strong>Síntomas:</strong>
                                    </div>
                                    <v-list class="mx-auto" style="width: 50%;">
                                        <v-list-item-group v-if="sintomasHistorial.length > 0">
                                            <v-list-item v-for="(sintoma, index) in sintomasHistorial" :key="index">
                                                <v-list-item-content>
                                                    <v-list-item-title>{{ sintoma }}</v-list-item-title>
                                                </v-list-item-content>
                                                <v-list-item-action>
                                                    <v-btn icon @click="eliminarSintomaHistorial(index)">
                                                        <v-icon>mdi-delete</v-icon>
                                                    </v-btn>
                                                </v-list-item-action>
                                            </v-list-item>
                                        </v-list-item-group>
                                        <v-alert v-else type="info" outlined>No hay síntomas registrados</v-alert>
                                    </v-list>
                                    <v-row class="d-flex justify-center w-75 mx-auto">
                                        <v-col cols="10">
                                            <v-text-field v-model="nuevoSintoma" label="Nuevo síntoma"
                                                outlined></v-text-field>
                                        </v-col>
                                        <v-col cols="2">
                                            <v-btn color="blue darken-2" @click="agregarSintomaHistorial">
                                                Agregar
                                            </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-doctor</v-icon> Médico Asignado
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-account</v-icon>
                                    <strong>Nombre:</strong> {{ selectedHistory?.cita?.medico?.nombre }}
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-account</v-icon>
                                    <strong>Apellido:</strong> {{ selectedHistory?.cita?.medico?.apellido }}
                                </v-list-item>
                                <v-list-item>
                                    <v-icon class="mr-2">mdi-hospital-building</v-icon>
                                    <strong>Hospital/Clínica:</strong> {{ selectedHistory?.cita?.medico?.nombre_hos_cli
                                    }}
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-stethoscope</v-icon> Diagnóstico y Tratamiento
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-alert-circle</v-icon>
                                        <strong>Diagnóstico:</strong>
                                    </div>
                                    <v-textarea v-model="diagnostico" @input="dataChange" outlined auto-grow rows="5"
                                        class="w-100" />
                                </v-list-item>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-pill</v-icon>
                                        <strong>Tratamiento:</strong>
                                    </div>
                                    <v-textarea v-model="tratamiento" @input="dataChange" outlined auto-grow rows="5"
                                        class="w-100" />
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-stethoscope</v-icon> Exámenes Tomados
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                        <strong>Exámen Físico:</strong>
                                    </div>
                                    <v-textarea v-model="examen_fisico" @input="dataChange" outlined auto-grow rows="5"
                                        class="w-100" />
                                </v-list-item>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                        <strong>Exámen Funcional:</strong>
                                    </div>
                                    <v-textarea v-model="examen_funcional" @input="dataChange" outlined auto-grow
                                        rows="5" class="w-100" />
                                </v-list-item>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-stethoscope</v-icon>
                                        <strong>Exámen Paraclínico:</strong>
                                    </div>
                                    <v-textarea v-model="examen_paraclinico" @input="dataChange" outlined auto-grow
                                        rows="5" class="w-100" />
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-note-text</v-icon> Notas
                        </h3>
                        <v-card class="pa-4">
                            <v-col cols="12" class="d-flex flex-column align-start">
                                <v-list dense class="w-100">
                                    <template v-if="selectedHistory?.notas.length > 0">
                                        <v-list-item v-for="(nota, index) in selectedHistory?.notas" :key="index">
                                            <v-card class="mt-2 pa-3 d-flex align-center justify-space-between w-100">
                                                <div class="d-flex align-center">
                                                    <v-icon class="mr-2">mdi-note</v-icon>
                                                    <strong
                                                        style="display: inline-block;width: 22vw;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{
                                                            nota.contenido }}</strong>
                                                </div>
                                                <v-btn :color="'red'" icon @click="delete_note(nota.id)">
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </v-card>
                                        </v-list-item>
                                    </template>
                                    <p v-else class="text-center w-100">No hay notas registradas.</p>
                                </v-list>
                            </v-col>
                            <v-col cols="8" class="d-flex justify-center mx-auto">
                                <v-text-field v-model="nuevaNota" label="Añadir nota" @keyup.enter="addNota"
                                    append-icon="mdi-plus" @click:append="addNota" class="w-100 mx-auto" />
                            </v-col>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-file-document</v-icon> Archivos
                        </h3>
                        <v-card class="pa-4">
                            <v-col cols="12" class="d-flex flex-column align-start">
                                <v-list dense class="w-100">
                                    <template v-if="selectedHistory?.archivos.length > 0">
                                        <v-list-item v-for="(archivo, index) in selectedHistory?.archivos" :key="index">
                                            <v-card class="mt-2 pa-3 d-flex align-center justify-space-between w-100">
                                                <div class="d-flex align-center">
                                                    <v-icon class="mr-2">{{ archivo?.extension == "pdf"
                                                        ? "mdi-file-pdf-box" : "mdi-file-image"
                                                        }}</v-icon>
                                                    <strong
                                                        style="display: inline-block;width: 22vw;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{
                                                            archivo.nombre_archivo }}</strong>
                                                </div>
                                                <div>
                                                    <v-btn :color="'red'" icon @click="eliminarArchivo(archivo.id)">
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
                                    <input type="file" id="fileInput" @change="handleFileChange" class="d-none"
                                        accept="application/pdf, image/*" />
                                    <v-btn color="secondary" @click="abrirSelector">
                                        <v-icon>mdi-upload</v-icon>
                                    </v-btn>
                                </div>
                                <div class="w-100 d-flex justify-center" style="flex-direction: column;">
                                    <v-select v-model="tipoArchivo" class="mx-auto" style="height: 3rem; width: 90%;"
                                        :items="options" label="Tipo de archivo" item-text="name"
                                        item-value="id"></v-select>
                                    <v-btn color="primary" class="w-75 mx-auto mt-5" @click="subirArchivo">
                                        <v-icon>mdi-content-save</v-icon> Subir archivo
                                    </v-btn>
                                </div>
                            </v-col>
                        </v-card>
                        <h3 class="text-center mt-5 mb-5">
                            <v-icon color="primary">mdi-lightbulb-outline</v-icon> Conclusiones
                        </h3>
                        <v-card class="pa-4">
                            <v-list dense>
                                <v-list-item class="d-flex align-start" style="flex-direction: column;">
                                    <div class="mb-3 mt-3">
                                        <v-icon class="mr-2">mdi-lightbulb-outline</v-icon>
                                        <strong>Conclusiones:</strong>
                                    </div>
                                    <v-textarea v-model="conclusion" @input="dataChange" outlined auto-grow rows="5"
                                        class="w-100" />
                                </v-list-item>
                            </v-list>
                        </v-card>
                    </v-container>
                    <v-card-actions class="d-flex justify-center gap-2">
                        <v-btn x-small outlined color="red darken-3" @click="specificHistoryShow = false">
                            Volver
                        </v-btn>
                        <v-btn outlined elevation="6" :disabled="!dataChanged"
                            @click="updateHistory(selectedHistory?.id)" color="green darken-3" x-small type="submit">
                            Actualizar Historial
                        </v-btn>
                        <v-btn outlined elevation="6" :disabled="dataChanged" @click="uploadLogo = true"
                            color="blue darken-3" x-small type="submit">
                            Imprimir
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <!-- Editar un paciente -->
            <v-dialog v-model="editPatient" max-width="800px">
                <v-card color="lighten-4">
                    <v-toolbar dark>
                        <v-icon class="mr-2">mdi-pencil</v-icon>
                        <v-toolbar-title>Actualiza los datos de un paciente</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-form @submit.prevent="updatePatient" v-model="valid">
                        <v-container style="height: 30rem; overflow-y: auto;">
                            <h4 class="text-center mt-5 mb-5">Datos del paciente: </h4>
                            <v-row class="justify-center mt-5">
                                <v-col cols="8">
                                    <v-text-field v-model="namePatient" @input="dataPatientChanged = true"
                                        :rules="nameRules" :counter="20" label="Nombre" required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="phonePatient" @input="dataPatientChanged = true"
                                        :rules="phoneRules" :counter="14" label="Teléfono" required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="emailPatient" @input="dataPatientChanged = true"
                                        :rules="emailRules" label="E-mail" required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="agePatient" @input="dataPatientChanged = true"
                                        :rules="edadRules" :counter="3" label="Edad" required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="weightPatient" @input="dataPatientChanged = true"
                                        :rules="pesoRules" label="Peso (Kg)" required></v-text-field>
                                </v-col>
                                <v-col cols="8">
                                    <v-text-field v-model="heightPatient" @input="dataPatientChanged = true"
                                        :rules="estaturaRules" :counter="4" label="Estatura (Mts)"
                                        required></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <v-card-actions class="d-flex justify-center gap-2">
                            <v-btn x-small outlined color="red darken-3" @click="editPatient = false">
                                Cancelar
                            </v-btn>
                            <v-btn outlined elevation="6" color="green darken-3" :disabled="!dataPatientChanged" x-small
                                type="submit">
                                Actualizar
                            </v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card>
            </v-dialog>
            <!-- Subir logo -->
            <v-dialog v-model="uploadLogo" max-width="700px">
                <v-card color="lighten-4">
                    <v-toolbar dark>
                        <v-icon class="mr-2">mdi-paperclip</v-icon>
                        <v-toolbar-title>Antes de imprimir...</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-container style="height: 30rem; overflow-y: auto;">
                        <h3 class="text-center mt-5 mb-5">
                            Puedes subir un logo que aparecerá en el reporte (Tu logo, el de tu clínica, etc)
                        </h3>
                        <v-card class="pa-4">
                            <v-col cols="12" class="d-flex flex-column align-start">
                                <v-list dense class="w-100">
                                    <template v-if="selectedHistory?.cita?.medico?.logo">
                                        <p class="text-center">Actualmente usas el logo:</p>
                                        <div class="card">
                                            <div class="card-content d-flex gap-3 justify-center align-center">
                                                <v-icon class="mr-2">mdi-file-image</v-icon>
                                                <p class="title mt-3">{{ selectedHistory?.cita?.medico?.logo }}</p>
                                                <v-btn color="red" icon @click="eliminarLogo">
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </div>
                                        </div>
                                    </template>
                                    <template v-else-if="selectedHistory?.cita?.medico">
                                        <p class="text-center w-100">No usas ningún logo aún.</p>
                                    </template>
                                </v-list>
                            </v-col>
                            <v-col cols="12">
                                <div class="d-flex align-center justify-center gap-4">
                                    <p style="width: 60%;">{{ nuevoLogo ? nuevoLogo.name
                                        : "No se ha seleccionado ningún archivo." }}</p>
                                    <input type="file" id="logoInput" @change="handleLogoChange" class="d-none"
                                        accept="image/*" />
                                    <v-btn color="secondary" @click="abrirSelectorLogo">
                                        <v-icon>mdi-upload</v-icon>
                                    </v-btn>
                                </div>
                                <div class="w-100 d-flex justify-center" style="flex-direction: column;">
                                    <v-btn color="primary" class="w-75 mx-auto mt-5" @click="subirLogo">
                                        <v-icon>mdi-content-save</v-icon> Subir archivo
                                    </v-btn>
                                </div>
                            </v-col>
                        </v-card>
                    </v-container>
                    <v-card-actions class="d-flex justify-center gap-2">
                        <v-btn x-small outlined color="red darken-3" @click="uploadLogo = false">
                            Volver
                        </v-btn>
                        <v-btn outlined elevation="6" :disabled="dataChanged" @click="generatePDF(selectedHistory?.id)"
                            color="blue darken-3" x-small type="submit">
                            {{ !selectedHistory?.cita?.medico?.logo ? "Imprimir sin logo" : "Imprimir" }}
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <!-- Tabla de pacientes -->
            <template>
                <h3 class="mt-5  blue--text d-flex justify-center">Gestión de pacientes</h3>
                <v-card class="mx-auto w-75 mt-5 blue accent-3">
                    <v-card-title class="white--text">
                        <v-btn class="mr-5" color="blue" @click="newPatient = true" dark elevation="2">
                            <v-icon left>mdi-account-plus</v-icon>
                            Crear Paciente
                        </v-btn>
                        
                        
                         <v-spacer></v-spacer> 
                        <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line
                            hide-details></v-text-field>
                    </v-card-title>
                    <v-data-table class="text-center justify-center" :headers="headers" :items="pacientes"
                        :search="search">
                        <template v-slot:item="{ item }">
                            <tr>
                                <td>{{ item.nombre_paciente }}</td>
                                <td class="text-center">{{ item.tlf_paciente || '-' }}</td>
                                <td class="text-center">{{ item.email_paciente || '-' }}</td>
                                <td class="text-center">{{ item.edad || '-' }}</td>
                                <td class="text-center">{{ item.peso || '-' }}</td>
                                <td class="text-center">{{ item.estatura || '-' }}</td>
                                <td class="text-center ">
                                    <v-tooltip bottom>
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-btn :color="'blue'" icon @click="abrirModalCitas(item)">
                                     <v-icon           
                                      color="blue"
                                      dark
                                      v-bind="attrs"
                                      v-on="on">mdi-calendar-plus</v-icon>
                                                                </v-btn>
                                  </template>
                                  <span>Asignar Cita</span>
                                </v-tooltip>
                                <v-tooltip bottom>
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-btn :color="'green'" icon @click="abrirModalHistorial(item)">
                                     <v-icon
                                      color="primary"
                                      dark
                                      v-bind="attrs"
                                      v-on="on"
                                        >mdi-book</v-icon>
                                    </v-btn>
                                  </template>
                                  <span>Historial</span>
                                </v-tooltip>
                                <v-tooltip bottom>
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-btn :color="'orange'" icon @click="abrirModalEditar(item)">
                                     <v-icon
                                      color="orange"
                                      dark
                                      v-bind="attrs"
                                      v-on="on"
                                      >mdi-pencil</v-icon>
                                    </v-btn>                                  
                                  </template>
                                  <span>Editar</span>
                                </v-tooltip>
                                <v-tooltip bottom>
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-btn :color="'red'" icon @click="delete_calendar(item.id)">
                                     <v-icon
                                      color="red"
                                      dark
                                      v-bind="attrs"
                                      v-on="on"
                                      >mdi-delete</v-icon>
                                     </v-btn>
                                  </template>
                                  <span>Eliminar</span>
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
            </template>
        </v-main>
        <v-divider></v-divider>
        <v-footer class="mb-auto" color="blue accent-3" padless>
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
    </v-app>
</template>
<script>
import Swal from 'sweetalert2';
export default {
    data: () => ({
        value: '',
        valid: false,
        valueb: 0,
        selectedOpen: false,
        selectedEvent: {},
        selectedElement: null,
        eventToUse: {},
        events: [],
        tabIndex: 3,
        search: null,
        policys: null,
        terms: null,
        cooki: null,
        manual: null,
        dateAppointment:null,
        timeAppointment:null,
        typeAppoinment:null,
        newTypeAppointment: null,
        colors: ['#2196F3', '#3F51B5', '#673AB7', '#00BCD4', '#4CAF50', '#FF9800', '#757575'],
        historyHeaders: [
            {
                text: 'Fecha',
                align: 'center',
                value: 'nombre_paciente',
            },
            { text: 'Diagnostico', value: 'tlf_paciente', align: 'center', },
            { text: 'Tratamiento', value: 'email_paciente', align: 'center', },
            { text: 'Notas', value: 'edad', align: 'center', },
            { text: 'Archivos Relacionados', value: 'peso', align: 'center', },
            { text: 'Acciones', value: 'peso', align: 'center', },
        ],
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
            { text: 'Acciones', value: 'notes', align: 'center', },
        ],
        pacientes: [],
        typeAppointment:['Presencial','Videoconferencia'],
        newPatient: false,
        newAppointment: false,
        historyShow: false,
        specificHistoryShow: false,
        selectedPatient: null,
        selectedHistory: null,
        name: '',
        telephone: '',
        email: '',
        edad: '',
        peso: '',
        estatura: '',
        nameRules: [
            v => !!v || 'El nombre es obligatorio',
        ],
        phoneRules: [
            v => !!v || 'Telefono es obligatorio',
            v => v.length <= 14 || 'Telefono debe tener máximo 14 números',
            v => /[0-9]/.test(v) || 'Telefono debe ser números',
        ],
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
        motivo: '',
        nuevoSintoma: '',
        sintomas: [],
        historial: [],
        sintomasHistorial: [],
        motivoConsulta: '',
        diagnostico: '',
        tratamiento: '',
        examen_fisico: '',
        examen_funcional: '',
        examen_paraclinico: '',
        conclusion: '',
        nuevaNota: '',
        nuevoArchivo: null,
        tipoArchivo: null,
        options: [
            { id: "EXAMEN", name: 'Exámen' },
            { id: "RADIOLOGIA", name: 'Radiología' },
            { id: "RECETA", name: 'Receta' },
            { id: "LABORATORIO", name: 'Laboratorio' },
            { id: "OTRO", name: 'Otro' },
        ],
        uploadLogo: false,
        nuevoLogo: null,
        dataChanged: false,
        namePatient: "",
        phonePatient: "",
        emailPatient: "",
        agePatient: "",
        weightPatient: "",
        heightPatient: "",
        dataPatientChanged: false,
        editPatient: false,
    }),
    props: {
        medico: { type: String },
        user: { type: String },
    },
    mounted() {
        this.fetchApiProbe();
        this.fetchApiEvents();
       // console.log(this.dateAppointment)
    },
    computed: {
        nombrePaciente() {
            return this.selectedPatient ? this.selectedPatient.nombre_paciente : '';
        },
        emailPaciente() {
            return this.selectedPatient ? this.selectedPatient.email_paciente : '';
        },
        tlfPaciente() {
            return this.selectedPatient ? this.selectedPatient.tlf_paciente : '';
        }
    },
    methods: {
        fetchApiProbe() {
            fetch('/api/patients/', {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.pacientes = response.dato;
                })
                .catch(err => { console.log(err) });
        },
        fetchApiEvents() {
            fetch('/api/calendar_doctor/', {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.events = response.dato.filter((response) => { return response.id_medico == this.medico && response.id_paciente == null })
                })
                .catch(err => { console.log(err) })
        },
        setEventToUse(event) {
            this.eventToUse = event;
            event.name = "Seleccionado";
            console.log(this.eventToUse);
        },
        createPatient() {
            fetch('/api/patients/create', {
                method: 'POST',
                mode: 'cors',
                body: JSON.stringify({
                    nombre: this.name,
                    telefono: parseInt(this.telephone),
                    email: this.email,
                    edad: this.edad,
                    peso: this.peso,
                    estatura: this.estatura
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
                        this.fetchApiProbe();
                    } else {
                        console.log('Error al crear paciente: ', data.message);
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                });
        },
        updatePatient() {
            fetch(`/api/patients/update/${this.selectedPatient?.id}`, {
                method: 'PATCH',
                mode: 'cors',
                body: JSON.stringify({
                    nombre: this.namePatient,
                    telefono: parseInt(this.phonePatient),
                    email: this.emailPatient,
                    edad: this.agePatient,
                    peso: (this.weightPatient).toString(),
                    estatura: this.heightPatient,
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Paciente actualizado',
                            text: 'La información del paciente se ha actualizado correctamente.',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => {
                            this.namePatient = '';
                            this.phonePatient = '';
                            this.emailPatient = '';
                            this.agePatient = '';
                            this.weightPatient = '';
                            this.heightPatient = '';
                            this.editPatient = false;
                            this.fetchApiProbe();
                        });

                    } else {
                        console.error('Error al actualizar paciente: ', data.message);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Error al actualizar el paciente.',
                        });
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un error al comunicarse con el servidor.',
                    });
                });
        },
        abrirModalCitas(patient) {
            this.selectedPatient = patient;
            this.newAppointment = true;
        },
        abrirModalHistorial(patient) {
            fetch(`/api/history/${patient.id}`, {
                headers: {
                    'Content-Type': 'Application/json'
                },
            })
                .then(response => response.json())
                .then(response => {
                    this.historial = response.dato;
                    console.log(this.historial);
                })
                .catch(err => { console.log(err) });
            this.selectedPatient = patient;
            this.historyShow = true;
        },
        abrirModalHistorialEspecifico(history) {
            this.selectedHistory = history;
            this.motivoConsulta = history.cita?.motivo_consulta
            this.sintomasHistorial = history.cita?.sintomas ? history.cita.sintomas.split(',') : [];
            this.diagnostico = history.diagnostico;
            this.tratamiento = history.tratamiento;
            this.examen_fisico = history.examen_fisico;
            this.examen_funcional = history.examen_funcional;
            this.examen_paraclinico = history.examen_paraclinico;
            this.conclusion = history.conclusiones;
            this.specificHistoryShow = true;
        },
        abrirModalEditar(patient) {
            this.selectedPatient = patient;
            this.namePatient = patient?.nombre_paciente
            this.phonePatient = patient?.tlf_paciente
            this.emailPatient = patient?.email_paciente
            this.agePatient = patient?.edad
            this.weightPatient = patient?.peso
            this.heightPatient = patient?.estatura
            this.editPatient = true;
        },
        updateHistory(id) {
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
            fetch(`/api/history/update/${id}`, {
                method: 'PATCH',
                mode: 'cors',
                body: JSON.stringify({
                    motivo: this.motivoConsulta,
                    sintomas: this.sintomasHistorial.join(", ") || "",
                    diagnostico: this.diagnostico,
                    tratamiento: this.tratamiento,
                    examen_fisico: this.examen_fisico,
                    examen_funcional: this.examen_funcional,
                    examen_paraclinico: this.examen_paraclinico,
                    conclusion: this.conclusion
                }),
                headers: {
                    'Content-Type': 'Application/json',
                    'Accept': 'Application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.code == 200) {
                        Swal.fire({
                            title: "Historial Actualizado.",
                            text: "Ya puedes proceder con la impresión.",
                            icon: "success",
                            timer: 1000,
                            showConfirmButton: false
                        });
                        this.selectedPatient = null;
                        this.motivo = '';
                        this.sintomas = [];
                        this.nuevoSintoma = '';
                        this.dataChanged = false;
                        this.selectedHistory = data.dato;
                        this.fetchApiEvents();
                    } else {
                        console.log('Error al actualizar el historial: ', data.message);
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                });
        },
        formatDate(date) {
            if (date == null) {
                return "No has seleccionado una cita aún.";
            }
            const parsedDate = new Date(date);
            if (isNaN(parsedDate.getTime())) {
                return "No has seleccionado una cita aún.";
            }
            const day = String(parsedDate.getDate()).padStart(2, '0');
            const month = String(parsedDate.getMonth() + 1).padStart(2, '0');
            const year = parsedDate.getFullYear();
            const hours = String(parsedDate.getHours()).padStart(2, '0');
            const minutes = String(parsedDate.getMinutes()).padStart(2, '0');
            return `${day}/${month}/${year} a las ${hours}:${minutes}`;
        },
        getEventColor(event) {
            return event.paciente ? 'red' : event.color;
        },
        startDrag({ event, timed }) {
            if (event && timed) {
                this.dragEvent = event
                this.dragTime = null
                this.extendOriginal = null
            }
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
        toTime(tms) {
            return new Date(tms.year, tms.month - 1, tms.day, tms.hour, tms.minute).getTime()
        },
        toTime2(tms, i) {
            return new Date(tms.year, tms.month - 1, tms.day + i, tms.hour, tms.minute).getTime()
        },
        startTime(tms) {
            const mouse = this.toTime(tms)
            const e = this.changeState()
            const f = this.changeStateb()
            if (this.dragEvent && this.dragTime == null) {
                const start = this.dragEvent.start
                this.dragTime = mouse - start
            } else {

                this.createStart = this.roundTime(mouse)
                let day = new Date(this.createStart).toISOString().substring(0, 10)
                let hour = new Date(this.createStart).toTimeString().substring(0, 5)
                const fixty = 900000
                const zerty = 1800000
                const forty = 2700000
                const sixty = 3600000
                const dayli = 1
                const monty = 31
                const twomonty = 62
                const threemonty = 93
                const formonty = 124
                const sixmonty = 186
                const oneyear = 360
                if (f == '1 Día') {
                    this.cantidad = dayli
                    this.tiempito = 600
                } else if (f == '1 Mes') {
                    this.cantidad = monty
                    this.tiempito = 3000
                } else if (f == '2 Meses') {
                    this.cantidad = twomonty
                    this.tiempito = 4000
                } else if (f == '3 Meses') {
                    this.cantidad = threemonty
                    this.tiempito = 4000
                } else if (f == '4 Meses') {
                    this.cantidad = formonty
                    this.tiempito = 4000
                } else if (f == '6 Meses') {
                    this.cantidad = sixmonty
                    this.tiempito = 6000
                } else if (f == '1 Año') {
                    this.cantidad = oneyear
                    this.tiempito = 6000
                }
                if (e == 30) {
                    this.ending = zerty
                }/*else if (e == 45){
            this.ending = forty
          }*/else if (e == 60) {
                    this.ending = sixty
                }
                let sum = this.createStart + this.ending
                let day_ = new Date(sum).toISOString().substring(0, 10)
                let hour_ = new Date(sum).toTimeString().substring(0, 5)
                let day2 = new Date(day)
                this.createEvent = {
                    name: `hora:`,
                    color: this.rndElement(this.colors),
                    start: `${day} ${hour}`,
                    end: `${day_} ${hour_}`,
                    medico: this.medico,
                }
                this.events.push(this.createEvent)
                this.storeCalendar()
                this.interval = setInterval(() => {
                    if (this.valueb === 100) {

                        this.valueb = 0
                        return clearInterval(this.interval)
                    }
                    this.valueb += 10
                }, this.tiempito)
                for (let i = 0; i <= this.cantidad; i += 7) {
                    this.valueb = 10
                    let asd = day2.setDate(day2.getDate() + 7)
                    let day3 = new Date(asd).toISOString().substring(0, 10)

                    console.log(`fecha: ${day3}, ciclo: ${i}`)
                    this.createEvent = {
                        name: `hora:`,
                        color: this.rndElement(this.colors),
                        start: `${day3} ${hour}`,
                        end: `${day3} ${hour_}`,
                        medico: this.medico,
                    }
                    this.events.push(this.createEvent)
                    this.storeCalendar()
                }
            }
        },
        changeState(valor) {
            this.selected = this.selectedItem
            return this.selected
        },
        changeStateb(valor) {
            this.selected = this.selectedItemb
            return this.selected
        },
        roundTime(time, down = true) {
            const roundTo = 30
            const roundDownTime = roundTo * 60 * 1000
            return down
                ? time - time % roundDownTime
                : time + (roundDownTime - (time % roundDownTime))
        },
        agregarSintoma() {
            if (this.nuevoSintoma.trim() !== '') {
                this.sintomas.push(this.nuevoSintoma.trim());
                this.nuevoSintoma = '';
            }
        },
        eliminarSintoma(index) {
            this.sintomas.splice(index, 1);
        },
        eliminarSintomaHistorial(index) {
            this.sintomasHistorial.splice(index, 1);
            this.dataChange();
        },
        agregarSintomaHistorial(index) {
            if (this.nuevoSintoma.trim() !== '') {
                this.sintomasHistorial.push(this.nuevoSintoma.trim());
                this.nuevoSintoma = '';
                this.dataChange();
            }
        },
        rnd(a, b) {
            return Math.floor((b - a + 1) * Math.random()) + a
        },
        rndElement(arr) {
            return arr[this.rnd(0, arr.length - 1)]
        },
        updateAppointment() {
            let dateAppointmentForm = this.dateAppointment
            
           let hourAppintmentForm = this.timeAppointment;
                    console.log("Valor de hourAppintmentForm:", hourAppintmentForm);
                     let newHourAppointment = ''; // Declarar la variable fuera del if


                    // Ajustar la expresión regular para permitir "HH:mm" o "HH:mm:ss"
                    if (hourAppintmentForm && typeof hourAppintmentForm === 'string' && /^\d{2}:\d{2}(:\d{2})?$/.test(hourAppintmentForm)) {
                        const parts = hourAppintmentForm.split(':');
                        const hours = parseInt(parts[0], 10);
                        const minutes = parseInt(parts[1], 10);
                        const seconds = parts.length > 2 ? parseInt(parts[2], 10) : 0; // Si no hay segundos, asumimos 0

                        if (!isNaN(hours) && !isNaN(minutes) && !isNaN(seconds) &&
                            hours >= 0 && hours <= 23 &&
                            minutes >= 0 && minutes <= 59 &&
                            seconds >= 0 && seconds <= 59) {

                            const appointmentDate = new Date();
                            appointmentDate.setHours(hours);
                            appointmentDate.setMinutes(minutes);
                            appointmentDate.setSeconds(seconds);
                            appointmentDate.setMilliseconds(0);

                            const thirtyMinutesInMillis = 30 * 60 * 1000;
                            const newAppointmentTimeMs = appointmentDate.getTime() + thirtyMinutesInMillis;
                            const newAppointmentDate = new Date(newAppointmentTimeMs);

                            const newHours = String(newAppointmentDate.getHours()).padStart(2, '0');
                            const newMinutes = String(newAppointmentDate.getMinutes()).padStart(2, '0');
                            const newSeconds = String(newAppointmentDate.getSeconds()).padStart(2, '0');

                            newHourAppointment = `${newHours}:${newMinutes}`;

                           // console.log("Nueva hora (30 minutos después):", newHourAppointment);
                           // this.timeAppointment = newHourAppointment;

                        } else {
                            console.error("Error: Formato de hora inválido o valores fuera de rango.");
                        }
                    } else {
                        console.error("Error: `hourAppintmentForm` no es una cadena con el formato HH:mm o HH:mm:ss.");
                    }
                                //console.log('date:',this.dateAppointment)
            //console.log('hour:',this.timeAppointment)
            console.log("Nueva hora (30 minutos después):", `${this.eventToUse}`);
            fetch(`/api/calendar_doctor/update/`, {
                method: 'PATCH',
                mode: 'cors',
                body: JSON.stringify({
                    id_paciente: this.selectedPatient.id,
                    motivo_consulta: this.motivo,
                    sintomas: this.sintomas.join(", ") || "",
                    name: `Hora:`,
                    color: this.rndElement(this.colors),
                    start: `${dateAppointmentForm} ${hourAppintmentForm}`,
                    end: `${dateAppointmentForm} ${newHourAppointment}`,
                    medico: this.medico,
                    newTypeAppointment: this.newTypeAppointment,
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
                        this.motivo = '';
                        this.sintomas = [];
                        this.nuevoSintoma = '';
                        this.newTypeAppointment = '';
                        this.timeAppointment= '';
                        this.dateAppointment = '';
                        this.newAppointment = false;
                        this.fetchApiProbe();
                        Swal.fire({
                        title: "Cita Añadida Exitosamente",
                        icon: "success",
                        showCancelButton: true,
                        cancelButtonText: '<span style="color: white;">Salir</span>',
                    })

                    } else {
                        Swal.fire({
                        title: "Debe llenar los campos para avanzar",
                        icon: "warning",
                        showCancelButton: true,
                        cancelButtonText: '<span style="color: white;">Salir</span>',
                    })
                        console.log('Error al crear paciente: ', data.message);
                    }
                })
                .catch(error => {
                    console.error('Hubo un error al enviar la solicitud:', error);
                });
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
                            const historial = this.selectedHistory;
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
                    id_historial: this.selectedHistory?.id,
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
                    if (this.selectedHistory) {
                        this.selectedHistory.notas.push(data.data);
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
            formData.append('id_historial', this.selectedHistory?.id);
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
                    if (this.selectedHistory) {
                        this.selectedHistory.archivos.push(data.archivo);
                    }
                    this.nuevoArchivo = null;
                    this.tipoArchivo = null;
                })
                .catch(err => console.error('Error:', err));
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
                            const historial = this.selectedHistory;
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
        generateAllPDF(id) {
            window.open(`/api/history/pdf/generate/all/${id}`, '_blank');
        },
        generatePDF(id) {
            window.open(`/api/history/pdf/generate/${id}`, '_blank');
        },
        dataChange() {
            this.dataChanged = true
        },
        handleLogoChange(event) {
            const file = event.target.files[0];
            if (file) {
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        title: "Atención",
                        text: "Por favor, selecciona una Imágen.",
                        icon: "error",
                        confirmButtonText: '<span style="color: white;">Entendido</span>',
                        confirmButtonColor: "green"
                    });
                    return;
                }
                this.nuevoLogo = file;
            }
        },
        openUploadLogo(history) {
            this.selectedHistory = history;
            this.uploadLogo = true
        },
        abrirSelectorLogo() {
            document.getElementById('logoInput')?.click();
        },
        subirLogo() {
            if (!this.nuevoLogo) {
                Swal.fire({
                    title: "Atención",
                    text: "Por favor, selecciona un logo.",
                    icon: "error",
                    confirmButtonText: '<span style="color: white;">Entendido</span>',
                    confirmButtonColor: "green"
                });
            }
            const formData = new FormData();
            formData.append('logo', this.nuevoLogo);
            fetch(`/api/calendar_doctor/uploadLogo/${this.selectedHistory?.cita?.medico?.id}`, {
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
                        throw new Error('Error al subir el archivo.');
                    }
                    return response.json();
                })
                .then(data => {
                    this.selectedHistory.cita.medico.logo = data.logo_path
                    this.nuevoLogo = null;
                })
                .catch(err => console.error('Error:', err));
        },
        eliminarLogo() {
            fetch(`/api/calendar_doctor/deleteLogo/${this.selectedHistory?.cita?.medico?.id}`, {
                method: 'DELETE',
                mode: 'cors',
                headers: {
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw new Error(err.message || 'Error al eliminar el logo.') });
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Logo eliminado',
                        text: 'El logo se ha eliminado correctamente.',
                        timer: 1000,
                        showConfirmButton: false
                    }).then(() => {
                        this.selectedHistory.cita.medico.logo = null;
                    });
                })
                .catch(err => {
                    console.error('Error:', err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.message || 'Error al eliminar el logo.',
                    });
                });
        },
        prev() {
            this.$refs.calendar.prev()
            this.title = this.$refs.calendar.title
        },
        next() {
            this.$refs.calendar.next()
            this.title = this.$refs.calendar.title
        },
        notImplemented() {
            alert("Esta función aún no ha sido completada.");
        }
    }
}
</script>
