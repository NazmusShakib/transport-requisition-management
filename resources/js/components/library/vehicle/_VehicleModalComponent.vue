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
                        v-model.trim="vehicle.name"
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
                        v-model.trim="vehicle.display_name"
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
                    v-bind:class="{'has-error' : errors.has('registration_no')}"
                >
                    <label class="control-label">Registration no.:</label>
                    <input
                        type="text"
                        name="registration_no"
                        v-model.trim="vehicle.registration_no"
                        v-bind:class="{'has-error' : errors.has('registration_no')}"
                        placeholder="Registration number"
                        class="form-control"
                    />
                    <div
                        v-show="errors.has('registration_no')"
                        class="help text-danger"
                    >{{ errors.first('registration_no') }}
                    </div>
                </div>


                <div
                    class="form-group col-md-12"
                    v-bind:class="{'has-error' : errors.has('chassis_no')}"
                >
                    <label class="control-label">Chassis no.:</label>
                    <input
                        type="text"
                        name="chassis_no"
                        v-model.trim="vehicle.chassis_no"
                        v-bind:class="{'has-error' : errors.has('chassis_no')}"
                        placeholder="Chassis number"
                        class="form-control"
                    />
                    <div
                        v-show="errors.has('chassis_no')"
                        class="help text-danger"
                    >{{ errors.first('chassis_no') }}
                    </div>
                </div>


                <div
                    class="form-group col-md-12"
                    v-bind:class="{'has-error' : errors.has('motor_cc')}"
                >
                    <label class="control-label">Motor CC:</label>
                    <input
                        type="text"
                        name="motor_cc"
                        v-model.trim="vehicle.motor_cc"
                        v-bind:class="{'has-error' : errors.has('motor_cc')}"
                        v-validate="'decimal:3'"
                        placeholder="00"
                        class="form-control"
                    />
                    <div
                        v-show="errors.has('motor_cc')"
                        class="help text-danger"
                    >{{ errors.first('motor_cc') }}
                    </div>
                </div>


                <div
                    class="form-group col-md-12"
                    v-bind:class="{'has-error' : errors.has('description')}"
                >
                    <label class="control-label" for="description">Description:</label>
                    <textarea v-model="vehicle.description" id="description" rows="3" class="form-control"/>
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
            vehicle: {},
            submitMethod: "create"
        }),
        watch: {
            //
        },
        methods: {
            handleSubmit() {
                if (this.submitMethod === "create") {
                    axios.post(this.$baseURL + 'library/vehicles', this.vehicle).then(response => {
                        this.$eventBus.$emit('add-vehicle', response.data.data);
                        this.$notification.success(response.data.message);
                        this.onClose();
                    }).catch(error => {
                        this.$setErrorsFromResponse(error.response.data);
                        this.$notification.error(error.response.data.message);
                    });
                } else if (this.submitMethod === "update") {
                    axios.put(this.$baseURL + 'library/vehicles/' + this.vehicle.id, this.vehicle)
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
                this.vehicle = {};
                this.submitMethod = "create";
                this.$emit("update:dialogVisible", false);
            }
        },

        mounted: function () {
            // We listen for the event on the eventBus
            this.$eventBus.$on("edit-vehicle", vehicle => {
                this.submitMethod = "update";
                this.vehicle = vehicle;
                this.$emit("update:dialogVisible", true)
                    .$emit("update:dialogTitle", "Vehicle update");
            });
        },
        computed: {
            //
        },
        created: function () {
            //
        },
        beforeDestroy() {
            this.$eventBus.$off("edit-vehicle");
        }
    };
</script>

<style scoped>
</style>
