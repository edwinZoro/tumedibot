<template>
  <div>
   <v-navigation-drawer class="blue darken-2" dark v-model="drawer" temporary app width="300">
      <v-list>
          <v-list-item class="px-4 d-flex justify-center align-center">
            <v-list-item-avatar >
              <v-img src="/medibot_f.png"></v-img>
            </v-list-item-avatar>
          </v-list-item>

          <v-list-item link>
            <v-list-item-content>
              <v-list-item-title class="text-h6 text-center">
                TUMEDIBOT
              </v-list-item-title>
              <v-list-item-subtitle class="text-center">Tu App Médica</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <v-divider></v-divider>  
      <v-list nav dense>
        <v-list-item-group v-model="group" active-class="blue darken-4">
          <!-- Items del menú -->
          <v-list-item :href="`/diseaseRobot`" :class="{'blue darken-4': isActive('/diseaseRobot')}">
            <v-list-item-icon>
              <v-icon>mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Principal</v-list-item-title>
          </v-list-item>

              <!-- Grupo Médicos -->
          <v-list-group
            v-if="hasMedicalAccess && userId"
            :value="isActive('/area_medico') || isActive('/pacientes') || isActive('/api/calendario')"
            prepend-icon="mdi-doctor"
          >
            <template v-slot:activator>
              <v-list-item-title>Médicos</v-list-item-title>
            </template>

            <!-- Subitems -->
            <v-list-item 
              :href="`/area_medico/${userId}`"
              :class="{'blue darken-4': isActive(`/area_medico/${userId}`)}"
            >
              <v-list-item-icon>
                <v-icon>mdi-stethoscope</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Área Médico</v-list-item-title>
            </v-list-item>

            <v-list-item 
              :href="`/pacientes/${medicoId}/${userId}`"
              v-if="medicoId"
              :class="{'blue darken-4': isActive(`/pacientes/${medicoId}/${userId}`)}"
            >
              <v-list-item-icon>
                <v-icon>mdi-account-multiple</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Pacientes</v-list-item-title>
            </v-list-item>

            <v-list-item
              :href="`/api/calendario/medico/${medicoId}/${userId}`"
              v-if="medicoId"
              :class="{'blue darken-4': isActive(`/api/calendario/medico/${medicoId}/${userId}`)}"
            >
              <v-list-item-icon>
                <v-icon>mdi-calendar</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Citas</v-list-item-title>
            </v-list-item>
          </v-list-group>

          <v-list-item :href="hrefc">
            <v-list-item-icon>
              <v-icon>mdi-hospital-box</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Buscar Médicos</v-list-item-title>
          </v-list-item>

          <v-list-item :href="hrefd">
            <v-list-item-icon>
              <v-icon>mdi-hospital-building</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Empresas de Salud</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
         <v-list-item @click="showNotifications = true">
          <v-list-item-icon>
            <v-badge
              :content="unreadNotificationsCount"
              :value="unreadNotificationsCount"
              overlap
              color="green"
            >
              <v-icon>
                mdi-bell
              </v-icon>
            </v-badge>
          </v-list-item-icon>
          <v-list-item-title>Notificaciones</v-list-item-title>
        </v-list-item>
      </v-list>
       <template v-slot:append>
        <div class="pa-2">
          <v-btn block>
            Logout
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>
    <!-- <v-app-bar color="primary" dark app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-tabs 
        v-model="tabIndex" 
        background-color="primary" 
        centered 
        dark 
        icons-and-text 
        class="hidden-sm-and-down"
      >
        <v-tabs-slider color="white"></v-tabs-slider>
        <v-tab 
          v-for="(tab, index) in tabs" 
          :key="index"
          :href="tab.link"
        >
          {{ tab.title }}
          <v-icon>{{ tab.icon }}</v-icon>
        </v-tab>
      </v-tabs>
    </v-app-bar>-->
     <v-app-bar color="primary" dark app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-tabs v-model="tabIndex" background-color="primary" centered dark icons-and-text class="hidden-sm-and-down">
        <v-tabs-slider color="white"></v-tabs-slider>
        <v-tab :href="`/diseaseRobot`">
          Principal
          <v-icon>mdi-home</v-icon>
        </v-tab>
        <!-- Menú Médicos -->
        <v-tab v-if="hasMedicalAccess && userId">
          <v-menu open-on-hover offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-tab v-bind="attrs" v-on="on">
                Médicos
                <v-icon>mdi-doctor</v-icon>
              </v-tab>
            </template>
            <v-list>
              <v-list-item :href="`/area_medico/${userId}`">
                <v-list-item-icon>
                  <v-icon>mdi-stethoscope</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Área Médico</v-list-item-title>
              </v-list-item>

              <v-list-item 
                :href="`/pacientes/${medicoId}/${userId}`" 
                v-if="medicoId">
                <v-list-item-icon>
                  <v-icon>mdi-account-multiple</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Pacientes</v-list-item-title>
              </v-list-item>

              <v-list-item 
                :href="`/api/calendario/medico/${medicoId}/${userId}`" 
                v-if="medicoId">
                <v-list-item-icon>
                  <v-icon>mdi-calendar</v-icon>
                </v-list-item-icon>
                <v-list-item-title>Citas</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-tab>
        <v-tab :href="hrefc">
          Buscar Médicos
          <v-icon>mdi-hospital-box</v-icon>
        </v-tab>
        <v-tab :href="hrefd">
          Empresas de Salud
          <v-icon>mdi-hospital-building</v-icon>
        </v-tab>
        <v-tab @click="showNotifications = true">
          Notificaciones
          <v-badge
            :content="unreadNotificationsCount"
            :value="unreadNotificationsCount"
            overlap
            color="green"
          >
            <v-icon>
              mdi-bell
            </v-icon>
          </v-badge>
        </v-tab>
      </v-tabs>
    </v-app-bar> 
      <v-dialog v-model="showNotifications" persistent width="auto">
      <v-card>
        <v-card-title>
          <span class="text-h5">Notificaciones</span>
        </v-card-title>
        <v-card-text>
          <v-list v-if="notifications.length > 0">
            <v-list-item v-for="(notification, index) in notifications" :key="index">
              <v-list-item-content>
                <v-list-item-title>{{ notification.data.mensaje }}</v-list-item-title>
                <v-list-item-subtitle class="text-caption">
                  {{ new Date(notification.created_at).toLocaleString() }}
                </v-list-item-subtitle>
              </v-list-item-content>
              <v-list-item-action>
                <v-btn icon @click="markAsRead(notification.id)">
                  <v-icon>mdi-check</v-icon>
                </v-btn>
              </v-list-item-action>
            </v-list-item>
          </v-list>
          <div v-else>
            No tienes notificaciones nuevas.
          </div>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue-grey darken-1" text @click="showNotifications = false">
            Cerrar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data: () => ({
    drawer: false,
    group: null,
    tabIndex:null,
    hasMedicalAccess: false,
    hasEmpresarialAccess: false,
    userId: null,
    medicoId:null,
    unreadNotificationsCount: 0,
    notifications: [],
    showNotifications: false,
    tabs: [
      { title: 'Principal', link: '/diseaseRobot', icon: 'mdi-home' },
      { title: 'Área Médico', link: '/area_medico/', icon: 'mdi-doctor' },
      { title: 'Calendario', link: '/api/calendario/medico/', icon: 'mdi-calendar' },
      { title: 'Pacientes', link: '/pacientes/', icon: 'mdi-account-multiple' },
      { title: 'Buscar Médicos', link: '/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador', icon: 'mdi-hospital-box' },
      { title: 'Empresas de Salud', link: '/lista_de_empresas_de_salud_disponibles_en_tumedibot.com/Super_Buscador_Empresarial', icon: 'mdi-hospital-building' }
    ],
    hrefc: '/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador',
    hrefd: "/lista_de_empresas_de_salud_disponibles_en_tumedibot.com/Super_Buscador_Empresarial",
  }),
  mounted() {
    this.fetchAccessData();
    this.fetchNotifications();
  },
   computed: {
    currentPath() {
      return window.location.pathname;
    },
    currentTabIndex() {
      return this.tabs.findIndex(tab => 
        this.currentPath.startsWith(tab.link) || 
        (this.userId && this.currentPath.startsWith(`/area_medico/${this.userId}`)) ||
        (this.medicoId && this.currentPath.startsWith(`/api/calendario/medico/${this.medicoId}`))
      );
    }
  },
  
 methods: {
    isActive(path) {
      return this.currentPath.startsWith(path) || 
             (this.userId && this.currentPath.startsWith(`/area_medico/${this.userId}`) && path === '/area_medico/') ||
             (this.medicoId && this.currentPath.startsWith(`/api/calendario/medico/${this.medicoId}`) && path === '/api/calendario/medico/');
    },
    
    async fetchAccessData() {
      try {
        const response = await axios.get('/api/navigation-access/');
        this.hasMedicalAccess = response.data.hasMedicalAccess;
        this.hasEmpresarialAccess = response.data.hasEmpresarialAccess;
        this.userId = response.data.userId;
        this.medicoId = response.data.medicoId;
        
        // Actualizar links dinámicos
        this.tabs[1].link = `/area_medico/${this.userId}`;
        this.tabs[2].link = `/api/calendario/medico/${this.medicoId}/${this.userId}`;
        this.tabs[3].link = `/pacientes/${this.medicoId}/${this.userId}`;
      } catch (error) {
        console.error('Error fetching access data:', error);
      }
    },
    async fetchNotifications() {
      try {
        const response = await axios.get('/api/notifications');
        this.notifications = response.data;
        this.unreadNotificationsCount = this.notifications.filter(notification => notification.read_at === null).length;
      } catch (error) {
        console.error('Error fetching notifications:', error);
      }
    },

    async markAsRead(notificationId) {
      try {
        await axios.put(`/api/notifications/${notificationId}/read`);
        this.fetchNotifications(); // Recargar notificaciones después de marcar como leída
      } catch (error) {
        console.error('Error marking notification as read:', error);
      }
    }, 

  }
}
</script>