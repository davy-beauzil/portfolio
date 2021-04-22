<template>
  <header class="w-full bg-white h-24 flex justify-center items-center xl:mb-28">
    <nav :class="navIsShowed ? '' : 'hidden'" class="navbar absolute h-screen w-screen top-0 flex justify-center items-center bg-white lg:bg-transparent lg:block lg:h-auto lg:w-auto lg:top-auto z-10">
      <div class="flex flex-col w-max lg:flex-row">
        <nav-link v-if="route().current('accueil')" class="nav-link yellow active text-2xl lg:text-lg leading-8" :href="route('accueil')">
          Accueil
        </nav-link>
        <nav-link v-else class="nav-link yellow text-2xl lg:text-lg leading-8" :href="route('accueil')">
          Accueil
        </nav-link>

        <nav-link v-if="route().current('competences')" class="nav-link green active text-2xl lg:text-lg leading-8" :href="route('competences')" :active="route().current('competences')">
          Compétences
        </nav-link>
        <nav-link v-else class="nav-link green text-2xl lg:text-lg leading-8" :href="route('competences')" :active="route().current('competences')">
          Compétences
        </nav-link>

        <nav-link v-if="route().current('portfolio') || route().current('portfolio.projet')" class="nav-link blue active text-2xl lg:text-lg leading-8" :href="route('portfolio')" :active="route().current('portfolio') || route().current('portfolio.projet')">
          Portfolio
        </nav-link>
        <nav-link v-else class="nav-link blue text-2xl lg:text-lg leading-8" :href="route('portfolio')" :active="route().current('portfolio') || route().current('portfolio.projet')">
          Portfolio
        </nav-link>

        <nav-link v-if="route().current('veille-technologique')" class="nav-link orange active text-2xl lg:text-lg leading-8" :href="route('veille-technologique')" :active="route().current('veille-technologique')">
          Veille technologique
        </nav-link>
        <nav-link v-else class="nav-link orange text-2xl lg:text-lg" :href="route('veille-technologique')" :active="route().current('veille-technologique')">
          Veille technologique
        </nav-link>

        <nav-link v-if="route().current('contact')" class="nav-link bordeaux active text-2xl lg:text-lg leading-8" :href="route('contact')" :active="route().current('contact')">
          Contact
        </nav-link>
        <nav-link v-else class="nav-link bordeaux text-2xl lg:text-lg leading-8" :href="route('contact')" :active="route().current('contact')">
          Contact
        </nav-link>
      </div>
      
    </nav>

    <svg v-show="!navIsShowed" @click="showNav()" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14 w-6 absolute top-8 right-8 lg:hidden z-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
    <svg v-show="navIsShowed" @click="showNav()" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11 w-6 absolute top-8 right-8 lg:hidden z-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
  </header>
</template>

<script>

import NavLink from '../../Jetstream/NavLink'

export default {

  components: {
    NavLink,
  },
  data() {
    return {
      screenWidth: null,
      navIsMobile: null,
      navIsShowed: null,
    }
  },
  watch: {

  },
  methods: {
    showNav(){
      var html = document.querySelector('html');
      this.navIsShowed ? this.navIsShowed = false : this.navIsShowed = true;
      this.navIsShowed ? html.style.overflow = 'hidden' : html.style.overflow = 'scroll';
      console.log(this.navIsShowed)
    }
  },
  mounted(){
    // je réactive le scroll pour un changement de page
    var html = document.querySelector('html');
    html.style.overflow = 'scroll';
    
    this.screenWidth = innerWidth;
    this.navIsShowed = false,
    window.addEventListener('resize', () => {
      this.navIsMobile = this.screenWidth < 850 ? true : false,
      this.screenWidth = innerWidth;
      console.log(this.navIsShowed);
    })

    
  }
}
  
</script>

<style scoped>
  .nav-link{
    text-transform: uppercase;
    margin: 0 20px;
    border: 0;
    position: relative;
    color: #212121;
    z-index: 1;
  }
  .active::after{
    content: '';
    width: calc(100% + 20px);
    height: 0.8rem;
    position: absolute;
    z-index: -1;
    left: -10px;
    z-index: -1;
    transform: translateY(2px);
  }
  .yellow::after{
    background-color: #FFD166;
  }
  .green::after{
    background-color: #06D6A0;
  }
  .blue::after{
    background-color: #00C0FF;
  }
  .orange::after{
    background-color: #FF9900;
  }
  .bordeaux::after{
    background-color: #C489F3;
  }

  @media screen and(max-width: 850px){
    nav{
      display: none;
    }
  }
</style>