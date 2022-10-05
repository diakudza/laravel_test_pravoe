<template>
    <form class="d-flex flex-column form"
          id="form"
          @submit.prevent="submit">
        <label class="form-label">
            <input type="text" placeholder="заголовок" v-model="title" name="title" class="form-control">
        </label>
        <label class="form-label">
            <input type="text" placeholder="text" id="text" v-model="text" name="text" class="form-control">
        </label>
        <label class="form-label">
            <select name="category_id" v-model="category_id" class="form-select">
                <option v-for="category in categories" v-bind:value="category.id"
                >
                    {{ category.description }}
                </option>
            </select>
        </label>
        <button type="submit" id="jsSend" class="btn btn-success">Опубликовать</button>
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
