import Vue from 'vue'
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'

Vue.use(Vuetify)

// opts options are optional, but I've added them as a simple.
const opts = {
    theme: { dark: true }, 
    rtl: true
}

export default new Vuetify(opts)