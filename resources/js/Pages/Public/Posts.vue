<template>
    <div>
        <h1>{{ title }}</h1>
        <hr>
        <div class="d-flex flex-row justify-content-sm-between">
            <div>
                <select @change="sortByDate" id="jsSortByDate">
                    <option v-for="item in date" v-bind:value="item.created_at"
                            :selected="item.created_at == selectedDate">
                        {{ item.created_at }}
                    </option>
                </select>
                <select @change="sortByCategory" id="jsSortByCategory">
                    <option v-for="category in categories" v-bind:value="category.id"
                            :selected="category.id == selected">
                        {{ category.description }}
                    </option>
                </select>
            </div>
            <div>
                <input id="jsFind" type="text" placeholder="строка поиска">
                <button @click="find">Искать</button>
            </div>
        </div>
        <hr>

        <div>
            <div class="mt-2">
                <Pagination :links="posts.links"/>
            </div>
            <div v-for="post in posts.data">
                <Link :href="route('Post.show', {Post: post.id})">{{ post.title }}</Link>
                {{ post.created_at }}
                <p> {{ post.text.substr(0, 50) }}..</p>
            </div>
        </div>

    </div>
</template>
<script>

import {Link} from "@inertiajs/inertia-vue3";
import Pagination from "../../Share/Pagination";

export default {
    components: {
        Link,
        Pagination
    },
    props: [
        'posts',
        'title',
        'categories',
        'selected',
        'date',
        'selectedDate'
    ],
    data() {
        return {
            currentSelected: 0
        }
    },
    methods: {
        find() {
            let query = document.getElementById('jsFind').value
            this.$inertia.get('/Post?searchQuery=' + query)
        },
        sortByCategory() {
            let query = document.getElementById('jsSortByCategory').value
            this.$inertia.get('/Post?sortByCategory=' + query)
        },
        sortByDate() {
            let query = document.getElementById('jsSortByDate').value
            this.$inertia.get('/Post?sortByDate=' + query)
        }
    }

}
</script>
