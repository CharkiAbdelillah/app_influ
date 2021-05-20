import Vue from 'vue'
import VueRouter from 'vue-router'

import userDetails from '../components/user/userDetails.vue';
import homeUser from '../components/user/home.vue';
import instagram from '../components/user/instagram.vue';
import youtube from '../components/user/youtube.vue';
import facebook from '../components/user/facebook.vue';
import snapchat from '../components/user/snapchat.vue';
Vue.use(VueRouter)

const routes=[
    {
        path:'/user/home2',
        component:homeUser,
        name:'homeuser'
    },
    {
        props: true,
        path:'/user/details',
        component:userDetails,
        name:'UserDetails'
    },
    {
        props: true,
        path:'/user/instagram',
        component:instagram,
        name:'Instagram'
    },
    {
        props: true,
        path:'/user/youtube',
        component:youtube,
        name:'Youtube'
    },
    {
        props: true,
        path:'/user/facebook',
        component:facebook,
        name:'Facebook'
    },
    {
        props: true,
        path:'/user/snapchat',
        component:snapchat,
        name:'Snapchat'
    },
];
const router=new VueRouter({
    routes,
    hashbang:false,
    mode:'history'
})
export default router;