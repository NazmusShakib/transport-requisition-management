<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Work order create</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <router-link :to="{ name: 'WorkOrderList' }">Work orders</router-link>
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
                                          @search="onCompanySearch" v-model.trim="workOrder.company_id"
                                          placeholder="Company" v-validate="'required'"
                                          name="company"
                                          v-bind:class="{'has-error' : errors.has('company')}"
                                />
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('supplier')}">
                                <label class="control-label">Supplier:</label>
                                <v-select :options="suppliers" :reduce="supplier => supplier.id" label="name"
                                          @search="onSupplierSearch" v-model.trim="workOrder.supplier_id"
                                          placeholder="Supplier" v-validate="'required'"
                                          name="supplier"
                                          v-bind:class="{'has-error' : errors.has('supplier')}"
                                />
                                <div v-show="errors.has('supplier')"
                                     class="help text-danger">{{ errors.first('supplier') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('source')}">
                                <label class="control-label">Source:</label>
                                <v-select :options="sources" :reduce="source => source.id" label="name"
                                          @search="onSourceSearch" v-model.trim="workOrder.source_id"
                                          placeholder="Source"
                                          name="source"
                                          v-bind:class="{'has-error' : errors.has('source')}"/>
                                <div v-show="errors.has('source')"
                                     class="help text-danger">{{ errors.first('source') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('location')}">
                                <label class="control-label">Location:</label>
                                <v-select :options="locations" :reduce="location => location.id" label="name"
                                          @search="onLocationSearch" v-model.trim="workOrder.location_id"
                                          placeholder="Location" v-validate="'required'"
                                          name="location"
                                          v-bind:class="{'has-error' : errors.has('location')}"
                                />
                                <div v-show="errors.has('location')"
                                     class="help text-danger">{{ errors.first('location') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('pay_mode')}">
                                <label class="control-label" for="pay_mode">Pay mode:</label>
                                <select name="pay_mode" class="form-control" v-model="workOrder.pay_mode" id="pay_mode">
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
                                <label class="control-label" for="delivery_date">Delivery date:</label>
                                <input type="date" id="delivery_date" class="form-control" v-model="workOrder.delivery_date">
                                <div v-show="errors.has('delivery_date')"
                                     class="help text-danger">{{ errors.first('delivery_date') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('ready_to_approve')}">
                                <label class="control-label" for="ready_to_approve">Ready to Approve:</label>
                                <select name="ready_to_approve" class="form-control" v-model="workOrder.ready_to_approve" id="ready_to_approve">
                                    <option value="No" selected> No </option>
                                    <option value="Yes"> Yes </option>
                                </select>
                                <div v-show="errors.has('ready_to_approve')"
                                     class="help text-danger">{{ errors.first('ready_to_approve') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('place_of_delivery')}">
                                <label class="control-label" for="place_of_delivery">Place of Delivery:</label>
                                <input class="form-control" v-model="workOrder.place_of_delivery" id="place_of_delivery"/>
                                <div v-show="errors.has('place_of_delivery')"
                                     class="help text-danger">{{ errors.first('place_of_delivery') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('part_of_loading')}">
                                <label class="control-label" for="part_of_loading">Part of Loading:</label>
                                <input class="form-control" v-model="workOrder.part_of_loading" id="part_of_loading"/>
                                <div v-show="errors.has('part_of_loading')"
                                     class="help text-danger">{{ errors.first('part_of_loading') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('tenor')}">
                                <label class="control-label" for="tenor">Tenor:</label>
                                <input class="form-control" v-model="workOrder.tenor" id="tenor"/>
                                <div v-show="errors.has('tenor')"
                                     class="help text-danger">{{ errors.first('tenor') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('pay_term')}">
                                <label class="control-label" for="pay_term">Pay Term:</label>
                                <input class="form-control" v-model="workOrder.pay_term" id="pay_term"/>
                                <div v-show="errors.has('pay_term')"
                                     class="help text-danger">{{ errors.first('pay_term') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('attention')}">
                                <label class="control-label" for="attention">Attention:</label>
                                <input class="form-control" v-model="workOrder.attention" id="attention"/>
                                <div v-show="errors.has('attention')"
                                     class="help text-danger">{{ errors.first('attention') }}
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
        WorkOrdersAPI, UtilitiesAPI, CompaniesAPI, SuppliersAPI, SourcesAPI, LocationsAPI
    } from "~/services/api";

    export default {
        name: "WorkOrderForm",
        data: () => ({
            workOrder: {
                ready_to_approve: 'No',
                pay_mode: ''
            },
            companies: [],
            suppliers: [],
            locations: [],
            sources: [],
            pay_modes: [],
            delivery_date: '',
            ready_to_approve: '',
        }),
        mounted: function () {
            this.onPayModeClick();
        },
        methods: {
            handleSubmit() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        WorkOrdersAPI.store(this.workOrder).then(response => {
                            this.$notification.success(response.data.message);
                            this.$router.push({name: 'WorkOrderList'});
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
            onSupplierSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    SuppliersAPI.index(null, search, false).then(suppliers => {
                        this.suppliers = suppliers;
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
