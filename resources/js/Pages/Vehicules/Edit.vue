<template>
  <Head title="Mes demandes"/>

  <BreezeAuthenticatedLayout>




       <!-- This example requires Tailwind CSS v2.0+ -->
<div class="lg:flex  lg:w-3/4 lg:items-center lg:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-2xl sm:truncate">Vehicule - {{vehicule?.registration}}</h2>

  </div>
  <div class="mt-5 flex lg:mt-0 lg:ml-4">


    <span class="sm:ml-3">
      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <!-- Heroicon name: solid/check -->
        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
        Retour
      </button>
    </span>


  </div>
</div>
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

    <div>
        <BreezeValidationErrors class="mt-3"/>
    </div>

    <div class="w-full lg:w-3/4 overflow-hidden rounded-lg border shadow-xs mt-5 mb-10">
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form @submit.prevent="submit">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Information Sur le Vehicule</h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">Veuillez remplir convenablement le formulaire. </p>
    <div class="mt-4">
           </div>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 items-center sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Modele</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
             <BreezeInput  id="model" type="text" v-model="form.model" class="block w-full mt-1"    required  autofocus   />

        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 items-center sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Registration</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
             <BreezeInput  id="registration" type="text" v-model="form.registration" class="block w-full mt-1"    required  autofocus   />

        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Places Disponible</dt>
        <dd class="mt-1 text-sm font-semibold text-gray-900 sm:mt-0 sm:col-span-2">
             <BreezeInput   id="nplace" type="number" v-model="form.nplace" class="block w-full mt-1"    required  autofocus   />

        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Insurance Info</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
             <textarea
                class="mt-1 border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:border-indigo-400 focus:ring-1 focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-indigo-900 w-full"
                 id="insurance" v-model="form.insurance" rows="5">
                 </textarea>
        </dd>
      </div>



      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500">Autres Infos</dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
          <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
            <li v-if="!iscarrental" class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">

                <span class="ml-2 flex-1 w-0 truncate"> carrental </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                 <select v-model="form.carrental_id" class=" text-sm px-2  border border-gray-300 rounded-md shadow-sm  focus:border-indigo-400  focus:ring-1 focus:ring-indigo-400 focus:ring-opacity-50 focus-within:text-indigo-900 p-1">
                        <option :value="null">Choisissez Votre carrental &nbsp;&nbsp;&nbsp;&nbsp;</option>
                        <option v-for="carrental in carrentals " :key="carrental.id" :value="carrental.id">{{carrental.name}}</option>
                    </select>
              </div>
            </li>
            <li v-if="!iscarrental" class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">

                <span class="ml-2 flex-1 w-0 truncate"> Disponible </span>
              </div>
              <div class="ml-4 flex-shrink-0">
                 <select v-model="form.avaible" class=" text-sm px-2  border border-gray-300 rounded-md shadow-sm  focus:border-indigo-400  focus:ring-1 focus:ring-indigo-400 focus:ring-opacity-50 focus-within:text-indigo-900 p-1">
                        <option :value="1">Disponible &nbsp;&nbsp;&nbsp;&nbsp;</option>
                        <option :value="0">Non Disponible &nbsp;&nbsp;&nbsp;&nbsp;</option>
                    </select>
              </div>
            </li>
          </ul>
        </dd>
      </div>
      <div class="bg-white border-t px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-sm font-medium text-gray-500"></dt>
        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <div class="flex items-center justify-end mt-4">
            <span

                class="text-sm text-gray-600 underline  hover:text-gray-900"
            >
              Effacer
            </span>

            <BreezeButton
                class="ml-8" :class="{ 'opacity-25': form.processing }" :disabled="form.processing"  >
              Soummetre la Demande
            </BreezeButton>
          </div>
        </dd>
      </div>
    </dl>
  </div>

    </form>
    </div>


    </div>




  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeButton from '@/Components/Button.vue';

import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Pagination,
    Link,
     BreezeInput,BreezeButton,BreezeValidationErrors
  },
  data(){
      return{
      form: useForm({
          _method:'PUT',
          model:this.vehicule?.model,
          nplace:this.vehicule?.nplace,
          insurance:this.vehicule?.insurance,
          registration:this.vehicule?.registration,
          carrental_id:this.vehicule?.carrental_id,
          avaible:this.vehicule?.avaible,
      }),
  }
  },
  props:{
    vehicule:Object,
    carrentals:Object,
  },
  mounted(){

  },
  methods:{
      submit() {
      this.form.post(this.route('vehicules.update',this.vehicule.id), {
        onFinish: () => {},
      });
    },

  }

};




</script>
