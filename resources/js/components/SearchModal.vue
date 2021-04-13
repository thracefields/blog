<template>
  <div id="search">
    <a href="javascript:void(0);" class="navbar-item" @click="isModalActive = true">
      <span class="icon">
        <i class="fas fa-search"></i>
      </span>
      <span>Tърсене</span>
    </a>
    <slot></slot>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
        isModalActive: false
    }
  }
};
</script>