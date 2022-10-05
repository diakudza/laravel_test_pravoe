<template>
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm ">
            <div class="container">
                <div class="d-flex justify-content-sm-start">
                    <Link :href="route('home')" class="navbar-brand d-flex align-items-center">
                        <strong>Home</strong>
                    </Link>
                    <Link :href="route('Post.index')" class="navbar-brand d-flex align-items-center">
                        <strong>Posts</strong>
                    </Link>

                    <Link :href="route('Post.create')" v-if="user.loggedIn" class="navbar-brand d-flex align-items-center">
                        <strong>New Post</strong>
                    </Link>
                </div>
                <div class="d-flex flex-row">
                    <div v-if="!user.loggedIn" class="d-flex flex-row ">
                        <Link :href="route('registrationform')" class="btn navbar-brand d-flex align-items-center">SingUp</Link>
                        <button  @click="changeFormVisible" class="btn navbar-brand d-flex align-items-center">SingIn
                        </button>
                        <form :class="{'show':formVisible}" class="mydropform dropdown-menu p-4 "  @submit.prevent="submit">

                            <div class="mb-3">
                                <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
                                <input type="email" v-model="form.email" class="form-control" id="exampleDropdownFormEmail2"
                                       placeholder="email@example.com" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                                <input type="password" v-model="form.password" class="form-control" id="exampleDropdownFormPassword2"
                                       name="password"
                                       placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">SingIn</button>
                        </form>
                    </div>
                    <div v-if="user.loggedIn">

                        <button  @click="changeFormVisible" class="btn navbar-brand d-flex align-items-center">
                            {{ user.profile.name }}
                        </button>
                        <form :class="{'show':formVisible}" class="mydropformmenu dropdown-menu p-4 "  @submit.prevent="submit">
                            <div class="mb-3">
                                <Link :href="route('logout')" class="d-flex align-items-center">SingOut</Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import {Link, useForm} from "@inertiajs/inertia-vue3";

export default {
    setup: function () {
        const form = useForm({
            email: null,
            password: null,
        })

        function submit() {
            this.$inertia.post(route('login', {_token: this.$page.props.csrf_token, email: form.email, password: form.password}))
        }
        return { form, submit}
    },
    components: {Link},
    name: 'HeaderTop',
    props: ['user'],
    data() {
        return {
            formVisible: false,
        }
    },
    methods: {
        changeFormVisible() {
            this.formVisible = !this.formVisible
        }
    }

}


</script>
