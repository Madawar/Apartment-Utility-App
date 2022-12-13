<template>
  <nav
    class="
      flex
      items-center
      justify-between
      border-t border-gray-200
      px-4
      sm:px-0
    "
  >
    <div class="md:-mt-px md:flex">
      <Component
        :is="link.url ? 'Link' : 'span'"
        v-for="link in links"
        class="
          inline-flex
          items-center
          border-t-2 border-transparent
          px-4
          pt-4
          text-sm
          font-medium
          text-gray-500
          hover:border-gray-300 hover:text-gray-700
        "
        :class="
          link.active ? 'border-t-2 border-indigo-500 text-indigo-600' : ''
        "
        :href="link.url"
        v-html="link.label"
      />
    </div>
  </nav>
</template>

<script setup>
import { ArrowLongLeftIcon, ArrowLongRightIcon } from "@heroicons/vue/20/solid";
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
  links: Array,
});
</script>
