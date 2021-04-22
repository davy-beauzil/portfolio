<template>
  <div>
    <div :class="'bg-' + color" class="title w-full text-black p-4 font-bold text-2xl rounded-t-lg">
      {{ title }}
    </div>
    <div :class="'border-' + color" class="border text w-full text-black p-4 rounded-b-lg">
      {{ text }}
    </div>
  </div>
</template>

<script>
export default {

  props: [
    'title',
    'text',
    'color',
  ],
}
</script>

<style scoped>

</style>