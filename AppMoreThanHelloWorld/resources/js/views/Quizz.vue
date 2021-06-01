<script>
    import {
        ref,
        watch,
        watchEffect
    } from 'vue';
    import Question from '../components/Question.vue';

    export default {
        components: {
            Question
        },
        setup(props, context) {

            const question = ref([]);
            const reponse = ref([]);

            const fetchget = async () => {
                const result = await fetch("http://127.0.0.1:8000/api/question/3")
                const data = await result.json();
                const fectchreponse = await fetch(
                    `http://127.0.0.1:8000/api/reponses/idQ/${data[0].idQuestion}`
                )
                const data2 = await fectchreponse.json();
                //image question
                if (data[0].idImage != null) {
                    const idImage = data[0].idImage
                    const imagepath = await fetch(`http://127.0.0.1:8000/api/image/${idImage}`);
                    const data3 = await imagepath.json();
                    console.log(data3[0].url);
                }
                //image reponse
                data2.forEach(async (e) => {
                    if (e.idImage != null) {
                        const idimageR = e.idImage
                        const imagepathR = await fetch(
                            `http://127.0.0.1:8000/api/image/${idimageR}`
                            )
                        const data3 = await imagepathR.json();
                        console.log(data3[0].url);

                    }

                });

                console.log(data2);
                question.value = data;
                reponse.value = data2;

            };
            fetchget();




            const fetchUpdate = (() => console.log("testupdate"));

            //return vue
            return {
                question,
                reponse,
                fetchUpdate
            };
        },
    }

</script>

<template>
    <div>
        <h1>Quizz</h1>
        <!-- <question></question> -->
        <ul>
            <li v-for="question in question" :key="question.idQuestion">
                {{question.enonce}}
            </li>
            <li v-for="reponse in reponse" :key="reponse.idReponse">
                {{reponse.enonce}}
            </li>
        </ul>


    </div>
    <button @click="fetchUpdate()">update</button>
</template>

<style scoped>

</style>
