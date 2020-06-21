<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Suppliers list</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Supplier</a>
                    </li>
                    <li class="active">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <router-link :to="{ name: 'SupplierForm'}" tag="el-button">Add supplier</router-link>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import VuePagination from "~/components/partials/_PaginationComponent";

    import {MessageBox} from "element-ui";

    export default {
        name: "SupplierList",
        components: {
            VuePagination,
        },
        data: () => ({
            suppliers: {
                total: 0,
                per_page: 1,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,
            searchText: "",
            dialogVisible: false,
            dialogTitle: "Add a new",
        }),
        mounted: function () {
            this.getSuppliers();
        },
        methods: {
            getSuppliers() {

            },
            filterTableData() {
                //
            },
            destroy(id, index) {
                //
            },
            edit(vehicle, index) {
                //
            }
        },
        created() {
            this.$emit("update:layout", MasterLayout);
        }
    };
</script>

<style scoped>
    /*
     * Styles comes here
    */
</style>
