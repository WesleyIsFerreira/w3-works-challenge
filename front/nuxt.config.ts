// https://nuxt.com/docs/api/configuration/nuxt-config
import Aura from '@primevue/themes/aura';

export default defineNuxtConfig({
  compatibilityDate: "2024-11-01",
  devtools: { enabled: true },
  css: ["@/assets/css/reset.css", "@/assets/css/container.css"],
  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: '@use "@/assets/scss/variables.scss" as *;'
        }
      }
    }
  },
  modules: [
    '@primevue/nuxt-module'
  ],
  primevue: {
    options: {
        theme: {
            preset: Aura
        }
    }
  }
});
