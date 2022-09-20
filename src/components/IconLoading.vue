<template>
  <svg width="24" height="24" viewBox="0 0 24 24">
    <g fill="currentColor">
      <g class="icon-loading"><path d="M12 24a12 12 0 1 1 12-12 12.013 12.013 0 0 1-12 12zm0-22a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2z" opacity=".4"></path><path d="M24 12h-2A10.011 10.011 0 0 0 12 2V0a12.013 12.013 0 0 1 12 12z" data-color="color-2"></path></g>
    </g>
  </svg>
</template>

<style lang="scss">
.icon-loading {--animation-duration:0.65s;transform-origin:12px 12px;animation:nc-loop-circle-2-anim var(--animation-duration) infinite cubic-bezier(.645,.045,.355,1)}@keyframes nc-loop-circle-2-anim{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
</style>
