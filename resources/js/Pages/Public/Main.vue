<template>

    <div>
        <h1>{{title}}</h1>
        <div class="d-flex flex-column align-items-start">
            <h3>Случайная новость:</h3>
           <Link :href="route('Post.show', {Post: randPost.id})"><p>{{ randPost.title }}</p></Link>
           <p>{{ randPost.text.substr(0, 40)}}</p>
        </div>

        <div class="d-flex flex-column align-items-end">
            <h3>Последние коменты:</h3>
            <p v-for="comment in lastComments">{{ comment.user.name }} say: "{{ comment.text }}"</p>
        </div>
    </div>

</template>
<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    components: {
        Link
    },
    props: ['randPost', 'lastComments', 'title'],
    data() {
        return {}
    },

}
</script>
