<template>
  <Head><title>Current Houses</title></Head>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">
          Houses and Their Tenants
        </h1>
        <p class="mt-2 text-sm text-gray-700">
          List of houses you are managing.
        </p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button
          type="button"
          class="
            inline-flex
            items-center
            justify-center
            rounded-md
            border border-transparent
            bg-indigo-600
            px-4
            py-2
            text-sm
            font-medium
            text-white
            shadow-sm
            hover:bg-indigo-700
            focus:outline-none
            focus:ring-2
            focus:ring-indigo-500
            focus:ring-offset-2
            sm:w-auto
          "
        >
          Add House / Apartment
        </button>
      </div>
    </div>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div
            class="
              relative
              overflow-hidden
              shadow
              ring-1 ring-black ring-opacity-5
              md:rounded-lg
            "
          >
            <div
              v-if="selectedHouses.length > 0"
              class="
                absolute
                top-0
                left-12
                flex
                h-12
                items-center
                space-x-3
                bg-gray-50
                sm:left-16
              "
            >
              <button
                type="button"
                class="
                  inline-flex
                  items-center
                  rounded
                  border border-gray-300
                  bg-white
                  px-2.5
                  py-1.5
                  text-xs
                  font-medium
                  text-gray-700
                  shadow-sm
                  hover:bg-gray-50
                  focus:outline-none
                  focus:ring-2
                  focus:ring-indigo-500
                  focus:ring-offset-2
                  disabled:cursor-not-allowed disabled:opacity-30
                "
              >
                Bulk edit
              </button>
              <button
                type="button"
                class="
                  inline-flex
                  items-center
                  rounded
                  border border-gray-300
                  bg-white
                  px-2.5
                  py-1.5
                  text-xs
                  font-medium
                  text-gray-700
                  shadow-sm
                  hover:bg-gray-50
                  focus:outline-none
                  focus:ring-2
                  focus:ring-indigo-500
                  focus:ring-offset-2
                  disabled:cursor-not-allowed disabled:opacity-30
                "
              >
                Delete all
              </button>
            </div>
            <table class="min-w-full table-fixed divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">
                    <input
                      type="checkbox"
                      class="
                        absolute
                        left-4
                        top-1/2
                        -mt-2
                        h-4
                        w-4
                        rounded
                        border-gray-300
                        text-indigo-600
                        focus:ring-indigo-500
                        sm:left-6
                      "
                      :checked="
                        indeterminate || selectedHouses.length === houses.length
                      "
                      :indeterminate="indeterminate"
                      @change="
                        selectedHouses = $event.target.checked
                          ? houses.map((p) => p.email)
                          : []
                      "
                    />
                  </th>
                  <th
                    scope="col"
                    class="
                      min-w-[12rem]
                      py-3.5
                      pr-3
                      text-left text-sm
                      font-semibold
                      text-gray-900
                    "
                  >
                    House
                  </th>
                  <th
                    scope="col"
                    class="
                      px-3
                      py-3.5
                      text-left text-sm
                      font-semibold
                      text-gray-900
                    "
                  >
                    Tenant
                  </th>
                  <th
                    scope="col"
                    class="
                      px-3
                      py-3.5
                      text-left text-sm
                      font-semibold
                      text-gray-900
                    "
                  >
                    Status
                  </th>
                  <th
                    scope="col"
                    class="
                      px-3
                      py-3.5
                      text-left text-sm
                      font-semibold
                      text-gray-900
                    "
                  >
                    Remarks
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <tr
                  v-for="house in houses.data"
                  :key="house.id"
                  :class="[selectedHouses.includes(house.id) && 'bg-gray-50']"
                >
                  <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                    <div
                      v-if="selectedHouses.includes(house.id)"
                      class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"
                    ></div>
                    <input
                      type="checkbox"
                      class="
                        absolute
                        left-4
                        top-1/2
                        -mt-2
                        h-4
                        w-4
                        rounded
                        border-gray-300
                        text-indigo-600
                        focus:ring-indigo-500
                        sm:left-6
                      "
                      :value="house.id"
                      v-model="selectedHouses"
                    />
                  </td>
                  <td
                    :class="[
                      'whitespace-nowrap py-4 pr-3 text-sm font-medium',
                      selectedHouses.includes(house.id)
                        ? 'text-indigo-600'
                        : 'text-gray-900',
                    ]"
                  >
                    {{ house.house_number }}
                  </td>

                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    {{ house.tenant }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    {{ house.status }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    {{ house.remarks }}
                  </td>
                  <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <Link
                      :href="`house/reading/${house.id}`"
                      class="
                        inline-flex
                        items-center
                        rounded-full
                        border border-transparent
                        bg-indigo-600
                        p-1.5
                        text-white
                        shadow-sm
                        hover:bg-indigo-700
                        focus:outline-none
                        focus:ring-2
                        focus:ring-indigo-500
                        focus:ring-offset-2
                      "
                    >
                      <PlusIconMini class="h-5 w-5" aria-hidden="true" />
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="py-5">
              <Pagination :links="houses.links"></Pagination>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import layout from "./Layouts/layout.vue";
import Pagination from "./Shared/Pagination.vue";
import { Head } from "@inertiajs/inertia-vue3";

import { PlusIcon as PlusIconMini } from "@heroicons/vue/20/solid";
import { PlusIcon as PlusIconOutline } from "@heroicons/vue/24/outline";

export default {
  layout: layout,
  components: {
    Head,
    Pagination,
    PlusIconMini,
  },
  props: {
    houses: Object,
  },
  data() {
    return {
      selectedHouses: [],
    };
  },
  computed: {
    indeterminate() {
      return (
        this.selectedHouses.length > 0 &&
        this.selectedHouses.length < this.houses.length
      );
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
