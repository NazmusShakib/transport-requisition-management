import axios from 'axios';

export default {
    index(currentPage = null, query = null, is_paginate = true) {
        return axios.get('library/companies', {
            params:  {
                page: currentPage,
                search: query,
                pagination: is_paginate,
            }
        }).then(response => {
            return response.data;
        })
    }
}
