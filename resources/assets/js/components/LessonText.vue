<template>
  <div>
   <div v-html="lesson.body">
   </div>
   <h1 class="ui dividing header">{{ lesson.title }}</h1>
   <p>{{ lesson.description }}</p>

    <div class="ui comments">
      <h3 class="ui dividing header">Diskusi</h3>
        <comment-list v-if="discussions.length > 0" v-bind:comments="discussions"></comment-list>
        <p v-else>Belum ada Diskusi..</p>
    </div>
  </div>
</template>
<script>

import CommentList from './CommentList.vue';
export default {
  data() {
    return {
      lesson: {},
      discussions:[]
    };
  },

  created() {
    this.fetch(this.slug_id);
  },

  methods: {
    fetch(slug) {
      axios.defaults.baseURL = 'http://my-project-mumtazhaqiqy270496.codeanyapp.com:'+window.location.port+'/';
      axios.get('api/lessons/' + slug)
      .then(({data}) => {
        this.lesson = data.lesson;
        this.discussions = data.discussions;
      });
    },
  },

  components: {
    'comment-list': CommentList,
  },

  props: {
    slug_id: String
  },
}
</script>