<script>
  
  import {ref, watch, watchEffect} from 'vue';
  export default {
    components: {
      
    },
    setup(props, context){
        const isModalVisible = ref('');
        const showModal = () => isModalVisible.value = true;
        const closeModal = () => isModalVisible.value = false;
        

    return { isModalVisible, showModal, closeModal }
    },
}
</script>

<template>
  <div>
    <h1>Admin Page</h1>
    <div>liste question</div>
  </div>  
</template>

<style scoped>

</style>