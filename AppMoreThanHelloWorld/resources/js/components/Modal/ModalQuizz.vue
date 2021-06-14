<script>
export default {
  name: "ModalQuizz",
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script> 

<template>
  <div class="modal-background">
    <div class="custom-modal">
      <div class="modal-bottom">
        <header class="modal-header">
          <slot name="header"> This is the default title! </slot>
        </header>

        <section class="modal-body">
          <slot name="body"> This is the default body! </slot>
        </section>

        <footer class="modal-footer justify-content-center">
          <slot name="footer">
            <button type="button" class="" @click="close">Suivant</button>
          </slot>
        </footer>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>