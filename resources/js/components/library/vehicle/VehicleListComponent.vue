<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Vehicle list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Vehicle</a>
                    </li>
                    <li class="active">List</li>
                </ol>
            </div>
        </div>
        <!--row -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-sm-12">
                            <el-input
                                placeholder="Search input"
                                v-model="searchText"
                                @keyup.native="filterTableData"
                                suffix-icon="el-icon-search"
                                size="small"
                            />
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-12">
                            <el-button
                                type="primary"
                                class="pull-right"
                                size="small"
                                @click="dialogVisible = !dialogVisible"
                            >
                                <i class="el-icon-plus el-icon-right"></i> Add new
                            </el-button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Display name</th>
                                <th>Registration</th>
                                <th>Chassis</th>
                                <th>Motor CC</th>
                                <th>Description</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center" v-if="vehicles.total === 0">
                                <td colspan="8">No data to display.</td>
                            </tr>
                            <tr v-else v-for="(vehicle, index) in vehicles.data" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ vehicle.name }}</td>
                                <td>{{ vehicle.display_name }}</td>
                                <td>{{ vehicle.registration_no }}</td>
                                <td>{{ vehicle.chassis_no }}</td>
                                <td>{{ vehicle.motor_cc }}</td>
                                <td>{{ vehicle.description }}</td>
                                <td>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Edit"
                                        @click="edit(vehicle, index)"
                                    >
                                        <i class="fa fa-edit m-r-5"></i>
                                    </a>
                                    <span class="m-r-5">|</span>
                                    <a
                                        href="javascript:void(0)"
                                        data-toggle="tooltip"
                                        title="Delete"
                                        @click="destroy(vehicle.id, index)"
                                    >
                                        <i class="fa fa-trash-o m-r-5"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <vue-pagination
                            :pagination="vehicles"
                            v-if="vehicles.total >= 11"
                            @paginate="getVehicles()"
                            :offset="4"
                        ></vue-pagination>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <vehicle-modal :dialog-visible.sync="dialogVisible" :dialog-title.sync="dialogTitle"></vehicle-modal>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";
    import VehicleModal from "~/components/library/vehicle/_VehicleModalComponent";

    import {MessageBox} from "element-ui";

    export default {
        name: "VehicleList",
        components: {
            VuePagination,
            VehicleModal
        },
        data: () => ({
            vehicles: {
                total: 0,
                per_page: 1,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,
            searchText: "",
            dialogVisible: false,
            dialogTitle: "Add a new vehicle",
        }),
        mounted: function () {
            this.getVehicles();
        },
        methods: {
            getVehicles() {
                axios.get(this.$baseURL + "library/vehicles?page=" + this.vehicles.current_page)
                    .then(response => {
                        this.vehicles = response.data;
                    })
                    .catch(() => {
                        console.log("handle server error from here.");
                    });
            },
            filterTableData() {
                //
            },
            destroy(id, index) {
                MessageBox.confirm(
                    "This will permanently delete. Continue?",
                    "Warning",
                    {
                        confirmButtonText: "OK",
                        cancelButtonText: "Cancel",
                        type: "warning"
                    }
                )
                    .then(() => {
                        axios.delete(this.$baseURL + "library/vehicles/" + id)
                            .then(response => {
                                this.vehicles.data.splice(index, 1);
                                this.vehicles.total--;
                                this.$notification.success(response.data.message);
                            })
                            .catch(error => {
                                console.log("Could not delete this.");
                            });
                    })
                    .catch(() => {
                        console.log("Delete canceled");
                    });
            },
            edit(vehicle, index) {
                this.$eventBus.$emit('edit-vehicle', vehicle);
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
            this.$eventBus.$on("add-vehicle", vehicle => {
                this.vehicles.total++;
                this.vehicles.data.unshift(vehicle);
            });
        }
    };
</script>


<style scoped>
</style>
