// Authenticated
import ExportCreate from '~/components/requisitions/exports/ExportCreateComponent';
import ExportList from '~/components/requisitions/exports/ExportListComponent';
import ImportCreate from '~/components/requisitions/imports/ImportCreateComponent';

const index = [
    {
        path: '/exports', component: ExportList,
        name: 'ExportList',
        meta: {
            requireAuth: true, title: 'Export List - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Export List page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Export List page of our app.'
                }
            ]
        }
    },
    {
        path: '/exports/create', component: ExportCreate,
        name: 'ExportCreate',
        meta: {
            requireAuth: true, title: 'Export Create - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Export Create page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Export Create page of our app.'
                }
            ]
        }
    },
    {
        path: '/import/create', component: ImportCreate,
        name: 'ImportCreate',
        meta: {
            requireAuth: true, title: 'Import Create - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Import Create page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The                                                                                                                                                                                                        Export Create page of our app.'
                }
            ]
        }
    },

];

export default index;
