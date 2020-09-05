// Authenticated
const PurchaseRequisitionList = () => import(/* webpackChunkName: "PurchaseRequisitionListComponent" */ '~/components/purchase_requisition/PurchaseRequisitionListComponent');
const PurchaseRequisitionForm = () => import(/* webpackChunkName: "PurchaseRequisitionFormComponent" */ '~/components/purchase_requisition/PurchaseRequisitionFormComponent');
const PurchaseRequisitionShow = () => import(/* webpackChunkName: "PurchaseRequisitionShowComponent" */ '~/components/purchase_requisition/PurchaseRequisitionShowComponent');

const index = [
    {
        path: '/purchase-requisitions',
        component: PurchaseRequisitionList,
        name: 'PurchaseRequisitionList',
        meta: {
            requireAuth: true,
            title: 'Purchase requisition - App',
            metaTags: [{
                name: 'description',
                content: 'The purchase requisition list page of our app.'
            }, {
                property: 'og:description',
                content: 'The purchase requisition list page of our app.'
            }]
        }
    },
    {
        path: '/purchase-requisitions/create',
        component: PurchaseRequisitionForm,
        name: 'PurchaseRequisitionForm',
        meta: {
            requireAuth: true,
            title: 'Purchase requisition form - App',
            metaTags: [{
                name: 'description',
                content: 'The purchase requisition form page of our app.'
            }, {
                property: 'og:description',
                content: 'The purchase requisition form page of our app.'
            }]
        }
    },
    {
        path: '/purchase-requisitions/:id/show',
        component: PurchaseRequisitionShow,
        name: 'PurchaseRequisitionShow',
        meta: {
            requireAuth: true,
            title: 'Purchase Requisition Show - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Purchase Requisition Show page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Purchase Requisition Show page of our app.'
                }
            ]
        }
    },
];

export default index;
