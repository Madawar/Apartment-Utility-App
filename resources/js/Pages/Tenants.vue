<template>
  <Head><title>Tenants</title></Head>
</template>

<script>
import layout from "./Layouts/layout.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  layout: layout,
  components: {
    Head,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
