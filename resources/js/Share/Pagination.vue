<template>
    <div v-if="links.length > 1" class="mt-2">
        <nav>
            <ul class="pagination">
                <li v-for="(link, k) in links"
                    class="page-item" :key="k"
                    :disabled="link.url === null"
                    :class="{'active': link.active, 'disabled': link.url === null}">
                    <Link :href="link.url"
                          class="page-link"
                          v-html="link.label"
                          target="_top">
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link
    },
    props: {
        links: Array,
    }
}
</script>

