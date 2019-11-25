<template>
    <div>
        <div id="wrapper">

            <main class="MasterLayout__main">
                <slot/>
            </main>

        </div>

    </div>

</template>

<style lang="scss">

</style>

<script>
    export default {
        components: {
            //
        },
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Guest layout component mounted.');
        }
    }
</script>
