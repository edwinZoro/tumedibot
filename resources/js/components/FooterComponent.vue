<template>
  <v-footer dark padless>
    <v-card flat tile width="100%" class="blue darken-3 white--text text-center">
      <v-card-text>
        <a :href="`/politicas/privacidad`" class="mx-2 white--text">Privacidad</a>
        &middot;
        <a :href="`/terminos/y/condiciones`" class="mx-2 white--text">Términos y condiciones</a>
        &middot;
        <a :href="`/cookies/politicas`" class="mx-2 white--text">Política de Cookies</a>
        &middot;
        <a :href="`/manual_de_usuario`" class="mx-2 white--text">Manual de Usuario</a>
      </v-card-text>

      <v-card-text class="white--text text-center">
        Copyright &copy; tumedibot 2025
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<script>
export default {
  data: () => ({
  	privacyUrl: '/politicas/privacidad',
  	termsUrl: '/terminos/y/condiciones',
  	cookiesUrl: '/cookies/politicas',
  	manual_usuario: '/manual_de_usuario'
  }),
};
</script>