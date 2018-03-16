<template>

   <div class="comment" >
      <a class="avatar">
        <img src="/images/dummy.jpg">
      </a>
      <div class="content">
        <a class="author">{{ comment.user_name}}</a>
        <div class="metadata">
          <span class="date">{{ comment.created_at}}</span>
        </div>
        <div class="text">
          {{comment.text}}
        </div>
        <div class="actions">
          <a class="reply">Reply</a>
        </div>
      </div>
      <comment-list v-bind:comments="comment.replies"></comment-list>
    </div>

</template>
<script>
    import CommentList from './CommentList.vue';
    export default{
        props: ['comment',],
       
        mounted(){
        },
        components: {
            'comment-list': CommentList,
        }
    }
</script>