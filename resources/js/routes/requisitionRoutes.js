// Authenticated
import ExportCreate from '~/components/requisitions/exports/ExportCreateComponent';
import ExportList from '~/components/requisitions/exports/ExportListComponent';
import ExportUpdate from '~/components/requisitions/exports/ExportUpdateComponent';

import ImportCreate from '~/components/requisitions/imports/ImportCreateComponent';
import ImportList from '~/components/requisitions/imports/ImportListComponent';
import ImportUpdate from '~/components/requisitions/imports/ImportUpdateComponent';

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
        path: '/exports/:id', component: ExportUpdate,
        name: 'ExportUpdate',
        meta: {
            requireAuth: true, title: 'Export Update - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Export Update page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Export Update page of our app.'
                }
            ]
        }
    },
    {
        path: '/imports', component: ImportList,
        name: 'ImportList',
        meta: {
            requireAuth: true, title: 'Import List - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The import List page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The import List page of our app.'
                }
            ]
        }
    },
    {
        path: '/imports/create', component: ImportCreate,
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
    {
        path: '/imports/:id', component: ImportUpdate,
        name: 'ImportUpdate',
        meta: {
            requireAuth: true, title: 'Import Update - App',
            metaTags: [
                {
                    name: 'description',
                    content: 'The Import Update page of our app.'
                }, {
                    property: 'og:description',
                    content: 'The Import Update page of our app.'
                }
            ]
        }
    },

];

export default index;
