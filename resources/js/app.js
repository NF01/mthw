/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('home', require('./components/home.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// const app = new Vue({
//     el: '#app',
// });

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

const install = async (path) => {
    const registration = await navigator.serviceWorker.register(path);
    return new Promise((resolve, reject) => {
        registration.addEventListener("updatefound", evt => {
            const installingWorker = registration.installing;
            installingWorker.addEventListener("statechange", evt => {
                if (evt.target.state === "activating") resolve();
            });
        });
    })
}
// install('js/serviceworker.js');
install('js/serviceworker.js').then(() => location.reload());

const app = createApp(App);
app.use(router);
app.mount('#app');
// console.log('serviceworker loaded');

