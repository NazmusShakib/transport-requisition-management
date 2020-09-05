// Authenticated
const WorkOrderList = () => import(/* webpackChunkName: "WorkOrderListComponent" */ '~/components/work_order/WorkOrderListComponent');
const WorkOrderForm = () => import(/* webpackChunkName: "WorkOrderFormComponent" */ '~/components/work_order/WorkOrderFormComponent');
const WorkOrderShow = () => import(/* webpackChunkName: "WorkOrderShowComponent" */ '~/components/work_order/WorkOrderShowComponent');

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
    {
        path: '/work-orders/:id/show',
        component: WorkOrderShow,
        name: 'WorkOrderShow',
        meta: {
            requireAuth: true,
            title: 'Work Order Show - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Work Order Show page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Work Order Show page of our app.'
                }
            ]
        }
    },
];

export default index;
