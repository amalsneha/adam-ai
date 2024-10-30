<template>
  <nav id="navbarBlur" class="shadow-none navbar navbar-main navbar-expand-lg border-radius-xl" v-bind="$attrs"
    data-scroll="true" :class="isAbsolute ? 'mt-4' : 'mt-4'">
    <div class="px-4 py-1 container-fluid">
      <breadcrumbs :current-page="currentRouteName" :color="color" />
      <div id="navbar" class="mt-2 collapse navbar-collapse mt-sm-0 me-md-0" :class="isRTL ? 'px-0' : 'me-sm-4'">
        <a href="#" class="p-0 nav-link text-body" @click.prevent="minNav">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line" :class="color ? 'bg-white' : ''"></i>
            <i class="sidenav-toggler-line" :class="color ? 'bg-white' : ''"></i>
            <i class="sidenav-toggler-line" :class="color ? 'bg-white' : ''"></i>
          </div>
        </a>
      </div>
      <div id="navbar" class="mt-2 collapse navbar-collapse mt-sm-0 me-md-0 me-sm-4" :class="isRTL ? 'px-0' : 'me-sm-4'">
        <div class="pe-md-3 d-flex align-items-center" :class="isRTL ? 'me-md-auto' : 'ms-md-auto'">
         
        </div>
        <ul class="navbar-nav d-flex justify-content-end">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center py-0" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false" :class="color">
              <i class="material-icons" :class="isRTL ? 'ms-sm-2' : 'me-sm-1'">account_circle</i>
            </a>

            <ul class="dropdown-menu"  style="transform: translateX(-6px) !important;">

              <!--Profile-->
              <li class="nav-item d-flex align-items-center">
                <router-link :to="{ name: 'Dashboard' }"
                  class="px-0 nav-link font-weight-bold lh-1 d-flex align-items-center">
                  <i class="material-icons ms-2" :class="isRTL ? 'ms-sm-2' : 'me-sm-1'">
                    account_circle
                  </i>
                  My Profile
                </router-link>
              </li>

              <hr class="m-0">

              <!--Logout-->
              <li class="nav-item d-flex align-items-center">
                <router-link :to="{ name: 'Login' }" 
                  class="px-0 nav-link font-weight-bold lh-1 d-flex align-items-center">
                  <i class="material-icons ms-2" :class="isRTL ? 'ms-sm-2' : 'me-sm-1'">
                    logout
                  </i>
                  Logout
                </router-link>
              </li>
            </ul>

          </li>

          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a id="iconNavbarSidenav" href="#" class="p-0 nav-link text-body lh-1" @click="toggleSidebar">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          
       
        </ul>
      </div>
    </div>
</nav>
</template>
<script>

import Breadcrumbs from "../Breadcrumbs.vue";
import { mapMutations, mapState } from "vuex";

export default {
  name: "navbar",
  data() {
    return {
      showMenu: false,
    };
  },
  props: ["minNav", "color"],
  created() {
    this.minNav;
  },
  methods: {
    ...mapMutations(["navbarMinimize", "toggleConfigurator"]),

    toggleSidebar() {
      this.navbarMinimize();
    },

    logout(){
      this.$store.dispatch("auth/logout");
    }
  },
  components: {
    Breadcrumbs,
    
  },
  computed: {
    ...mapState(["isRTL", "isAbsolute"]),

    currentRouteName() {
      return this.$route.name;
    },
  },
};
</script>
