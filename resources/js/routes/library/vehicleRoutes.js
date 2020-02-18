// Authenticated
import VehicleList from '~/components/library/vehicle/VehicleListComponent';

const index = [{
    path: '/vehicles',
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
}];

export default index;
