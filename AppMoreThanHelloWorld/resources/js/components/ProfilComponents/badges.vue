<script>
export default {
  components: {},
  setup(props, context) {},
};
</script>

<template>
  <div class="container pb-5">
    <div class="row mx-0">
      <div class="col-lg-8 mx-auto px-0">
        <h2>Badges</h2>
        <div class="container-scroll">
          <div style="flex-wrap: initial; display: inline-flex">
            <div class="badge-container">
              <img
                src="/svg/0-Ovomaltine.svg"
                alt=""
                width="50%"
                height="90%"
              />
            </div>
            <div class="badge-container">1</div>
            <div class="badge-container">1</div>
            <div class="badge-container">1</div>
            <div class="badge-container">1</div>
            <div class="badge-container">1</div>
          </div>
        </div>
        <div class="row pt-3">
          <!-- <a href="#" class="btn btn-primary small mx-auto">Voir tous les badges</a> -->
          <a
            class="btn btn-primary small mx-auto"
            href="#badges"
            uk-toggle
            >Voir tous les badges</a
          >
        </div>
      </div>
    </div>
  </div>
  <div id="badges" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical modal-login px-3 py-2">
        <header class="row border-bottom py-2">
          <div class="col-auto">
            <button
              class="uk-modal-close-default"
              type="button"
              uk-close
            ></button>
          </div>
          <div class="col text-center">
            <h2>Badges</h2>
          </div>
        </header>
        <div class="row align-items-center py-4">
          <div class="col px-0 badges-container">
            <div class="row justify-content-center">
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
              <div class="badge-container">1</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
            </div>
            <div class="row justify-content-center">
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
              <div class="badge-container locked">?</div>
            </div>
          </div>
        </div>
    </div>
  </div>
</template>

<style scoped>
</style>
