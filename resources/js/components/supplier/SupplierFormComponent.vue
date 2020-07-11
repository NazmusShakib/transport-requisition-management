<template>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Supplier create</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Supplier</a>
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
                            <div class="form-group col-md-4" v-bind:class="{'has-error' : errors.has('name')}">
                                <label class="control-label">Name:*</label>
                                <input type="text" name="name"
                                       class="form-control" v-validate="'required'" v-model.trim="supplier.name"
                                       v-bind:class="{'has-error' : errors.has('name')}" placeholder="Name"
                                />
                                <div v-show="errors.has('name')"
                                     class="help text-danger">{{ errors.first('name') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('contact_no')}">
                                <label class="control-label">Contact no. :</label>
                                <input type="text" name="contact_no"
                                       v-model.trim="supplier.contact_no"
                                       v-bind:class="{'has-error' : errors.has('contact_no')}"
                                       placeholder="Contact no" class="form-control"/>
                                <div v-show="errors.has('contact_no')"
                                     class="help text-danger">{{ errors.first('contact_no') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('email')}">
                                <label class="control-label">Email:</label>
                                <input
                                    type="email"
                                    name="email"
                                    v-validate="'email'"
                                    v-model.trim="supplier.email"
                                    v-bind:class="{'has-error' : errors.has('email')}"
                                    placeholder="Email"
                                    class="form-control"/>
                                <div v-show="errors.has('email')"
                                     class="help text-danger">{{ errors.first('email') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="control-label">Short name:</label>
                                <input
                                    type="text" name="short_name" class="form-control"
                                    v-model.trim="supplier.short_name"
                                    v-bind:class="{'has-error' : errors.has('short_name')}" placeholder="Short name"/>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('designation')}">
                                <label class="control-label">Designation:</label>
                                <input
                                    type="text" name="designation" v-model.trim="supplier.designation"
                                    v-bind:class="{'has-error' : errors.has('designation')}"
                                    placeholder="Designation" class="form-control"/>
                                <div v-show="errors.has('designation')"
                                     class="help text-danger">{{ errors.first('designation') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('website')}">
                                <label class="control-label">Website:</label>
                                <input
                                    type="text"
                                    name="website"
                                    v-model.trim="supplier.website"
                                    v-bind:class="{'has-error' : errors.has('website')}"
                                    placeholder="Website"
                                    class="form-control"/>
                                <div v-show="errors.has('website')"
                                     class="help text-danger">{{ errors.first('website') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('contact_person')}">
                                <label class="control-label">Contact person:</label>
                                <input
                                    type="text" name="contact_person"
                                    v-model.trim="supplier.contact_person"
                                    v-bind:class="{'has-error' : errors.has('contact_person')}"
                                    placeholder="Contact person" class="form-control"/>
                                <div v-show="errors.has('contact_person')"
                                     class="help text-danger">{{ errors.first('contact_person') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('company')}">
                                <label class="control-label">Companies:</label>
                                <v-select multiple :options="companies" :reduce="company => company.id" label="name"
                                          @search="onCompanySearch" v-model.trim="supplier.companies_id"
                                          placeholder="Select company" name="company_id" :filterable="true"
                                          v-bind:class="{'has-error' : errors.has('company')}">
                                    <template slot="no-options">
                                      Type to select companies ...
                                    </template>
                                </v-select>
                                <div v-show="errors.has('company')"
                                     class="help text-danger">{{ errors.first('company') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('buyers_id')}">
                                <label class="control-label">Tag Buyers:</label>
                                <v-select multiple :options="buyers" :reduce="buyer => buyer.id" label="name"
                                          @search="onBuyerSearch" v-model.trim="supplier.buyers_id"
                                          placeholder="Select buyers"
                                          name="buyers_id"
                                          v-bind:class="{'has-error' : errors.has('buyers_id')}"
                                />
                                <div v-show="errors.has('buyers_id')"
                                     class="help text-danger">{{ errors.first('buyers_id') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('party_types_id')}">
                                <label class="control-label">Party types:</label>
                                <v-select multiple :options="party_types" :reduce="party_type => party_type.id" label="name"
                                          @search="onPartyTypeSearch" v-model.trim="supplier.party_types_id"
                                          placeholder="Select party type"
                                          name="nature_id"
                                          v-bind:class="{'has-error' : errors.has('party_types_id')}"
                                />
                                <div v-show="errors.has('party_types_id')"
                                     class="help text-danger">{{ errors.first('party_types_id') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('nature_id')}">
                                <label class="control-label">Nature:</label>
                                <v-select :options="natures" :reduce="nature => nature.id" label="name"
                                          @search="onNatureSearch" v-model.trim="supplier.nature_id"
                                          placeholder="Nature"
                                          name="nature_id"
                                          v-bind:class="{'has-error' : errors.has('nature_id')}"
                                />
                                <div v-show="errors.has('nature_id')"
                                     class="help text-danger">{{ errors.first('nature_id') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('status')}">
                                <label class="control-label">Status:</label>
                                <input
                                    type="text" name="status"
                                    v-model.trim="supplier.status"
                                    v-bind:class="{'has-error' : errors.has('status')}"
                                    placeholder="Status" class="form-control"/>
                                <div v-show="errors.has('status')"
                                     class="help text-danger">{{ errors.first('status') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('credit_limit_days')}">
                                <label class="control-label">Credit limit (Days):</label>
                                <input
                                    type="text" name="credit_limit_days"
                                    v-model.trim="supplier.credit_limit_days"
                                    v-bind:class="{'has-error' : errors.has('credit_limit_days')}"
                                    placeholder="Credit limit days" class="form-control"/>
                                <div v-show="errors.has('credit_limit_days')"
                                     class="help text-danger">{{ errors.first('credit_limit_days') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('credit_limit_amount')}">
                                <label class="control-label">Credit limit (Amount):</label>
                                <input
                                    type="text" name="credit_limit_amount"
                                    v-model.trim="supplier.credit_limit_amount"
                                    v-bind:class="{'has-error' : errors.has('credit_limit_amount')}"
                                    placeholder="Credit limit amount" class="form-control"/>
                                <div v-show="errors.has('credit_limit_amount')"
                                     class="help text-danger">{{ errors.first('credit_limit_amount') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('image')}">
                                <label class="control-label" for="image">Image:</label>
                                <input type="file" name="image" id="image"
                                       v-bind:class="{'has-error' : errors.has('image')}"
                                       class="form-control"/>
                                <div v-show="errors.has('image')"
                                     class="help text-danger">{{ errors.first('image') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('address_1')}">
                                <label class="control-label" for="address_1">Address 1:</label>
                                <textarea v-model="supplier.address_1" id="address_1" rows="3" class="form-control"/>
                                <div v-show="errors.has('address_1')"
                                     class="help text-danger">{{ errors.first('address_1') }}
                                </div>
                            </div>
                            <div class="form-group col-md-4"
                                 v-bind:class="{'has-error' : errors.has('address_2')}">
                                <label class="control-label" for="address_2">Address 2:</label>
                                <textarea v-model="supplier.address_2" id="address_2" rows="3" class="form-control"/>
                                <div v-show="errors.has('address_2')"
                                     class="help text-danger">{{ errors.first('address_2') }}
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
        CompaniesAPI, BuyersAPI, PartyTypesAPI, NaturesAPI, SuppliersAPI
    } from "~/services/api";

    export default {
        name: "SupplierForm",
        data: () => ({
            supplier: {},
            companies: [],
            party_types: [],
            buyers: [],
            natures: [],
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
            onBuyerSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    BuyersAPI.index(null, search, false).then(buyers => {
                        this.buyers = buyers;
                        loading(false);
                    });
                }
            },
            onPartyTypeSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    PartyTypesAPI.index(null, search, false).then(partyTypes => {
                        this.party_types = partyTypes;
                        loading(false);
                    });
                }
            },
            onNatureSearch(search, loading) {
                if(search.length >= 1) {
                    loading(true);
                    NaturesAPI.index(null, search, false).then(natures => {
                        this.natures = natures;
                        loading(false);
                    });
                }
            },
        },
        created() {
            this.$emit("update:layout", MasterLayout);
            // this.getCompanies();
        }
    };
</script>

<style scoped>
    /*
     * Styles comes here
    */
</style>
