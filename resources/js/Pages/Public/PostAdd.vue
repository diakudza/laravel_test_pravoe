<template>
    <form class="d-flex flex-column"
          id="form"
          @submit.prevent="submit">
        <input type="text" placeholder="заголовок" v-model="title" name="title">
        <input type="text" placeholder="text" v-model="text" name="text">

        <select name="category_id" v-model="category_id">
            <option v-for="category in categories" v-bind:value="category.id"
            >
                {{ category.description }}
            </option>
        </select>
        <button type="submit" id="jsSend">Опубликовать</button>
    </form>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link
    },
    props: ['post', 'title', 'csrf', 'categories'],
    data() {
        return {
            title: '',
            text: '',
            category_id: ''
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('Post.store'), {
                _token: this.$page.props.csrf,
                title: this.title,
                text: this.text,
                category_id: this.category_id,
                user_id: this.$page.props.auth.user.profile.id
            })
        }
    }
}
</script>
