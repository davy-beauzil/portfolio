<template>
  <div>
    <navigation></navigation>
    <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
      <titre :title="'Veille technologique - Javascript'" :class="'orange mb-8'"></titre>
      <p class="text-justify">Dans le cadre de mon examen de BTS SIO, j'ai été amené à réaliser une veille technologique sur le sujet de mon choix. Je vais vous présenter les recherches que j'ai faite afin de vous livrer toutes ces informations aujourd'hui.</p>

      <div class="py-6 mb-28">
        <div class="">
          <div class="shadow-xl sm:rounded-lg p-8 overflow-x-scroll">
            <iframe class="mb-4" src="https://docs.google.com/presentation/d/e/2PACX-1vS0-fPJTA45dbcMTEIzpkqdYAl4BkpI7-RpbuiF4aobNVshh95XeK9JtJWmpw7ETQ9QzBCYX8L8XzId/embed?start=false&loop=false&delayms=60000" frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            <p>Vous pouvez si vous le souhaitez mettre le diaporama en plein écran <span class="font-bold">en cliquant sur les trois petits points</span> puis sur <span class="font-bold">Afficher le mode plein écran</span></p>
            


          </div>
        </div>
      </div>


    </div>

    <my-footer :color="'myOrange'"></my-footer>
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
  }
}
</script>

<style scoped>
iframe{
  width: 100%;
  height: 50vw;
}
</style>