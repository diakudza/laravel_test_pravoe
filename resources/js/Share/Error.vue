<template>
 <div v-if="flash.success || flash.alert" class="alert" :class="{'alert-success': flash.success , 'alert-danger': flash.alert}" >
    <p v-if="flash.success"> {{ flash.success }} </p>
    <p v-if="flash.alert"> {{ flash.alert }} </p>
 </div>

    <div v-if="errors !== null" class="alert-danger">
        <p v-for="(item, key) in errors" :key="key">
            {{item}}
        </p>
    </div>
</template>

<script>
export default {
props: [
    'flash',
    "errors",
]
}
</script>
