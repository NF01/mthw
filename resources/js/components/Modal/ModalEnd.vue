<script>
export default {
  name: "ModalEnd",
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script> 

<template>
  <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header"> This is the default title! </slot>
        <button type="button" class="btn-close" @click="close">x</button>
      </header>

      <section class="modal-body">
        <slot name="body"> This is the default body! </slot>
      </section>

      <footer class="modal-footer">
        <slot name="footer"> This is the default footer! </slot>
      </footer>
    </div>
  </div>
</template>

<style scoped>
.modal {
  height: 100%;

}

</style>