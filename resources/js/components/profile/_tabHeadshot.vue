<template>
    <div class="tab-pane" id="headshot">
        <form class="form-horizontal form-material">
            <div class="form-group">
                <label class="col-md-12">Upload Photo</label>
                <div class="col-md-12">
                    <input type="file" v-on:change="onFileChange" accept="image/*"
                           class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success">Update Headshot</button>
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
            headshot: ''
        }),
        mounted: function () {
            console.log('Tab-3 component mounted.');
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
        }
    }
</script>
