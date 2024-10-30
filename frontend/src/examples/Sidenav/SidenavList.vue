<template>
  <div class="w-auto h-auto collapse navbar-collapse max-height-vh-100 h-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <router-link to="/dashboard" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">dashboard</i>
          Dashboard
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/companyprofile" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">person</i>
          Company Profile
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/users1" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">people</i>
          Users
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/vbots" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">dashboard</i>
          VBOTS
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/calls" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">table_view</i>
          Calls Dashboard
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/changepassword" class="nav-link" exact-active-class="active">
          <i class="material-icons-round opacity-10 fs-5">login</i>
          Change Password
        </router-link>
      </li>
      <li class="nav-item">
        <router-link to="/logout" class="nav-link" @click="logout">
          <i class="material-icons-round opacity-10 fs-5">logout</i>
          Logout
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "SidenavList",
  methods: {
    logout() {
      this.$store.dispatch("auth/logout");
    }
  }
};
</script>

<style>
.active {
  background-color: #f0f0f0; /* Change this to your desired highlight color */
  color: #000; /* Change this to your desired text color */
}
</style>
