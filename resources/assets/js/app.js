
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import router from './routes';

window.Vue = require('vue');
Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('lesson-text', require('./components/LessonText.vue'));
Vue.component('lesson-video', require('./components/LessonVideo.vue'));
Vue.component('lesson-quiz', require('./components/LessonQuiz.vue'));
Vue.component('section-component', require('./components/Section.vue'));

Vue.component('chapter-component', require('./components/Chapter.vue'));
Vue.component('popup-text', require('./components/PopupText.vue'));
Vue.component('popup-video', require('./components/PopupVideo.vue'));
Vue.component('popup-quiz', require('./components/PopupQuiz.vue'));

const app = new Vue({
    el: '#app',
    router
});
