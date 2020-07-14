import axios from 'axios';

export default {
    index(currentPage = null, query = null, is_paginate = true) {
        return axios.get('suppliers', {
            params:  {
                page: currentPage,
                search: query,
                pagination: is_paginate,
            }
        }).then(response => {
            return response.data;
        })
    },

    store(payload) {
        return axios.post('suppliers', payload);

    },

    show(id) {
        //
    },

    update(id) {
        //
    },

    destroy(id) {
        return axios.delete('suppliers/' + id);
    }

}
