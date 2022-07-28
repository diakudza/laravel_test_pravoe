<template>
    <div>
        <h1>{{ title }}</h1>
        <h2>{{ post.title }}</h2>
        <p>Пост номер: {{ post.id }}</p>
        <p>Автор: {{  post.author.name }}</p>
        <p>Дата создания: {{ post.created_at }}</p>
        <p>{{ post.text }}</p>
        <hr>
        <CommentForm v-if='$attrs.auth.user.loggedIn' :user="$attrs.auth.user.profile.id" :post_id="post.id"/>
        <div v-if="post.comments.length != 0">
            <p>Комментарии</p>
            <div v-for="comment in post.comments">
                <div>
                    <div>автор: {{ comment.user.name }}</div>
                    <div>{{ comment.text }}</div>
                </div>
                <br>
            </div>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";
import CommentForm from "./components/CommentForm";
export default {
    components: {
        Link, CommentForm
    },
    props: ['post', 'title'],
    data() {
        return {}
    },
}
</script>
