<template>
    <div class="d-flex flex-column">
        <form class="w-50 align-self-center" @submit.prevent="submit">
                <div class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" v-model="form.name"  placeholder="Name">
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" v-model="form.email"  placeholder="Email">
                </div>
                <div class="col-12">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone" v-model="form.phone" placeholder="Phone">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" v-model="form.password" placeholder="Password">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password confirm</label>
                    <input type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation" name="password_confirmation" placeholder="Password">
                </div>
                <p>Already has account? <a href="{{ route('login') }}">SingIn</a></p>
                <button type="submit" class="w-100 btn btn-primary btn-lg">SingUp</button>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    setup: function () {
        const form = useForm({
            name: null,
            email: null,
            phone: null,
            password: null,
            password_confirmation: null,
        })

        function submit() {
            this.$inertia.post(route('registration', {_token: this.$page.props.csrf_token,
                name: form.name,
                email: form.email,
                phone: form.phone,
                password: form.password,
                password_confirmation: form.password_confirmation,
            }))
        }

        return { form, submit}
    },
}
</script>

<style scoped>

</style>
