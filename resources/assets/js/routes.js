import VueRouter from 'vue-router';
import LessonText from './components/LessonText.vue';
import LessonVideo from './components/LessonVideo.vue';
import LessonQuiz from './components/LessonQuiz.vue';

import PopupQuiz from './components/PopupQuiz.vue';
import PopupVideo from './components/PopupVideo.vue';
import PopupText from './components/PopupText.vue';


let routes = [  
    {
        path: '/t/:slug_id',
        component: LessonText,
        props: true
    },
   {
        path: '/v/:slug_id',
        component: LessonVideo,
        props: true
    },
   {
        path: '/q/:slug_id',
        component: LessonQuiz,
        props: true
    },
  
   {
        path: '/q/:slug_id',
        component: PopupQuiz,
        props: true
    },
  
   {
        path: '/t/:slug_id',
        component: PopupText,
        props: true
    },
  
   {
        path: '/v/:slug_id',
        component: PopupVideo,
        props: true
    },
];


export default new VueRouter({
    routes
});