<template>
  <div>
    <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
      <navigation></navigation>
      <titre :title="'Mentions légales'" :class="'yellow mb-8'"></titre>

      <div class="py-6">
        <div class="">
          <div class="shadow-xl sm:rounded-lg p-8 overflow-x-scroll">

            <titre :title="'Réalisateur et propriétaire du site :'" :class="'yellow mb-8'"></titre>

            <ul class="sm:ml-4 mt-4 list-none">
              <li>Davy Beauzil</li>
              <li>2 rue de l'attente, 16120 Châteauneuf sur Charente</li>
              <li><a href="mailto:contact@davy-beauzil.fr" class="hover:text-myYellow duration-300">contact@davy-beauzil.fr</a></li>
              <li><a href="tel:0762763173" class="hover:text-myYellow duration-300">07.62.76.31.73</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="py-6">
        <div class="">
          <div class="shadow-xl sm:rounded-lg p-8 overflow-x-scroll">

            <titre :title="'Hébergeur du site :'" :class="'yellow mb-8'"></titre>

            <ul class="sm:ml-4 mt-4 list-none">
              <li>HOSTINGER, UAB</li>
              <li>Rue Jonavos 60C, Kaunas 44192 Lituanie</li>
              <li><a href="mailto:domains@hostinger.com" class="hover:text-myYellow duration-300">domains@hostinger.com</a></li>
              <li><a href="tel:+37064503378" class="hover:text-myYellow duration-300">+37064503378</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="py-6 mb-28">
        <div class="">
          <div class="shadow-xl sm:rounded-lg p-8 overflow-x-scroll">

            <titre :title="'Vos données personnelles :'" :class="'yellow mb-8'"></titre>

            <p class="text-justify">De manière générales, l'utilisation de ce site internet ne requiert pas vos données personnelles. Toutefois, si vous souhaitez <nav-link :href="route('contact')" style="border: 0; padding:0;" class="text-base text-black hover:underline text-myYellow hover:text-myYellow" >prendre contact</nav-link> avec moi, 
            un certain nombre d'informations vous sera demandé afin de déterminer la raison pour laquelle vous m'avez contacté et de pouvoir vous recontacter par la suite.</p><br>
            <p class="text-justify">Dans le cadre du Règlement Général sur la Protection des Données (RGPD), ces informations sont stockées de manière confidentielle et ce pour une durée de 2 ans.
            Vous avez la possibilité si vous le souhaitez d'avoir accès à vos données, de les modifier, de demander leur effacement. Pour cela, contactez-moi via mon <nav-link :href="route('contact')" style="border: 0; padding:0;" class="text-base text-black hover:underline text-myYellow hover:text-myYellow" >formulaire de contact</nav-link> ou par <a class="text-myYellow hover:underline" href="mailto:contact@davy-beauzil.fr">contact@davy-beauzil.fr</a>.</p><br>
            <p>D'autres données <span class="font-bold">non-personnelles</span> sont stockées à but statistique. En aucun cas ces données constituent des données personelles permettant de vous identifier de quelque façon que ce soit.</p>
          </div>
        </div>
      </div>
    </div>

    <my-footer :color="'myYellow'"></my-footer>
  </div>
</template>

<script>
import Navigation from '../Portfolio/Navigation'
import MyFooter from '../../Components/Footer'
import Titre from '../../Components/Title'
import NavLink from '../../Jetstream/NavLink'

export default {
  components: {
    Navigation,
    MyFooter,
    Titre,
    NavLink
  }
}
</script>

<style scoped>

</style>