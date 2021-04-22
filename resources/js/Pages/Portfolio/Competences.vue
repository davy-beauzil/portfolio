<template>
  <div>
    <navigation></navigation>
    <div class="mx-auto px-8 xl:p-0" style="max-width: 1200px;">
      <p class="text-justify">Cela fait maintenant 3 ans que j’ai écris ma première ligne de code, j’ai donc eu le temps d’appréhender pas mal de notions utiles du métier. Que ce soit durant mes études, sur des projets personnels où lors stage en entreprise, j’ai développé des compétences pour divers langages et outils. Je me forme constamment sur de nouvelles technologies. Cela me permet d’enrichir ma veille technologique afin d’être à jour de ce qui se fait le mieux.</p>

      <div class="my-16">

        <div v-if="masteredTechno != null" class="mastered my-8">
          <titre v-if="masteredTechno.lenght >= 1" :title="'Ce que je maitrise'" :class="'green mb-8'"></titre><br>
          
          <div v-for="masteredType in masteredTypes" :key="masteredType.id">
            <subtitle :title="masteredType.typeName" :class="'green mb-8'"></subtitle>
            <div class="flex flex-row justify-center w-full">
              <div class="flex flex-row flex-wrap justify-start w-full">
                <div v-for="mastered in masteredTechno" :key="mastered.id" :class="mastered.type_id == masteredType.typeId ? 'skill flex flex-col justify-center items-center my-4 w-6/12 sm:w-3/12 md:w-2/12' : ''">
                    <i v-if="mastered.type_id == masteredType.typeId" :class="mastered.fontAwesomeClass" class="text-8xl text-gray-small" :style="{color: '#DFDFDF'}"></i>
                    <p v-if="mastered.type_id == masteredType.typeId" >{{mastered.name}}</p>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div v-if="notMasteredTechno != null" class="notMastered">
          <titre v-if="notMasteredTechno.lenght >= 1" :title="'Ce que j\'apprends'" :class="'green mb-8'"></titre><br>
          
          <div v-for="notMasteredType in notMasteredTypes" :key="notMasteredType.id">
            <subtitle :title="notMasteredType.typeName" :class="'green mb-8'"></subtitle>
            <div class="flex flex-row justify-center w-full">
              <div class="flex flex-row flex-wrap justify-start w-full">
                <div v-for="notMastered in notMasteredTechno" :key="notMastered.id" :class="notMastered.type_id == notMasteredType.typeId ? 'skill flex flex-col justify-center items-center my-4 w-6/12 sm:w-3/12 md:w-2/12' : ''">
                    <i v-if="notMastered.type_id == notMasteredType.typeId" :class="notMastered.fontAwesomeClass" class="text-8xl text-gray-small" :style="{color: '#DFDFDF'}"></i>
                    <p v-if="notMastered.type_id == notMasteredType.typeId" >{{notMastered.name}}</p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <my-footer :color="'myGreen'"></my-footer>
  </div>
</template>

<script>
import Navigation from './Navigation'
import MyFooter from '../../Components/Footer'
import Titre from '../../Components/Title'
import Subtitle from '../../Components/Subtitle'
import IconSkill from '../../Components/IconSkill'

export default {
  components: {
    Navigation,
    MyFooter,
    Titre,
    Subtitle,
    IconSkill,
  },
  data: function(){
    return{
      masteredTechnos: [],
      notMasteredTechnos : [],
    }
  },
  props: {
    masteredTechno: Object,
    masteredTypes: Object,
    notMasteredTechno: Object,
    notMasteredTypes: Object,
  },
  created: function(){
  
    // tri des compétences MAITRISÉES suivant les différents type de technos
    for(var i = 0 ; i < Object.keys(this.masteredTypes).length ; i++){
      var type = [this.masteredTypes[i]];
      var technos = [];
      for(var j = 0 ; j < Object.keys(this.masteredTechno).length ; j++){
        if(this.masteredTechno[j].type_id == this.masteredTypes[i].typeId){
          technos.push(this.masteredTechno[j]);
        }
      }
      type.push(technos);
      this.masteredTechnos.push(type);
    }
  
    // tri des compétences NON-MAITRISÉES suivant les différents type de technos
    for(var i = 0 ; i < Object.keys(this.notMasteredTypes).length ; i++){
      var type = [this.notMasteredTypes[i]];
      var technos = [];
      for(var j = 0 ; j < Object.keys(this.notMasteredTechno).length ; j++){
        if(this.notMasteredTechno[j].type_id == this.notMasteredTypes[i].typeId){
          technos.push(this.notMasteredTechno[j]);
        }
      }
      type.push(technos);
      this.notMasteredTechnos.push(type);
    }
  }
}
</script>

<style scoped>
</style>