<template>
    <el-dialog width="40%" top="5vh" :title="dialogTitle" :visible="dialogVisible" @close="onClose">
        <form method="POST" @submit.prevent="handleSubmit()" novalidate>
            <div class="row">
                <div class="form-group col-md-12" v-bind:class="{'has-error' : errors.has('name')}">
                    <label class="control-label">Name:*</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        v-validate="'required'"
                        v-model.trim="partyType.name"
                        v-bind:class="{'has-error' : errors.has('name')}"
                        placeholder="Name"
                    />
                    <div
                        v-show="errors.has('name')"
                        class="help text-danger"
                    >{{ errors.first('name') }}
                    </div>
                </div>


                <div
                    class="form-group col-md-12"
                    v-bind:class="{'has-error' : errors.has('display_name')}"
                >
                    <label class="control-label">Display name:</label>
                    <input
                        type="text"
                        name="display_name"
                        v-model.trim="partyType.display_name"
                        v-bind:class="{'has-error' : errors.has('display_name')}"
                        placeholder="Display name"
                        class="form-control"
                    />
                    <div
                        v-show="errors.has('display_name')"
                        class="help text-danger"
                    >{{ errors.first('display_name') }}
                    </div>
                </div>

                <div
                    class="form-group col-md-12"
                    v-bind:class="{'has-error' : errors.has('description')}"
                >
                    <label class="control-label" for="description">Description:</label>
                    <textarea v-model="partyType.description" id="description" rows="3" class="form-control"/>
                    <div
                        v-show="errors.has('description')"
                        class="help text-danger"
                    >{{ errors.first('description') }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Save</button>
                <button class="btn btn-danger" type="reset">Clear</button>
            </div>
        </form>
    </el-dialog>
</template>

<script>
    export default {
        props: {
            dialogVisible: {
                type: Boolean,
                required: true
            },
            dialogTitle: {
                type: String,
                required: true
            }
        },
        data: () => ({
            partyType: {},
            submitMethod: "create"
        }),
        watch: {
            //
        },
        methods: {
            handleSubmit() {
                if (this.submitMethod === "create") {
                    axios.post(this.$baseURL + 'library/party-types', this.partyType).then(response => {
                        this.$eventBus.$emit('add-party-type', response.data.data);
                        this.$notification.success(response.data.message);
                        this.onClose();
                    }).catch(error => {
                        this.$setErrorsFromResponse(error.response.data);
                        this.$notification.error(error.response.data.message);
                    });
                } else if (this.submitMethod === "update") {
                    axios.put(this.$baseURL + 'library/party-types/' + this.partyType.id, this.partyType)
                        .then(response => {
                            this.$notification.success(response.data.message);
                            this.onClose();
                        })
                        .catch(error => {
                            this.$setErrorsFromResponse(error.response.data);
                            this.$notification.error(error.response.data.message);
                        });
                }
            },

            onClose() {
                this.$validator.reset();
                this.partyType = {};
                this.submitMethod = "create";
                this.$emit("update:dialogVisible", false);
            }
        },

        mounted: function () {
            // We listen for the event on the eventBus
            this.$eventBus.$on("edit-party-type", partyType => {
                this.submitMethod = "update";
                this.partyType = partyType;
                this.$emit("update:dialogVisible", true)
                    .$emit("update:dialogTitle", "Party type update");
            });
        },
        computed: {
            //
        },
        created: function () {
            //
        },
        beforeDestroy() {
            this.$eventBus.$off("edit-party-type");
        }
    };
</script>

<style scoped>
</style>
