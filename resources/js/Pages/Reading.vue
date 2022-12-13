<template>
  <Head><title>Utility Reading</title></Head>
  <form class="px-5 py-5" method="POST">
    <ComboBox :options="utilities"></ComboBox>
  </form>
</template>

<script>
import layout from "./Layouts/layout.vue";
import ComboBox from "./Components/ComboBox.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  layout: layout,
  components: {
    Head,
    ComboBox,
  },
  props: {
    utilities: Object,
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
