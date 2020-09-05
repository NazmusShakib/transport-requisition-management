<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Purchase req. create</h4>
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
                                          @search="onCompanySearch" v-model.trim="purchaseRequisition.company_id"
                                          placeholder="Company" v-validate="'required'"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('location')}">
                                <label class="control-label">Location:</label>
                                <v-select :options="locations" :reduce="location => location.id" label="name"
                                          @search="onLocationSearch" v-model.trim="purchaseRequisition.location_id"
                                          placeholder="Location" v-validate="'required'"
                                          name="location"
                                          v-bind:class="{'has-error' : errors.has('location')}"
                                />
                                <div v-show="errors.has('location')"
                                     class="help text-danger">{{ errors.first('location') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('division')}">
                                <label class="control-label">Division:</label>
                                <v-select :options="divisions" :reduce="division => division.id" label="name"
                                          @search="onDivisionSearch" v-model.trim="purchaseRequisition.division_id"
                                          placeholder="Division"
                                          name="division"
                                          v-bind:class="{'has-error' : errors.has('division')}"
                                />
                                <div v-show="errors.has('division')"
                                     class="help text-danger">{{ errors.first('division') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('department')}">
                                <label class="control-label">Department:</label>
                                <v-select :options="departments" :reduce="department => department.id" label="name"
                                          @search="onDepartmentSearch" v-model.trim="purchaseRequisition.department_id"
                                          placeholder="Department"
                                          name="department"
                                          v-bind:class="{'has-error' : errors.has('department')}"
                                />
                                <div v-show="errors.has('department')"
                                     class="help text-danger">{{ errors.first('department') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('section')}">
                                <label class="control-label">Section:</label>
                                <v-select :options="sections" :reduce="section => section.id" label="name"
                                          @search="onSectionSearch" v-model.trim="purchaseRequisition.section_id"
                                          placeholder="Section"
                                          name="section"
                                          v-bind:class="{'has-error' : errors.has('section')}"
                                />
                                <div v-show="errors.has('section')"
                                     class="help text-danger">{{ errors.first('section') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('store')}">
                                <label class="control-label">Store:</label>
                                <v-select :options="stores" :reduce="store => store.id" label="name"
                                          @search="onStoreSearch" v-model.trim="purchaseRequisition.store_id"
                                          placeholder="Store" v-validate="'required'"
                                          name="store"
                                          v-bind:class="{'has-error' : errors.has('store')}"/>
                                <div v-show="errors.has('store')"
                                     class="help text-danger">{{ errors.first('store') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('source')}">
                                <label class="control-label">Source:</label>
                                <v-select :options="sources" :reduce="source => source.id" label="name"
                                          @search="onSourceSearch" v-model.trim="purchaseRequisition.source_id"
                                          placeholder="Source"
                                          name="source"
                                          v-bind:class="{'has-error' : errors.has('source')}"/>
                                <div v-show="errors.has('source')"
                                     class="help text-danger">{{ errors.first('source') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('pay_mode')}">
                                <label class="control-label" for="pay_mode">Pay mode:</label>
                                <select name="pay_mode" class="form-control" v-model="purchaseRequisition.pay_mode" id="pay_mode">
                                    <option value="" selected>Select pay mode</option>
                                    <option v-for="payMode in pay_modes" v-bind:value="payMode.key">
                                        {{ payMode.value }}
                                    </option>
                                </select>
                                <div v-show="errors.has('pay_mode')"
                                     class="help text-danger">{{ errors.first('pay_mode') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('delivery_date')}">
                                <label class="control-label" for="purchaseRequisition">Delivery date:</label>
                                <input type="date" id="purchaseRequisition" class="form-control" v-model="purchaseRequisition.delivery_date">
                                <div v-show="errors.has('delivery_date')"
                                     class="help text-danger">{{ errors.first('delivery_date') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4" v-bind:class="{'has-error' : errors.has('iso_no')}">
                                <label class="control-label" for="iso_no">ISO No.:</label>
                                <input type="text" id="iso_no" class="form-control" v-model="purchaseRequisition.iso_no">
                                <div v-show="errors.has('iso_no')"
                                     class="help text-danger">{{ errors.first('iso_no') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4" v-bind:class="{'has-error' : errors.has('remarks')}">
                                <label class="control-label" for="remarks">Remarks:</label>
                                <input type="text" id="remarks" name="remarks" class="form-control" v-model="purchaseRequisition.remarks">
                                <div v-show="errors.has('remarks')"
                                     class="help text-danger">{{ errors.first('remarks') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4" v-bind:class="{'has-error' : errors.has('ready_to_approve')}">
                                <label class="control-label" for="ready_to_approve">Ready to Approve:</label>
                                <select name="ready_to_approve" class="form-control" v-model="purchaseRequisition.ready_to_approve" id="ready_to_approve">
                                    <option value="No" selected> No </option>
                                    <option value="Yes"> Yes </option>
                                </select>
                                <div v-show="errors.has('ready_to_approve')"
                                     class="help text-danger">{{ errors.first('ready_to_approve') }}
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

    import {
        PurchaseRequisitionsAPI, UtilitiesAPI, CompaniesAPI, DepartmentsAPI, StoresAPI, SourcesAPI, DivisionsAPI, LocationsAPI, SectionsAPI
    } from "~/services/api";

    export default {
        name: "PurchaseRequisitionForm",
        data: () => ({
            purchaseRequisition: {
                ready_to_approve: 'No',
                pay_mode: ''
            },
            companies: [],
            locations: [],
            divisions: [],
            departments: [],
            sections: [],
            stores: [],
            sources: [],
            pay_modes: [],
            requisition_date: '',
            delivery_date: '',
            remarks: '',
            ready_to_approve: '',
            iso_no: '',
            manual_requisition_no: '',
        }),
        mounted: function () {
            this.onPayModeClick();
        },
        methods: {
            handleSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        PurchaseRequisitionsAPI.store(this.purchaseRequisition).then(response => {
                            this.$notification.success(response.data.message);
                            this.$router.push({name: 'PurchaseRequisitionList'});
                        }).catch(error => {
                            this.$setErrorsFromResponse(error.response.data);
                            this.$notification.error(error.response.data.message);
                        });
                    }
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
            onLocationSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    LocationsAPI.index(null, search, false).then(locations => {
                        this.locations = locations;
                        loading(false);
                    });
                }
            },
            onDivisionSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    DivisionsAPI.index(null, search, false).then(divisions => {
                        this.divisions = divisions;
                        loading(false);
                    });
                }
            },
            onDepartmentSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    DepartmentsAPI.index(null, search, false).then(departments => {
                        this.departments = departments;
                        loading(false);
                    });
                }
            },
            onSectionSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    SectionsAPI.index(null, search, false).then(sections => {
                        this.sections = sections;
                        loading(false);
                    });
                }
            },
            onSourceSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    SourcesAPI.index(null, search, false).then(sources => {
                        this.sources = sources;
                        loading(false);
                    });
                }
            },
            onStoreSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    StoresAPI.index(null, search, false).then(stores => {
                        this.stores = stores;
                        loading(false);
                    });
                }
            },
            onPayModeClick() {
                let utils = [];
                    UtilitiesAPI.index().then(utilities => {
                        Object.entries(utilities).forEach((value) =>{
                            utils.push ({
                                key: value[0],
                                value: value[1],
                            });
                        });
                        this.pay_modes = utils;
                    });
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
