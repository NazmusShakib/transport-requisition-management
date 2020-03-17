// Navigations
import VehicleList from '~/components/library/vehicle/VehicleListComponent';
import PartyTypeList from '~/components/library/party-type/PartyTypeListComponent';
import NatureList from '~/components/library/nature/NatureListComponent';


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

]
