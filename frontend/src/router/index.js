import { createRouter, createWebHistory } from "vue-router";
import Dashboard from "../views/Dashboard.vue";
import Tables from "../views/Tables.vue";
import Billing from "../views/Billing.vue";
import RTL from "../views/Rtl.vue";
import Notifications from "../views/Notifications.vue";
import Profile from "../views/Profile.vue";
import SignIn from "../views/SignIn.vue";
import SignUp from "../views/SignUp.vue";
import Login from "../views/examples-api/Login.vue";
import Signup from "../views/examples-api/Signup.vue";
import PasswordForgot from "../views/examples-api/PasswordForgot.vue";
import PasswordReset from "../views/examples-api/PasswordReset.vue";
import UserProfile from "../views/examples-api/profile/UserProfile.vue";
import Users from "../views/examples-api/users/UsersList.vue";
import Users1 from "../views/Users1.vue";
import AddUser from "../views/AddUser.vue";
import Vbots from "../views/Vbots.vue";
import Calls from "../views/Calls.vue";
import AddVbot from "../views/AddVbot.vue";
import CompanyProfile from "../views/CompanyProfile.vue";
import ChangePassword from "../views/ChangePassword.vue";
import EditUser from "../views/EditUser.vue";
import store from "@/store";
const routes = [
  {
    path: "/",
    name: "/",
    redirect: "/login",
  },
  {
    path: "/users1",
    name: "users1",
    component: Users1,
  },
  {
    path: "/addusers",
    name: "addusers",
    component: AddUser,
  },
  {
    path: '/edituser/:id',
    name: 'EditUser',
    component: EditUser,
   
  },
  {
    path: "/vbots",
    name: "vbots",
    component: Vbots,
  },{
    path: "/calls",
    name: "calls",
    component: Calls,
  },
  {
    path: "/addvbot",
    name: "addvbot",
    component: AddVbot,
  },
  {
    path: "/companyprofile",
    name: "companyprofile",
    component: CompanyProfile,
  },
  {
    path: "/changepassword",
    name: "changepassword",
    component: ChangePassword,
  },
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
    meta: {
      authRequired: true,
     
    }
  },
  {
    path: "/tables",
    name: "Tables",
    component: Tables,
  },
  {
    path: "/billing",
    name: "Billing",
    component: Billing,
  },
  {
    path: "/rtl-page",
    name: "RTL",
    component: RTL,
  },
  {
    path: "/notifications",
    name: "Notifications",
    component: Notifications,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/sign-in",
    name: "SignIn",
    component: SignIn,
  },
  {
    path: "/sign-up",
    name: "SignUp",
    component: SignUp,
  },
  {
    path: "/login",
    name: "Login",
    component: Login
  },
  {
    path: "/signup",
    name: "Signup",
    component: Signup
  },
  {
    path: "/password-forgot",
    name: "Password Forgot",
    component: PasswordForgot
  },
  {
    path: "/password-reset",
    name: "Password Reset",
    component: PasswordReset
  },
  {
    path: "/user-profile",
    name: "User Profile",
    component: UserProfile
  },
  {
    path: '/users',
    name: "Users",
    component: Users
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: "active",
});

//eslint-disable-next-line no-unused-vars
router.beforeEach(async (to, from, next) => {

  const { authRequired, permission } = to.meta;

  const isLoggedIn = store.getters['auth/isLoggedIn'];

  if (authRequired) {

    //if trying to access a page that requires authentication but not logged in, redirect to login page
    if (!isLoggedIn) {
      return next({ name: 'Login', query: { returnUrl: to.path } });
    }


    //if trying to access a page that requires permission, redirect to dashboard
    if (permission) {
      try {
        await store.dispatch('profile/getProfile')
        const userPermission = (store.getters['profile/getUserProfile']).roles[0].name;
        if (!permission.includes(userPermission)) {
          return next({ name: 'Default', query: { returnUrl: to.path } });
        }
      }catch(error){
        try{
          store.dispatch('auth/logout');
        }finally{
          // eslint-disable-next-line no-unsafe-finally
          return next({name: "Login"});
        }
      }
    }

  }
  next();
})

export default router;

