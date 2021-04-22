<template>
  <div>
      <navigation></navigation>
      <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
        <titre :title="'Contact'" :class="'pink mb-8'"></titre>
        <p class="mb-8">Une offre de travail ? Un projet qui vous tient à coeur ? Contactez-moi via ce formulaire.</p>
        <form class="flex flex-col mb-28">

          <div v-if="this.error.show" class="py-2 rounded-xl px-4 bg-red-300 flex flex-row justify-between items-center">
            <div>{{this.error.message}}</div>
            <svg @click="this.error.show = false; this.error.message = '';" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 w-4 h-4 hover:text-gray-700" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>          </div>

          <div class="flex flex-col sm:flex-row">
            <div class="flex flex-col w-full sm:w-6/12 sm:mr-2">
              <label for="lastname">Nom</label>
              <input v-model="this.messageToSend.nom" class="rounded" type="text" name="lastname">
            </div>
            <div class="flex flex-col w-full sm:w-6/12 sm:ml-2">
              <label for="name">Prénom</label>
              <input v-model="this.messageToSend.prenom" class="rounded" type="text" name="name">
            </div>
          </div>
          
          <div class="flex flex-col sm:flex-row">
            <div class="flex flex-col w-full sm:w-6/12 sm:mr-2">
              <label for="mail">Adresse mail</label>
              <input v-model="this.messageToSend.mail" class="rounded" type="text" name="mail">
            </div>
            <div class="flex flex-col w-full sm:w-6/12 sm:ml-2">
              <label for="tel">Numéro de téléphone</label>
              <input v-model="this.messageToSend.tel" class="rounded" type="tel" name="tel">
            </div>
          </div>

          <div class="flex flex-col">
            <label for="subject">Sujet du message</label>
            <input v-model="this.messageToSend.sujet" class="rounded" type="text" name="subject">
          </div>
          <div class="flex flex-col">
            <label for="message">Message</label>
            <textarea v-model="this.messageToSend.message" class="rounded" name="message" rows="5" ></textarea>
          </div>
          <div class="my-8">
            <label for="message">En cochant cette case, j'accepte que mes données personnelles soient utilisées pour me recontacter dans le cadre de ma demande effectuée dans ce formulaire. Pour plus d'informations, voir les <nav-link :href="route('mentions-legales')" style="border:0; padding: 0;" class="duration-300 hover:underline hover:text-myPink text-myPink text-base mr-2">Mentions Légales</nav-link></label>
            <input v-model="this.messageToSend.cgu" type="checkbox" class="rounded" name="message">
          </div>
          <input type="button" @click="sendMessage()" value="Envoyer" class="w-max py-2 px-4 rounded hover:bg-myPink duration-300 hover:text-white">
        </form>
      </div>
      <my-footer :color="'myPink'"></my-footer>
    </div>
</template>

<script>

import Navigation from './Navigation'
import MyFooter from '../../Components/Footer'
import NavLink from '../../Jetstream/NavLink'
import Titre from '../../Components/Title'

export default {
  components: {
    Navigation,
    MyFooter,
    NavLink,
    Titre,
  },
  data(){
    return {
      messageToSend: {
        nom: '',
        prenom: '',
        mail: '',
        tel: '',
        sujet: '',
        message: '',
        cgu: ''
      },
      error:{
        message: '',
        show: false,
      }
    }
  },
  methods: {
    sendMessage(){
      if(this.messageToSend.nom && 
      this.messageToSend.prenom && 
      this.messageToSend.mail && 
      this.messageToSend.tel && 
      this.messageToSend.message){

        if(this.validateEmail(this.messageToSend.mail)){

          if(this.messageToSend.cgu){
            this.error.show = false;
            this.error.message = '';
            this.$inertia.post('/take-contact', this.messageToSend ,{ preserveScroll: true });
            this.messageToSend.nom = '';
            this.messageToSend.prenom = '';
            this.messageToSend.mail = '';
            this.messageToSend.tel = '';
            this.messageToSend.sujet = '';
            this.messageToSend.message = '';
            this.messageToSend.cgu = '';
          }else{
            this.error.show = true;
            this.error.message = 'Vous n\'avez pas accepté la collecte de vos données personnelles';
          }

        }else{
          this.error.show = true;
          this.error.message = 'Cette adresse email n\'est pas valide';
        }

      }else{
        this.error.show = true;
        this.error.message = 'Veuillez remplir tous les champs';
      }
    },
    validateEmail(email) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }
  }
}
</script>