<template>
<div>
  <navigation></navigation>

  <div class="mx-auto px-8 xl:p-0 mb-24" style="max-width: 1200px;">

    <div class="flex flex-row justify-between items-center">
      <titre :title="project[0].title" :class="'blue mb-8 mr-8'"></titre>
      <nav-link :href="route('portfolio')" class="hover:text-myBlue" style="border:0;"><svg style="transform: translateY(-1px); margin-right: 4px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14 w-4 h-4"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg> Retour</nav-link>
    </div>
    
    <p class="text-justify">{{project[0].description}}</p>
    <hr class="my-8">
    <div v-html="project[0].content_html"></div>
  </div>

  <my-footer :color="'myBlue'"></my-footer>

</div>
</template>

<script>
import Navigation from './Navigation'
import Titre from '../../Components/Title'
import NavLink from '../../Jetstream/NavLink'
import MyFooter from '../../Components/Footer'

export default {
  components: {
    Navigation,
    Titre,
    NavLink,
    MyFooter,
  },
  props: {
    project: {
      default: null
    }
  }
}
</script>

<style scoped>

</style>