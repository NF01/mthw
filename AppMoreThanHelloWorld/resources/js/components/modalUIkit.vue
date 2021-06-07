<script>
    export default {

    };

</script>

<template>
    <button uk-toggle="target: #my-id" type="button"></button>

    <!-- This is the modal -->
    <div id="my-id" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title"></h2>
            <button class="uk-modal-close" type="button"></button>
        </div>
    </div>
 



    <div class="modal-backdrop">
        <div class="modal">
            <header class="modal-header">
                <slot name="header">
                    This is the default title!
                </slot>
                <button type="button" class="btn-close" @click="close">
                    x
                </button>
            </header>

            <section class="modal-body">
                <slot name="body">
                    This is the default body!
                </slot>
            </section>

            <footer class="modal-footer">
                <slot name="footer">
                    This is the default footer!
                </slot>
                <button type="button" class="btn-green" @click="close">
                    Close Modal
                </button>
            </footer>
        </div>
    </div>
</template>
