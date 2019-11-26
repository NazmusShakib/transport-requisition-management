<template>
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Blank</h4></div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Blank</a></li>
                    </ol>
                </div>
            </div>
            <!--row -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">

                        Your content comes here!

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
</template>

<script>
    import MasterLayout from './layouts/MasterLayoutComponent.vue';

    export default {
        name: 'Blank',
        components: {
            //
        },
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Blank component mounted.');
        },
        created() {
            this.$emit('update:layout', MasterLayout);
        },
    }
</script>
