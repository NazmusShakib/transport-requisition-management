// Authenticated
import SupplierList from '~/components/library/supplier/SupplierListComponent';
import SupplierForm from '~/components/library/supplier/SupplierFormComponent';

const index = [
    {
        path: '/library/suppliers',
        component: SupplierList,
        name: 'SupplierList',
        meta: {
            requireAuth: true,
            title: 'Supplier List - App',
            metaTags: [{
                name: 'description',
                content: 'The supplier list page of our app.'
            }, {
                property: 'og:description',
                content: 'The supplier list page of our app.'
            }]
        }
    },
    {
        path: '/library/suppliers/create',
        component: SupplierForm,
        name: 'SupplierForm',
        meta: {
            requireAuth: true,
            title: 'Supplier form - App',
            metaTags: [{
                name: 'description',
                content: 'The supplier form page of our app.'
            }, {
                property: 'og:description',
                content: 'The supplier form page of our app.'
            }]
        }
    },
];

export default index;
