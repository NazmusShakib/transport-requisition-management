// Navigations
import VehicleList from '~/components/library/vehicle/VehicleListComponent';
const PartyTypeList = () => import(/* webpackChunkName: "PartyTypeListComponent" */ '~/components/library/party-type/PartyTypeListComponent');
const NatureList = () => import(/* webpackChunkName: "NatureListComponent" */ '~/components/library/nature/NatureListComponent');
const CompanyList = () => import(/* webpackChunkName: "CompanyListComponent" */ '~/components/library/company/CompanyListComponent');
const BuyerList = () => import(/* webpackChunkName: "BuyerListComponent" */ '~/components/library/buyer/BuyerListComponent');

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
                content: 'The buyers list page of our app.'
            }, {
                property: 'og:description',
                content: 'The buyers page of our app.'
            }]
        }
    },
];

const libraryRoutes = libraries.concat(
    //
);

export default libraryRoutes;
