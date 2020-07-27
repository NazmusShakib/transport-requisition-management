<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Purchase requisition create</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <router-link :to="{ name: 'PurchaseRequisitionList' }">Purchase requisition</router-link>
                    </li>
                    <li class="active">Create</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <form method="POST" @submit.prevent="handleSubmit()" novalidate>
                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Company:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Location:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Division:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Department:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Section:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Store:</label>
                                <v-select :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.nature_id"
                                          placeholder="Company"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button class="btn btn-danger" type="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MasterLayout from "~/components/layouts/MasterLayoutComponent";
    import {MessageBox} from "element-ui";

    import {
        CompaniesAPI, DepartmentsAPI, StoresAPI, SourcesAPI, DivisionsAPI, LocationsAPI, SectionsAPI
    } from "~/services/api";

    export default {
        name: "PurchaseRequisitionForm",
        data: () => ({
            purchaseRequisition: {},
            companies: [],
            departments: [],
            stores: [],
            locations: [],
            sections: [],
            divisions: [],
            sources: [],
        }),
        mounted: function () {
            //
        },
        methods: {
            handleSubmit() {
                SuppliersAPI.store(this.supplier).then(response => {
                    this.$notification.success(response.data.message);
                    this.$router.push({name: 'SupplierList'});
                }).catch(error => {
                    this.$setErrorsFromResponse(error.response.data);
                    this.$notification.error(error.response.data.message);
                });
            },
            onCompanySearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    CompaniesAPI.index(null, search, false).then(companies => {
                        this.companies = companies;
                        loading(false);
                    });
                }
            },
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
