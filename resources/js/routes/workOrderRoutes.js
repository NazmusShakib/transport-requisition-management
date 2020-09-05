// Authenticated
const WorkOrderList = () => import(/* webpackChunkName: "WorkOrderListComponent" */ '~/components/work_order/WorkOrderListComponent');
const WorkOrderForm = () => import(/* webpackChunkName: "WorkOrderFormComponent" */ '~/components/work_order/WorkOrderFormComponent');

const index = [
    {
        path: '/work-orders',
        component: WorkOrderList,
        name: 'WorkOrderList',
        meta: {
            requireAuth: true,
            title: 'Work orders - App',
            metaTags: [{
                name: 'description',
                content: 'The work order list page of our app.'
            }, {
                property: 'og:description',
                content: 'The work order list page of our app.'
            }]
        }
    },
    {
        path: '/work-orders/create',
        component: WorkOrderForm,
        name: 'WorkOrderForm',
        meta: {
            requireAuth: true,
            title: 'Work order form - App',
            metaTags: [{
                name: 'description',
                content: 'The work order form page of our app.'
            }, {
                property: 'og:description',
                content: 'The work order form page of our app.'
            }]
        }
    },
];

export default index;
