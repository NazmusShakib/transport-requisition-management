import axios from 'axios';

export default {
    index() {
        return axios.get('utilities/pay-modes').then(response => {
            return response.data;
        })
    }
}
