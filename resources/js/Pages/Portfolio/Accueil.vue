<template>
  <div>

    <navigation></navigation>

    <!-- largeur maximale du contenu -->
    <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
      
      <!-- Partie image -->
      <div class="flex flex-col xl:mb-24 xl:flex-row pb-8">

        <div class="flex flex-col justify-center mt-16 order-2 mx-auto xl:w-7/12 xl:justify-start xl:mt-24">
          <div class="flex flex-col justify-start">
            <h1 class="font-bold text-gray-dark text-3xl xl:text-5xl">Hello ! Moi c'est Davy</h1>
            <h2 class="text-gray-medium mb-4 text-2xl xl:text-4xl">Étudiant et développeur web freelance</h2>
            <nav-link class="contact-button text-lg w-max hover:bg-myYellow-600 duration-300" style="border: 0; color: #000" :href="route('contact')">Me contacter</nav-link>
          </div>
        </div>

        <div class="flex flex-col justify-center mx-auto  xl:order-2 xl:w-5/12 xl:justify-start">
          <img src="/img/accueil/me.png" alt="Photo de moi">
        </div>

      </div>

      <div class="w-full xl:mb-24">
        <titre :title="'Qui suis-je ?'" :class="'yellow mb-8'"></titre>
        <p class="text-xl text-justify mb-8">Je m’appelle Davy Beauzil, j’ai 20 ans et je suis originaire de Charente (France). L’informatique me passionne depuis que je suis tout petit et c’est donc pour moi une évidence de travailler dans ce domaine.</p>
        <div class="lg:grid lg:grid-cols-2 lg:gap-4 flex flex-col">
          <text-box :color="'myYellow'" :class="'col-start-1 col-end-1 mb-4 lg:mb-0'" :title="'Passionné d\'informatique'" :text="'J’ai commencé par un baccalauréat professionnel Systèmes Numériques. Ça m’a permis de développer pas mal de compétences en terme de réseaux informatiques.'"></text-box>
          <div></div>
          <div></div>
          <text-box :color="'myYellow'" :class="'mb-4 lg:mb-0'" :title="'Et encore plus par le web...'" :text="'Lorsque j’ai découverts le développement web, j’en ai rapidement tiré une conclusion : je voulais en faire mon métier. J’ai donc poursuivi mes études dans un BTS Services Informatiques aux Organisations. Dans cette formation, j’ai pu apprendre divers langages de programmation, la gestion de base de données, la gestion de serveurs, ...'"></text-box>
          <text-box :color="'myYellow'" :class="'mb-4 lg:mb-0'" :title="'Mais c’est encore pas fini :-)'" :text="'Je compte poursuivre mes études en alternance, et monter ma micro-entreprise en parallèle afin d’être freelance. Je pourrai réaliser vos sites vitrines, mais aussi vos sites dynamiques avec gestion serveur, base de données, hébergement, ...'"></text-box>
        </div>
        
      </div>
    </div>

    <my-footer :color="'myYellow'"></my-footer>

  </div>
</template>

<script>

import Navigation from './Navigation'
import Titre from '../../Components/Title'
import TextBox from '../../Components/TextBox'
import MyFooter from '../../Components/Footer'
import NavLink from '../../Jetstream/NavLink'

export default {

  components: {
    Navigation,
    Titre,
    TextBox,
    MyFooter,
    NavLink,
  }
  
}
</script>

<style scoped>
.contact-button{
  background-color: #FFD166;
  border-radius: 10px;
  padding: 5px 15px;
}
.contact-button:hover{
  background-color: #fdc84d;
}

</style>