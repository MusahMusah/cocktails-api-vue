import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home';
import Login from './components/auth/Login';
import Logout from './components/auth/Logout';
import Dashboard from './components/Dashboard';
import AllCocktails from './components/cocktails/AllCocktails';
import CreateCocktail from './components/cocktails/CreateCocktail';
import Ingredients from './components/ingredients/Ingredients';
import Test from './components/ingredients/Test';
import Users from './components/users/Users';
import CreateIngredient from './components/ingredients/CreateIngredient';
import EditIngredient from './components/ingredients/EditIngredient';
import Settings from './components/pump/Settings';
import UpdateSettings from './components/pump/UpdateSettings';
import CocktailOrderStat from './components/stats/CocktailOrderStats';
import orderCocktail from './components/cocktails/OrderCocktail.vue';

Vue.use(VueRouter);

export const routes =
[
    {
        path : '/',
        component: Home,
        name: 'home',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/all-cocktails',
        component: AllCocktails,
        name: 'all-cocktails',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/order-cocktails',
        component: orderCocktail,
        name: 'order-cocktails',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/ingredients',
        component: Ingredients,
        name: 'ingredients',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/create-ingredient',
        component: CreateIngredient,
        name: 'create-ingredient',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/create-cocktail',
        component: CreateCocktail,
        name: 'create-cocktail',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/users',
        component: Users,
        name: 'users',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/stats',
        component: CocktailOrderStat,
        name: 'stats',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/users',
        component: Users,
        name: 'users',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/edit-ingredient',
        component: EditIngredient,
        name: 'edit-ingredient',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/pump-settings',
        component: Settings,
        name: 'pump-settings',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/update-settings',
        component: UpdateSettings,
        name: 'update-settings',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/test',
        component: Test,
        name: 'test',
        meta: {
            requiresAuth : true
        }
    },
    {
        path : '/logout',
        component: Logout,
        name: 'logout',
        meta: {
            requiresAuth : true
        }
    },

    // Routes Without Authentications
    {
        path : '/login',
        component: Login,
        name: 'login',
        meta: {
            requiresVisitor : true
        }
    },
]
