<template>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="multisteps-form mb-9">
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <div class="card">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
              <p class="ms-3 text-white text-center"><b>Add Users</b></p>
          </div>
        </div>
                  <div class="card-body">
                    <form>
                      <info :class="activeClass" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import Info from "./Info.vue";
  export default {
    name: "AddUser",
    components: {
      Info,
    },
    data() {
      return {
       
      };
    },
  };
  </script>

  