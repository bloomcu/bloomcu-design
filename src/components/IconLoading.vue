<template>
  <span class="siderail-item__button">
    <svg width="24px" height="24px" viewBox="0 0 16 16"><g fill="#96f"><g class="nc-loop-ripple-16-icon-f"><circle cx="8" cy="8" r="8"></circle><circle data-color="color-2" cx="8" cy="8" r="8"></circle></g></g></svg>
  </span>
</template>

<style lang="scss">
.nc-loop-ripple-16-icon-f {
  --animation-duration: 1.2s;
}

.nc-loop-ripple-16-icon-f * {
  transform-origin: 50% 50%;
  animation: nc-loop-ripple-anim var(--animation-duration) infinite cubic-bezier(.215, .61, .355, 1);
}

.nc-loop-ripple-16-icon-f :nth-child(2) {
  animation-delay: calc(var(--animation-duration)/-2);
}

@keyframes nc-loop-ripple-anim {
  0% { 
    opacity: 1; 
    transform: scale(.2) ;
  } 
  100% { 
    opacity: 0; 
    transform: scale(1);
  } 
}
</style>
