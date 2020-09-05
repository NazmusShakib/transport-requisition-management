import axios from 'axios';

export default {
    index(currentPage = null, query = null, is_paginate = true) {
        return axios.get('purchase-requisitions', {
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
        return axios.post('purchase-requisitions', payload);
    },

    show(id) {
        return axios.get('purchase-requisitions/' + id).then(response => {
            return response.data;
        })
    },

    update(id) {
        //
    },

    destroy(id) {
        return axios.delete('purchase-requisitions/' + id);
    }

}
