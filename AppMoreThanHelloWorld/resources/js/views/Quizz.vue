<script>
    import {
        computed,
        ref,
        watch,
        watchEffect
    } from 'vue';
    // import Question from '../components/Question.vue';

    export default {
        components: {
            // Question
        },
        setup(props, context) {

            const question = ref([]);
            const reponse = ref([]);

            const fetchget = async () => {
              const result = await fetch("http://127.0.0.1:8000/api/questions/")
                const data = await result.json();
                const fectchreponse = await fetch(
                  // `http://127.0.0.1:8000/api/reponses/idQ/${data[0].idQuestion}`
                    `http://127.0.0.1:8000/api/reponses/`
                )
                const data2 = await fectchreponse.json();
                //image question
                if (data[0].idImage != null) {
                  const idImage = data[0].idImage
                    const imagepath = await fetch(`http://127.0.0.1:8000/api/image/${idImage}`);
                    const data3 = await imagepath.json();
                    // console.log(data3[0].url);
                }
                  
                //image reponse
                data2.forEach(async (e) => {
                    if (e.idImage != null) {
                        const idimageR = e.idImage
                        const imagepathR = await fetch(
                            `http://127.0.0.1:8000/api/image/${idimageR}`
                        )
                        const data3 = await imagepathR.json();
                        // console.log(data3[0].url);
                    }
                });
                // console.log(data2);
                question.value = data;
                reponse.value = data2;
                
                // console.log(question.value);
                // console.log(reponse.value);
            };
            fetchget();

            const countQuestion = ref(0);

            const nextQuestion = ((reponse) => {
              if (reponse.statut == 1) {
                console.log("bonne reponse" + reponse.statut);
              } else {
                console.log("mauvaise reponse" + reponse.statut);
                console.log(reponse);
              }

              countQuestion.value = countQuestion.value + 1;
              });


            //return vue
            return {
                question,
                reponse,
                countQuestion,
                nextQuestion,
            };
        },
    }

</script>

<template>
    <div>
        <h1>Quizz</h1>

        <p v-if="question[countQuestion]"> {{question[countQuestion].enonce}} </p>

        <ul>
            <template v-for="reponse in reponse" :key="reponse.idReponse" >
              <button class="btn btn-primary" 
                      v-if="question[countQuestion].idQuestion === reponse.idQuestion"  
                      @click="nextQuestion(reponse)">
                  {{reponse.enonce}} {{reponse.statut}}
              </button>
            </template>
        </ul>
    </div>

</template>

<style scoped>

</style>