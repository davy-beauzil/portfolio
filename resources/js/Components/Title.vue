<template>
<div>
  <!-- <h2 class="background text-black text-3xl">{{ title }}</h2> -->
  <h2 class="title text-black text-3xl animated-underline">{{ title }}</h2>

</div>
</template>

<script>
export default {
  props: [
    'title',
  ]
}
</script>

<style scoped>
*,
*::after,
*::before {
	box-sizing: border-box;
}
.background{
  position: absolute;
  font-weight: bold;
  border: 0;
  line-height: 2rem;
  color: transparent;
  z-index: -1;
  transform: translateY(15px);
  background-color: #FFD166;
}
.yellow > .animated-underline{
  --uiAnimatedUnderlineWidth: var(--animatedUnderlineWidth, 100%);
	--uiAnimatedUnderlineHeight: var(--animatedUnderlineHeight, 1.5rem);
	--uiAnimatedUnderlineBgColor: var(--animatedUnderlineBgColor, currentColor);
	--uiAnimatedUnderlinePositionX: var(--animatedUnderlinePositionX, left);
	--uiAnimatedUnderlinePositionY: var(--animatedUnderlinePositionY, bottom);

	background-image: linear-gradient(0, var(--uiAnimatedUnderlineBgColor) 0, var(--uiAnimatedUnderlineBgColor));
	background-size: var(--uiAnimatedUnderlineWidth) var(--uiAnimatedUnderlineHeight);
	background-position: var(--uiAnimatedUnderlinePositionX) var(--uiAnimatedUnderlinePositionY);
	background-repeat: no-repeat;
	
  --animatedUnderlineWidth: 100%;
	--animatedUnderlineHeight: 1.70rem;
	--animatedUnderlinePositionY: bottom;
  --animatedUnderlineBgColor: #FFD166;
}

.green > .animated-underline{
  --uiAnimatedUnderlineWidth: var(--animatedUnderlineWidth, 100%);
	--uiAnimatedUnderlineHeight: var(--animatedUnderlineHeight, 1.5rem);
	--uiAnimatedUnderlineBgColor: var(--animatedUnderlineBgColor, currentColor);
	--uiAnimatedUnderlinePositionX: var(--animatedUnderlinePositionX, left);
	--uiAnimatedUnderlinePositionY: var(--animatedUnderlinePositionY, bottom);

	background-image: linear-gradient(0, var(--uiAnimatedUnderlineBgColor) 0, var(--uiAnimatedUnderlineBgColor));
	background-size: var(--uiAnimatedUnderlineWidth) var(--uiAnimatedUnderlineHeight);
	background-position: var(--uiAnimatedUnderlinePositionX) var(--uiAnimatedUnderlinePositionY);
	background-repeat: no-repeat;
	
  --animatedUnderlineWidth: 100%;
	--animatedUnderlineHeight: 1.70rem;
	--animatedUnderlinePositionY: bottom;
  --animatedUnderlineBgColor: #06D6A0;
}

.blue > .animated-underline{
  --uiAnimatedUnderlineWidth: var(--animatedUnderlineWidth, 100%);
	--uiAnimatedUnderlineHeight: var(--animatedUnderlineHeight, 1.5rem);
	--uiAnimatedUnderlineBgColor: var(--animatedUnderlineBgColor, currentColor);
	--uiAnimatedUnderlinePositionX: var(--animatedUnderlinePositionX, left);
	--uiAnimatedUnderlinePositionY: var(--animatedUnderlinePositionY, bottom);

	background-image: linear-gradient(0, var(--uiAnimatedUnderlineBgColor) 0, var(--uiAnimatedUnderlineBgColor));
	background-size: var(--uiAnimatedUnderlineWidth) var(--uiAnimatedUnderlineHeight);
	background-position: var(--uiAnimatedUnderlinePositionX) var(--uiAnimatedUnderlinePositionY);
	background-repeat: no-repeat;

  --animatedUnderlineWidth: 100%;
	--animatedUnderlineHeight: 1.70rem;
	--animatedUnderlinePositionY: bottom;
  --animatedUnderlineBgColor: #00C0FF;
}

.orange > .animated-underline{
  --uiAnimatedUnderlineWidth: var(--animatedUnderlineWidth, 120%);
	--uiAnimatedUnderlineHeight: var(--animatedUnderlineHeight, 1.5rem);
	--uiAnimatedUnderlineBgColor: var(--animatedUnderlineBgColor, currentColor);
	--uiAnimatedUnderlinePositionX: var(--animatedUnderlinePositionX, left);
	--uiAnimatedUnderlinePositionY: var(--animatedUnderlinePositionY, bottom);

	background-image: linear-gradient(0, var(--uiAnimatedUnderlineBgColor) 0, var(--uiAnimatedUnderlineBgColor));
	background-size: var(--uiAnimatedUnderlineWidth) var(--uiAnimatedUnderlineHeight);
	background-position: var(--uiAnimatedUnderlinePositionX) var(--uiAnimatedUnderlinePositionY);
	background-repeat: no-repeat;

  --animatedUnderlineWidth: 100%;
	--animatedUnderlineHeight: 1.70rem;
	--animatedUnderlinePositionY: bottom;
  --animatedUnderlineBgColor: #FF9900;
}

.pink > .animated-underline{
  --uiAnimatedUnderlineWidth: var(--animatedUnderlineWidth, 100%);
	--uiAnimatedUnderlineHeight: var(--animatedUnderlineHeight, 1.5rem);
	--uiAnimatedUnderlineBgColor: var(--animatedUnderlineBgColor, currentColor);
	--uiAnimatedUnderlinePositionX: var(--animatedUnderlinePositionX, left);
	--uiAnimatedUnderlinePositionY: var(--animatedUnderlinePositionY, bottom);

	background-image: linear-gradient(0, var(--uiAnimatedUnderlineBgColor) 0, var(--uiAnimatedUnderlineBgColor));
	background-size: var(--uiAnimatedUnderlineWidth) var(--uiAnimatedUnderlineHeight);
	background-position: var(--uiAnimatedUnderlinePositionX) var(--uiAnimatedUnderlinePositionY);
	background-repeat: no-repeat;

  --animatedUnderlineWidth: 100%;
	--animatedUnderlineHeight: 1.70rem;
	--animatedUnderlinePositionY: bottom;
  --animatedUnderlineBgColor: #C489F3;
}
.title{
  position: relative;
  font-weight: bold;
  border: 0;
  line-height: 2.5rem;
  text-decoration: none;
  display: inline;
  color: #212121;
  z-index: -1;
  padding-right: 25px;
}
.title::after{
  /* content: '';
  width: calc(100%);
  height: 100%;
  position: absolute;
  left: 0px;
  z-index: -3;*/
  transform: translateY(0px);
  /*top: 0px; */
};
.yellow > .title::after{
  background-color: #FFD166;
}
.green > .title::after{
  background-color: #06D6A0;
}
.blue > .title::after{
  background-color: #00C0FF;
}
.orange > .title::after{
  background-color: #FF9900;
}
.pink > .title::after{
  background-color: #C489F3;
}
</style>