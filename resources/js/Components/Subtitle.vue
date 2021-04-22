<template>
  <h3 class="subtitle text-black text-2xl font-semibold">{{ title }}</h3>
</template>

<script>
export default {
  props: [
    'title',
  ]
}
</script>

<style scoped>
.subtitle{
  position: relative;
  border: 0;
  display: block;
  color: #212121;
  z-index: -1;
}
.subtitle::after{
  content: '';
  width: 100%;
  height: 2px;
  position: absolute;
  left: 0px;
  bottom: 0px;
  z-index: -3;
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
.pink::after{
  background-color: #C489F3;
}
</style>