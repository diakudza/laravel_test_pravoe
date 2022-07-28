<template>
       <div class="m-2">
            Прокоментируйте
            <form id="form" @submit.prevent="form.post(route('Comment.store'))"
                  class="form-control d-flex flex-column">
                <input type="text" class="form-control" v-model="form.text" name="text">
                <button type="submit" :disabled="form.processing" class="btn ">Submit</button>
            </form>
        </div>
</template>
<script>

import {useForm} from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            form: useForm({
                text: '',
                user_id: this.$props.user,
                post_id: this.$props.post_id
            })
        }
    },
    components: {
        useForm
    },
    props: [
        'user',
        'post_id'
    ],
}
</script>

