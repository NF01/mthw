<script>
    import {
        ref,
        watch,
        watchEffect
    } from 'vue';
    export default {
        components: {

        },
        setup(props, context) {
            const isModalVisible = ref('');
            const showModal = () => isModalVisible.value = true;
            const closeModal = () => isModalVisible.value = false;

            //add question
            const fetchpostQ = async () => {
                const result = await fetch("http://127.0.0.1:8000/api/question", {
                    method: "POST",
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        enonceQuestion: "test from fetch api zuzuzuzu  3",
                        typeQuestion: 1,
                        idEtapeQuestion: 2,
                    })
                })
                // const data = await result.json();
                // console.log(data);
            };

            const fetchPostQuestion = (() => fetchpostQ());


            return {
                isModalVisible,
                showModal,
                closeModal,
                fetchPostQuestion

            }
        },
    }

</script>

<template>
    <div>
        <h1>Admin Page</h1>
        <div>liste question</div>
        <button @click="fetchPostQuestion()">update</button>
    </div>
</template>

<style scoped>

</style>
