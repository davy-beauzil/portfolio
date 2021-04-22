<template>
<div>
    <form v-if="action == 'create-technology'" class="flex flex-col">
        <label for="type_id" class="mr-4 mt-4">Type</label>
        <select name="type_id" id="type_id" v-model="technologyToCreate.type_id">
          <option v-for="type in this.types" :key="type.id" :value="type.id">{{type.name}}</option>
        </select>

        <label for="name" class="mt-4">Nom</label>
        <input type="text" name="name" class="rounded" v-model="technologyToCreate.name">

        <label for="level" class="mt-4">Niveau</label>
        <input type="number" min="0" max="100" name="level" class="rounded" v-model="technologyToCreate.level">

        <label for="icon" class="mt-4">Classe Font Awesome du logo</label>
        <input type="text" name="icon" class="rounded" v-model="technologyToCreate.icon">

        <div class="flex flex-row mt-4">
          <label for="visible" class="pr-4 pr-4">Visible ?</label>
          <input type="checkbox" name="visible" class="rounded mt-1" v-model="technologyToCreate.visible">
        </div>
      <input type="button" value="Créer" class="rounded mt-4" @click="createTechnology(); $emit('close')">
    </form>

    <form v-if="action == 'update-technology'" class="flex flex-col">
      test modification
        <label for="type_id" class="mr-4 mt-4">Type</label>
        <select name="type_id" id="type_id" v-model="technologyToUpdate.type_id">
          <option v-for="type in this.types" :key="type.id" :value="type.id">{{type.name}}</option>
        </select>

        <label for="name" class="mt-4">Nom</label>
        <input type="text" name="name" class="rounded" v-model="technologyToUpdate.name">

        <label for="level" class="mt-4">Niveau</label>
        <input type="number" min="0" max="100" name="level" class="rounded" v-model="technologyToUpdate.level">

        <label for="icon" class="mt-4">Classe Font Awesome du logo</label>
        <input type="text" name="icon" class="rounded" v-model="technologyToUpdate.icon">

        <div class="flex flex-row mt-4">
          <label for="visible" class="pr-4 pr-4">Visible ?</label>
          <input type="checkbox" name="visible" class="rounded mt-1" :checked="technologyToUpdate.visible ? true : false" v-model="technologyToUpdate.visible">
        </div>
      <input type="button" value="Modifier" class="rounded mt-4" @click="updateTechnology(); $emit('close')">
    </form>

    <form v-if="action == 'update-type'" class="flex flex-col">
      <label for="name">Nom</label>
      <input type="text" name="name" class="rounded mt-4" v-model="typeToUpdate.name">
      <input type="button" value="Modifier" class="rounded mt-4" @click="updateType(); $emit('close')">
    </form>

    <create-project v-if="action == 'create-project'" :_token="_token"></create-project>
</div>
</template>

<script>
import CreateProject from '../Components/CreateProject'

export default {
  components: {
    CreateProject,
  },
  /*props: [
    'types',
    'show',
    'technology',
    'action',
    '_token',
  ],*/
  props: {
    types: {
      default: null
    },
    show: {
      default: null
    },
    technology: {
      default: null
    },
    action: {
      default: null
    },
    _token: {
      default: null
    },
  },
  data: function() {
    return {
      technologyToCreate: {
        type_id: '',
        name: '',
        level: '',
        visible: '',
        icon: '',
      },
      technologyToUpdate: {
        id: '',
        type_id: '',
        name: '',
        level: '',
        visible: '',
        icon: '',
      },
      typeToUpdate: {
        id: '',
        name: '',
      }
    }
  },
  methods: {
    close() { 
      this.show = 'hidden';
    },
    createTechnology() {
      this.$inertia.post('/create-technology', this.technologyToCreate, { preserveScroll: true });
      this.technologyToCreate.type_id = '';
      this.technologyToCreate.name = '';
      this.technologyToCreate.level = '';
      this.technologyToCreate.visible = '';
      this.technologyToCreate.icon = '';
    },
    updateTechnology() {
      this.$inertia.post('/update-technology', this.technologyToUpdate, { preserveScroll: true });
      this.technologyToUpdate.type_id = '';
      this.technologyToUpdate.name = '';
      this.technologyToUpdate.level = '';
      this.technologyToUpdate.visible = '';
      this.technologyToUpdate.icon = '';
    },
    updateType() {
      this.$inertia.post('/update-type-technologies', this.typeToUpdate, { preserveScroll: true });
      this.typeToUpdate.id = '';
      this.typeToUpdate.name = '';
    },
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.technologyToCreate.logo =  files[0];
    },
  },
  mounted(){
    console.log('create techno : ' + this._token)
    if(this.action == 'update-technology'){
      this.technologyToUpdate.id = this.technology.id;
      this.technologyToUpdate.type_id = this.technology.type_id;
      this.technologyToUpdate.name = this.technology.name;
      this.technologyToUpdate.level = this.technology.level;
      this.technologyToUpdate.visible = this.technology.visible;
      this.technologyToUpdate.icon = this.technology.fontAwesomeClass;
    }else if(this.action == 'update-type'){
      this.typeToUpdate.id = this.types.id;
      this.typeToUpdate.name = this.types.name;
    }
  },
}
</script>