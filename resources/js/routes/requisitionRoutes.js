// Authenticated
import ExportCreate from '~/components/requitions/exports/ExportCreateComponent';
import ImportCreate from '~/components/requitions/imports/ImportCreateComponent';

const index = [
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
