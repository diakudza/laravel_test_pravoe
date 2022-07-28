<template>
    <div class="container mx-auto">
        <HeaderTop :user="$attrs.auth.user"/>

        <main class="py-5 container mainborder">
<!--            <Error :flash="$page.props.flash" :errors="$page.props.errors"/>-->
            <slot/>
        </main>
        <Footer class="mainborder"/>
    </div>
</template>

<script>

import HeaderTop from "../Pages/Public/components/HeaderTop"
import Footer from "../Pages/Public/components/Footer";
import Error from "./Error";
export default {
    name: "Layout",
    components: {
        HeaderTop,
        Footer,
        Error
    }
}

</script>

<style scoped>

</style>
