<template>
    <div class="comments">
         <comment v-for="comment in comments"  v-bind:key="comment.id" v-bind:comment="comment" ></comment>
    </div>
</template>
<script>
    export default{
        props: ['comments'],
        computed:{
        },
        beforeCreate: function () {
            this.$options.components.Comment = require('./Comment.vue')
        }
    }
</script>