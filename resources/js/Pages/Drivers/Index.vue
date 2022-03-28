<template>
  <Head title="Liste des drivers"/>

  <BreezeAuthenticatedLayout>
    <template #header >
        <div class="flex md:flex-row md:justify-between w-full">
            <p> Liste des drivers  </p>
            <p class="ml-2 p-2 bg-green-50 shadow-sm text-lg"> Total:  <span class=" text-green-600">{{drivers.data.length}} </span>   </p>
        </div>

    </template>

    <div class="lg:w-2/3 mt-5">
    <div v-show="$page.props.flash.success"
           class="inline-flex w-full mb-4 overflow-hidden bg-green-700 rounded-lg shadow-md">
        <div class="flex items-center justify-center w-12 bg-green-600">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
            </path>
          </svg>
        </div>

        <div class="px-4 py-2 -mx-3 ">
          <div class="mx-3">
            <span class="font-semibold text-white">Success</span>
            <p class="text-sm text-gray-100">{{ $page.props.flash.success }}</p>
          </div>
        </div>
      </div>
    </div>


    <div class="flex mb-4 w-full justify-between">
         <div class="flex flex-row w-3/5">
            <div class=" w-44">
                <select v-model="form.trashed" class=" rounded-l py-1 w-full border-r-0">
                    <option :value="null" />
                    <option value="with">All </option>
                    <option value="only">Trashed</option>
                    <option value="1">Avaible</option>
                    <option value="0">Not Avaible</option>
                  </select>
            </div>
            <div class="flex w-full bg-white shadow rounded">
                <input class="relative w-full px-4 py-1 rounded-r -focus:ring border" autocomplete="off" type="text" name="search" placeholder="Rechercher" v-model="form.search"  />
            </div>
                <button class="ml-3 text-sm text-gray-500 hover:text-gray-700 focus:text-indigo-500 " type="button" @click="reset()">Effacer</button>
        </div>
            <Link :href="route('drivers.create',)" active class="block">
                    <span class="flex ml-auto text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded">Nouveau Driver</span>
            </Link>
    </div>


    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-3 mb-5">
              <div class="w-full overflow-x-auto bg-gray-700 ">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">#</th>
                      <th class="px-4 py-3">Nom </th>
                      <th class="px-4 py-3">Contact</th>
                      <th class="px-4 py-3">Infos</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400" v-for="driver in drivers.data" :key="driver.id_ui">
                      <td class="px-4 py-3">
                            <p class="font-semibold">{{driver.id}}</p>
                      </td>
                      <td class="px-4 py-3 text-sm">
                            <p class="font-semibold">{{driver?.name}}</p>

                      </td>
                      <td class="px-4 py-3 text-sm">
                          <p class="font-semibold">{{driver?.contact}} </p>
                          <p class="text-sm">{{driver?.adress}} </p>


                      </td>
                      <td class="px-4 py-3 text-sm items-center">
                        <div>
                            <p class="font-semibold">{{driver?.license_category}} </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">

                              <span v-if="driver?.active==1" class=" p-1 bg-green-100 text-green-700 text-xs rounded "> Active</span>
                              <span v-if="driver?.active==0" class=" p-1 bg-red-100 text-red-700 text-xs rounded"> Not Active</span>
                            </p>
                          </div>

                      </td>
                      <td class="px-4 py-3 ">

                            <Link :href="route('drivers.edit',driver.id)" class="text-sm text-gray-500 hover:text-gray-700 p-1 hover:bg-gray-100 rounded"> Details
                             </Link>

                      </td>
                    </tr>


                  </tbody>
                </table>
              </div>
              <div class="flex flex-row-reverse bg-slate-100 px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                  <pagination :links="drivers.links" />
              </div>
            </div>




  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';


import pickBy from 'lodash/pickBy';
import throttle from 'lodash/throttle';
import mapValues from 'lodash/mapValues';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Pagination,
    Link,
  },
  props:{
    drivers:Object,
    filters: Object,
  },
  data() {
        return {
            modalOpen:false,
            form: {
            search: this.filters.search,
            trashed: this.filters.trashed,
          },
        };
    },

    watch: {
    form: {
      deep: true,
      handler: throttle(function() {
        this.$inertia.get(this.route('drivers.index'), pickBy(this.form), { preserveState: true })
      }, 400),
    },
  },

  mounted(){

  },
  methods:{
       numberFormatC(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    reset(){
        this.form.search= "";
        this.form.trashed= "";
    }
  }

};


</script>
