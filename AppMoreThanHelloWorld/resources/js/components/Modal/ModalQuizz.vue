<script>
    export default {
        name: 'ModalQuizz',
        methods: {
            close() {
                this.$emit('close');
            },
        },
    };
</script> 

<template>
<div class="modal-background">
    <div class="custom-modal">
        <div class="modal-bottom">
            <header class="modal-header">
                <slot name="header">
                    This is the default title!
                </slot>
            </header>

            <section class="modal-body">
                <slot name="body">
                    This is the default body!
                </slot>
            </section>

            <footer class="modal-footer justify-content-center">
                <slot name="footer">
                <button type="button" class="btn-green" @click="close">
                    Suivant
                </button>
                </slot>
            </footer>
        </div>
    </div>
    </div>
</template>

<style scoped>
.modal-background {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0,0,0, 0.5);
}
.custom-modal {
  position: fixed;
    bottom: 0;
    left: 0;
    background: #fff;
    width: 100%;
    } 
    .modal-right .custom-modal {
    border-top: solid 15px #28a745;
}
    .modal-wrong .custom-modal{
    border-top: solid 15px #da291c;
}

    .custom-modal::before
    {
      /* content:''; */
    position: fixed;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.178);
    width: 100%;
    height: 100vh;
    }

   .modal-backdrop {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column-reverse;
  }

  .modal {
    display: inline-block;
    height: 50%;
    text-align:center;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px #28a745;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
  }

 .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
        padding-top: 25px;
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  } 
</style>