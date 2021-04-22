<template>
  <div>
    <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
      <navigation></navigation>
      <titre :title="'Conditions Générales d\'Utilisation'" :class="'yellow mb-8'"></titre>
    </div>

    <my-footer :color="'myYellow'"></my-footer>
  </div>
</template>

<script>
import Navigation from '../Portfolio/Navigation'
import MyFooter from '../../Components/Footer'
import Titre from '../../Components/Title'

export default {
  components: {
    Navigation,
    MyFooter,
    Titre,
  }
}
</script>

<style scoped>

</style>