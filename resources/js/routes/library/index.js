// Navigations
import VehicleList from '~/components/library/vehicle/VehicleListComponent';
import PartyTypeList from '~/components/library/party-type/PartyTypeListComponent';
import NatureList from '~/components/library/nature/NatureListComponent';
import CompanyList from '~/components/library/company/CompanyListComponent';


export default [
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

]
