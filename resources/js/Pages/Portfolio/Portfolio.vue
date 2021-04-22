<template>
<div>
  <navigation></navigation>

  <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
    <titre :title="'Mon portfolio'" :class="'blue mb-8'"></titre>

    <div>
      <div v-if="!projects[0]" class="py-6 mb-28">
        <div class="">
          <div class="shadow-xl sm:rounded-lg p-8 overflow-x-scroll h-96 flex justify-center items-center text-2xl">
              Les projets arrivent bientôts...
          </div>
        </div>
      </div>
      <div v-for="project in projects" :key="project.id" class="card py-6 mb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white shadow-xl rounded-lg p-4 md:p-8 flex flex-col lg:flex-row">

            <div class="rounded w-full h-52 sm:h-60 bg-cover bg-center mb-4 lg:w-6/12 lg:h-auto lg:mb-0" :style="'background-image: url(\'/img/portfolio/' + project.image + '\');'"></div>
            <!-- <img :src="'/img/portfolio/' + project.image" alt="Image du projet" class="mb-4 lg:w-6/12 md:h-auto md:mb-0"> -->
            <div class="flex flex-col justify-between md:ml-0 lg:w-6/12 lg:ml-8">
              <div class="h-auto mb-8">
                <h2 class="font-bold text-2xl lg:mb-4">{{project.title}}</h2>
                <p class="text-justify mb-4 md:mb-0">{{project.description}}</p>
              </div>
              <a :href="'/projets/' + project.id" class="border-myBlue border hover:bg-myBlue duration-300 py-2 px-4 rounded hover:text-white w-max">Voir plus</a>
            </div>

          </div>
        </div>
      </div>
    </div>
    
  </div>
  <my-footer :color="'myBlue'"></my-footer>
</div>
  
</template>

<script>

import Navigation from './Navigation'
import MyFooter from '../../Components/Footer'
import Titre from '../../Components/Title'

export default {
  components: {
    Navigation,
    MyFooter,
    Titre,
  },
  props: {
    projects: {
      default: null
    }
  },
  mounted(){
    console.log('test')
    console.log(this.projects)
  }
}
</script>

<style scoped>
.card{
  transform: translateX(0px);
  transition: .6s;
  z-index: -1;
}
.card:hover{
  transform: translateX(-10px);
  transition: .6s;
}
</style>