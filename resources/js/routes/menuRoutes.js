// Register
import Register from '../components/auth/Register';
import Login from '../components/auth/Login';

// Authenticated
import Dashboard from '../components/Dashboard';
import Blank from '../components/BlankComponent';


const index = [
    {
        path: '/login',
        component: Login,
        name: 'Login',
        meta: {title: 'Login Page- Example App', guest: true}
    },
    {
        path: '/register', component: Register,
        name: 'Register',
        meta: {title: 'Register Page- Example App', guest: true}
    },
    {
        path: '/dashboard', component: Dashboard,
        name: 'Dashboard',
        meta: {title: 'Dashboard Page- Example App', guest: true}
    },
    {
        path: '/blank', component: Blank,
        name: 'Blank',
        meta: {title: 'Blank Page- Example App', guest: true}
    },
    {
        path: '*',
        component: require('../components/errors/404'),
        name: '404',
        meta: {title: 'Not Found - Example App'}
    }
];

export default index;
