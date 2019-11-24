import Vue from 'vue';


// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
// Init plugin
Vue.use(Loading,
    {
        // props
        color: 'red',
        canCancel: false, // default false
        loader: 'dots',
        width: 64,
        height: 64,
        backgroundColor: '#ffffff',
        opacity: 0.5,
        zIndex: 999,
    },{
        // slots
    });

export default {

}
