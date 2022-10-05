<template>
    <div>
        <h1>{{ title }}</h1>
        <hr>
        <div class="d-flex flex-row justify-content-sm-between">
            <div class="d-flex flex-row">

                <select id="jsSortByDate" class="form-select">
                    <option value="" disabled selected>
                        select date
                    </option>
                    <option v-for="item in date" v-bind:value="item.created_at"
                            :selected="item.created_at === this.selectedDate"
                    >
                        {{ item.created_at }}
                    </option>
                </select>

                <select id="jsSortByCategory" class="form-select">
                    <option value="" disabled selected>
                        select category
                    </option>
                    <option v-for="category in categories" v-bind:value="category.id"
                            :selected="category.id == selectedCategory">
                        {{ category.description }}
                    </option>
                </select>

            </div>
            <div class="d-flex flex-row">
                <input id="jsFind" type="text" class="form-control" placeholder="search input"
                       v-model="searchQuery">
                <button @click="sendSearchRequest" class="btn btn-success">Search</button>
                <button @click="resetSearchfilter" class="btn btn-danger">Reset</button>
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
        'selectedCategory',
        'date',
        'selectedDate',
        'searchQuery'
    ],
    data() {
        return {
            currentSelected: 0
        }
    },
    methods: {

        resetSearchfilter() {
                     this.$inertia.get('/Post')
        },
        sendSearchRequest() {

            let query = '';
            query += 'sortByCategory=' + document.getElementById('jsSortByCategory').value + '&';
            query += 'sortByDate=' + document.getElementById('jsSortByDate').value + '&';
            if( this.searchQuery != '') {
                query += 'searchQuery=' + document.getElementById('jsFind').value
            }
            this.$inertia.get('/Post?' + query)
        }

    }

}
</script>
