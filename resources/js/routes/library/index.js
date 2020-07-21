// Navigations
import VehicleList from '~/components/library/vehicle/VehicleListComponent';
const PartyTypeList = () => import(/* webpackChunkName: "PartyTypeListComponent" */ '~/components/library/party-type/PartyTypeListComponent');
const NatureList = () => import(/* webpackChunkName: "NatureListComponent" */ '~/components/library/nature/NatureListComponent');
const CompanyList = () => import(/* webpackChunkName: "CompanyListComponent" */ '~/components/library/company/CompanyListComponent');
const BuyerList = () => import(/* webpackChunkName: "BuyerListComponent" */ '~/components/library/buyer/BuyerListComponent');
const DepartmentList = () => import(/* webpackChunkName: "DepartmentListComponent" */ '~/components/library/department/DepartmentListComponent');
const DivisionList = () => import(/* webpackChunkName: "DivisionListComponent" */ '~/components/library/division/DivisionListComponent');
const LocationList = () => import(/* webpackChunkName: "LocationListComponent" */ '~/components/library/location/LocationListComponent');
const SectionList = () => import(/* webpackChunkName: "SectionListComponent" */ '~/components/library/section/SectionListComponent');
const SourceList = () => import(/* webpackChunkName: "SourceListComponent" */ '~/components/library/source/SourceListComponent');
const StoreList = () => import(/* webpackChunkName: "StoreListComponent" */ '~/components/library/store/StoreListComponent');

const libraries = [
    {
        path: '/library/vehicles',
        component: VehicleList,
        name: 'VehicleList',
        meta: {
            requireAuth: true,
            title: 'Vehicle List - App',
            metaTags: [{
                name: 'description',
                content: 'The vehicle list page of our app.'
            }, {
                property: 'og:description',
                content: 'The vehicle list page of our app.'
            }]
        }
    },
    {
        path: '/library/party-types',
        component: PartyTypeList,
        name: 'PartyTypeList',
        meta: {
            requireAuth: true,
            title: 'Party Type List - App',
            metaTags: [{
                name: 'description',
                content: 'The party type list page of our app.'
            }, {
                property: 'og:description',
                content: 'The party type list page of our app.'
            }]
        }
    },
    {
        path: '/library/natures',
        component: NatureList,
        name: 'NatureList',
        meta: {
            requireAuth: true,
            title: 'Natures list - App',
            metaTags: [{
                name: 'description',
                content: 'The nature list page of our app.'
            }, {
                property: 'og:description',
                content: 'The nature page of our app.'
            }]
        }
    },
    {
        path: '/library/companies',
        component: CompanyList,
        name: 'CompanyList',
        meta: {
            requireAuth: true,
            title: 'Company list - App',
            metaTags: [{
                name: 'description',
                content: 'The company list page of our app.'
            }, {
                property: 'og:description',
                content: 'The company page of our app.'
            }]
        }
    },
    {
        path: '/library/buyers',
        component: BuyerList,
        name: 'BuyerList',
        meta: {
            requireAuth: true,
            title: 'Buyers list - App',
            metaTags: [{
                name: 'description',
                content: 'The buyer list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
    {
        path: '/library/departments',
        component: DepartmentList,
        name: 'DepartmentList',
        meta: {
            requireAuth: true,
            title: 'Department list - App',
            metaTags: [{
                name: 'description',
                content: 'The department list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
    {
        path: '/library/divisions',
        component: DivisionList,
        name: 'DivisionList',
        meta: {
            requireAuth: true,
            title: 'Division list - App',
            metaTags: [{
                name: 'description',
                content: 'The division list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
    {
        path: '/library/locations',
        component: LocationList,
        name: 'LocationList',
        meta: {
            requireAuth: true,
            title: 'Location list - App',
            metaTags: [{
                name: 'description',
                content: 'The location list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
    {
        path: '/library/sections',
        component: SectionList,
        name: 'SectionList',
        meta: {
            requireAuth: true,
            title: 'Section list - App',
            metaTags: [{
                name: 'description',
                content: 'The section list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
    {
        path: '/library/sources',
        component: SourceList,
        name: 'SourceList',
        meta: {
            requireAuth: true,
            title: 'Source list - App',
            metaTags: [{
                name: 'description',
                content: 'The source list page of our app.'
            }, {
                property: 'og:description',
                content: 'The source page of our app.'
            }]
        }
    },
    {
        path: '/library/stores',
        component: StoreList,
        name: 'StoreList',
        meta: {
            requireAuth: true,
            title: 'Store list - App',
            metaTags: [{
                name: 'description',
                content: 'The store list page of our app.'
            }, {
                property: 'og:description',
                content: 'The store page of our app.'
            }]
        }
    },
];

const libraryRoutes = libraries.concat(
    //
);

export default libraryRoutes;
