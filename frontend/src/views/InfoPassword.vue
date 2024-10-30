<template>


  
  <div class="p-4">
    <form>
      
  
      <div class="input-group input-group-static mb-4">
        <label>Current Password</label>
        <input type="text" class="form-control">
      </div>
  
      <div class="input-group input-group-static mb-4">
        <label>New Password</label>
        <input type="text" class="form-control">
      </div>
      <div class="input-group input-group-static mb-4">
        <label>Confirm Password</label>
        <input type="text" class="form-control">
      </div>
      
      <div class="button-row d-flex justify-content-end mt-4">
    <material-button class="btn btm-sm btn-dark">
      Update Password
    </material-button>
  </div>
  
  
    </form>
  </div>
    
  </template>
  
  <script>
  
  
  
  
  
  
  
  export default {
    name: "InfoPassword",
    components: {
    
    },
    data() {
      return {
        user: {},
        
      }
    },
    
    
    
  };
  </script>
  