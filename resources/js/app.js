import './bootstrap';
// dar uma olhada aqui depois

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';

const routes = [
    { path: '/', component: () => import('./pages/Dashboard.vue') },
    { path: '/produtos', component: () => import('./pages/Produtos.vue') }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App);
app.use(router);
app.mount('#app');
