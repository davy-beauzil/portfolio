<template>
  <div>
    <button v-if="action == 'drop-type'" @click="deleteType(); $emit('close')" class="bg-red-300 rounded p-2 mr-4">Supprimer</button>
    <button v-if="action == 'drop-technology'" @click="deleteTechnology(); $emit('close')" class="bg-red-300 rounded p-2 mr-4">Supprimer</button>
    <button v-if="action == 'drop-project'" @click="deleteProject(); $emit('close')" class="bg-red-300 rounded p-2 mr-4">Supprimer</button>
    <button @click="$emit('close')" class="border-gray-900 border rounded p-2 mr-4" >Annuler</button>
  </div>
</template>

<script>
export default {
  props: {
    type: {
      default: null
    },
    show: {
      default: null
    },
    technology: {
      default: null
    },
    project: {
      default: null
    },
    action: {
      default: null
    },
  },
  methods: {
    close() { 
      this.show = 'hidden';
    },
    deleteTechnology() {
      console.log('je supprime une techno')
      this.$inertia.post('/delete-technology', { id: this.technology.id}, { preserveScroll: true });
    },
    deleteType() {
      console.log('je supprime un type')
      this.$inertia.post('/delete-type-technologies', { id: this.type.id}, { preserveScroll: true });
    },
    deleteProject() {
      console.log('je supprime un projet')
      this.$inertia.post('/delete-project', { id: this.project.id}, { preserveScroll: true });
    }

  },
  mounted: function(){
    console.log(this.technology)
  }
}
</script>