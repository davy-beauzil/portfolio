<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Technologies
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-8 overflow-x-scroll">
                  <p class="text-2xl font-bold">Type de technologie</p>
                  <form class="grid grid-cols-6 gap-2 py-8">
                      <label for="name" class="col-start-1 col-end-7">Nom</label>
                      <input type="text" name="name" class="rounded col-start-1 col-end-5 sm:col-end-6" required v-model="typeToCreate.name">
                      <input type="button" value="Créer" class="rounded px-4 py-2 hover:bg-gray-200 duration-300 col-start-5 col-end-7 sm:col-start-6" @click="createType()">
                  </form>

                  <table class="table-auto w-full">
                    <thead>
                      <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nom</th>
                        <th class="p-4">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="type in this.types" :key="type.id" class="border-b border-gray-200">
                        <td class="p-4 border-r">{{type.id}}</td>
                        <td class="p-4 border-r">{{type.name}}</td>
                        <td class=" h-full">
                          <div class="m-auto w-max">
                            <svg @click="this.modals.type.delete = true; this.modals.type.type = type;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14 w-4 mr-2 inline-block" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                            <svg @click="this.modals.type.update = true; this.modals.type.type = type;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit inline-block fa-w-18 w-5 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>
                          </div>
                          
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>

        <!-- Create technology --><dialog-modal @close="close()" v-if="this.modals.technology.create" :show="this.modals.technology.create" :types="this.types" :title="'Nouvelle technologie'" :action="'create-technology'"></dialog-modal>
        <!-- Update technology --><dialog-modal @close="close()" v-if="this.modals.technology.update" :show="this.modals.technology.update" :types="this.types" :technologies="this.modals.technology.technology" :title="'Modifier une technologie'" :action="'update-technology'"></dialog-modal>
        <!-- Drop technology --><dialog-modal @close="close()" v-if="this.modals.technology.delete" :show="this.modals.technology.delete" :technologies="this.modals.technology.technology" :title="'Voulez-vous vraiment supprimer la technologie ?'" :action="'drop-technology'"></dialog-modal>

        <!-- Drop type --><dialog-modal @close="close()" v-if="this.modals.type.delete" :show="this.modals.type.delete" :types="this.modals.type.type" :title="'Voulez-vous vraiment supprimer le type de technologie ?'" :action="'drop-type'"></dialog-modal>
        <!-- Update type --><dialog-modal @close="close()" v-if="this.modals.type.update" :show="this.modals.type.update" :types="this.modals.type.type" :title="'Modifier le type de technologie ?'" :action="'update-type'"></dialog-modal>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-8 overflow-x-scroll">
                  <p class="text-2xl font-bold inline-block mr-6">Technologies</p>
                  <button @click="showCreateTechnology()" class="bg-transparent hover:bg-myGreen text-myGreen font-semibold hover:text-white py-2 px-4 border border-myGreen hover:border-transparent rounded">Nouvelle technologie</button>

                  <table class="table-auto w-full mt-8">
                    <thead>
                      <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Nom</th>
                        <th class="p-4">Niveau</th>
                        <th class="p-4">Icône</th>
                        <th class="p-4">Visible</th>
                        <th class="p-4">Type de technologie</th>
                        <th class="p-4">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="technology in this.technologies" :key="technology.id" class="border-b border-gray-200">
                        <td class="p-4 border-r text-center">{{technology.id}}</td>
                        <td class="p-4 border-r text-center">{{technology.name}}</td>
                        <td class="p-4 border-r text-center">{{technology.level}}</td>
                        <td class="p-4 border-r text-center"><i class="text-5xl" :class="technology.fontAwesomeClass"></i></td>
                        <td class="p-4 border-r text-center" v-if="technology.visible == 1">Oui</td>
                        <td class="p-4 border-r text-center" v-if="technology.visible == 0">Non</td>
                        <td class="p-4 border-r text-center">{{getTypeName(technology.type_id)}}</td>
                        <td class="p-4 h-full">
                          <div class="m-auto w-max">
                            <svg @click="this.modals.technology.delete = true; this.modals.technology.technology = technology" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14 w-4 mr-2 inline-block" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                            <svg @click="this.modals.technology.update = true; this.modals.technology.technology = technology" aria-hidden="true" focusable="false" data-prefix="far" data-icon="edit" class="svg-inline--fa fa-edit inline-block fa-w-18 w-5 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"></path></svg>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DialogModal from '@/Jetstream/DialogModal'

    export default {
        components: {
            AppLayout,
            DialogModal,
        },
        data: function() {
          return {
            modals: {
              technology: {
                create: false,
                update: false,
                delete: false,
                technology: null,
              },
              type: {
                update: false,
                delete: false,
                type: null,
              },
            },
            typeToCreate: {
              name: '',
              _token: this.$page.props.csrf_token,
            },
            technologyToCreate: {
              type_id: '',
              name: '',
              level: '',
              visible: '',
              logo: null,
            },
            
          }
        },
        methods: {
          createType() {
            if(this.typeToCreate.name != ''){
              this.$inertia.post('/create-type-technologies', this.typeToCreate);
              this.typeToCreate.name = '';
            }
          },
          deleteType($id){
            this.$inertia.get('/delete-type-technologies/' + $id);
          },
          createTechnology() {
            this.$inertia.post('/create-technology', this.technologyToCreate);
            this.technologyToCreate.type_id = '';
            this.technologyToCreate.name = '';
            this.technologyToCreate.level = '';
            this.technologyToCreate.visible = '';
            this.technologyToCreate.logo = null;
          },
          deleteTechnology($id){
            this.$inertia.get('/delete-technology/' + $id);
          },
          close(){
            document.body.style.overflow = 'scroll';
            this.modals.technology.create = false;
            this.modals.technology.update = false;
            this.modals.technology.delete = false;
            this.modals.type.update = false;
            this.modals.type.delete = false;
          },
          onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
              return;
            this.technologyToCreate.logo =  files[0];
          },
          showCreateTechnology(){
            if(this.modals.technology.create == false){
              this.modals.technology.create = true;
            }else {
              this.modals.technology.create = false;
            }
          },
          getTypeName($idType){
            for(var i = 0 ; i < this.types.length ; i++){
              if(this.types[i].id == $idType){
                return this.types[i].name;
              }
            }
          },
        },
        props: [
          'types',
          'messageType',
          'technologies',
          'messageTechnology',
        ],
        computed: {
          
        },
        mounted(){
          
        }
    }
</script>
