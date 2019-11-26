<template>
    <div class="tab-pane" id="change-password">
        <form class="form-horizontal form-material">
            <div class="form-group">
                <label class="col-md-12">Old Password</label>
                <div class="col-md-12">
                    <input type="password" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">New Password</label>
                <div class="col-md-12">
                    <input type="password" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Password Confirmation</label>
                <div class="col-md-12">
                    <input type="password" class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: {
            //
        },
        data: () => ({
            //
        }),
        mounted: function () {
            console.log('Tab-4 component mounted.');
        },
        methods: {
            //
        }
    }
</script>
