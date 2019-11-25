<template>
    <div id="wrapper" class="login-register">
        <div class="login-box box-width-loging">
            <div class="white-box">

                <h1>Register</h1>

            </div>
        </div>
    </div>

</template>

<script>
    import GuestLayout from '../layouts/GuestLayoutComponent.vue';

    export default {
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Register component mounted.');
        },
        created() {
            this.$emit('update:layout', GuestLayout);
        },
    }
</script>
