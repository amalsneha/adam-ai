<template>
  <!-- Navbar -->
  <nav
    class="top-0 navbar navbar-expand-lg position-absolute z-index-3"
    :class="isBlur ? isBlur : 'shadow-none my-2 navbar-transparent w-100'"
  >
    <div class="container px-0">
      <router-link
        class="navbar-brand font-weight-bolder ms-lg-0 ms-3"
        to="/dashboard"
        v-bind="$attrs"
        :class="isBlur ? 'text-dark' : 'text-white'"
      >
        ADAM AI
      </router-link>
      <button
        class="navbar-toggler shadow-none ms-2"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navigation"
        aria-controls="navigation"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div
  id="navigation"
  class="pt-3 pb-2 collapse navbar-collapse w-100 py-lg-0 d-flex justify-content-end" 
>
  <ul class="navbar-nav d-lg-block d-none">
    <li class="nav-item">
      <router-link to="Signup" class="mb-0 btn btn-sm me-1" :class="btnBackground"> 
        REGISTER 
      </router-link>
    </li>
  </ul>
  <ul class="navbar-nav d-lg-block d-none">
    <li class="nav-item">
      <router-link to="Login" class="mb-0 btn btn-sm me-1" :class="btnBackground"> 
        LOGIN 
      </router-link>
    </li>
  </ul>
</div>
    </div>
  </nav>
  <!-- End Navbar -->
</template>

<script>
import downArrWhite from "@/assets/img/down-arrow-white.svg";
import downArrBlack from "@/assets/img/down-arrow-dark.svg";

export default {
  name: "navbar",
  data() {
    return {
      downArrWhite,
      downArrBlack,
    };
  },
  props: {
    btnBackground: String,
    isBlur: String,
    darkMode: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    darkModes() {
      return {
        "text-dark": this.darkMode,
      };
    },
  },
};
</script>
