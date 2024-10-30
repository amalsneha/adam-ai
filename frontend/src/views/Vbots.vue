<template>
    <div class="py-4 container-fluid">
      
      <div class="mt-4 row">
        
        <div class="col-12">
          <div class="card">
            
            <!-- Card header -->
            <div class="card-header">
              <div class="card-header border-bottom">
              <div class="user d-flex align-items-center">
                <div class="col-6">
                  <h5 class="mb-0">PHONEBOTS</h5>
                </div>
                <div class="col-6 text-end">
                  <router-link to="/addvbot"> <material-button class="float-right btn btm-sm btn-success">
                    <i class="fas fa-user-plus me-2"></i>
                    Add VBOT
                  </material-button></router-link>
                </div>
              </div>
            </div>
            </div>
            
            <div class="table-responsive">
              <table id="datatable-search" class="table table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>Phonebot</th>
                    <th>License/UserKey</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-sm font-weight-normal">Tiger Nixon</td>
                    <td class="text-sm font-weight-normal">System Architect</td>
                    <td class="text-sm font-weight-normal"><span class="status-running ">Running</span></td>
                    <td class="text-sm font-weight-normal">
                      <button class="btn btn-sm btn-info me-2" @click="editItem(1)"> <i class="fas fa-pen"></i></button>
                      <button class="btn btn-sm btn-danger" @click="deleteItem(1)"> <i class="fas fa-trash"></i></button>
  </td>
                    
                  </tr>
                  <tr>
                    <td class="text-sm font-weight-normal">Tiger Nixon</td>
                    <td class="text-sm font-weight-normal">System Architect</td>
                    <td class="text-sm font-weight-normal"><span class="status-connected ">Connected</span></td>
                    <td class="text-sm font-weight-normal">
                      <button class="btn btn-sm btn-info me-2" @click="editItem(1)"> <i class="fas fa-pen"></i></button>
                      <button class="btn btn-sm btn-danger" @click="deleteItem(1)"> <i class="fas fa-trash"></i></button>
  </td>
                    
                  </tr>
                  <tr>
                    <td class="text-sm font-weight-normal">Tiger Nixon</td>
                    <td class="text-sm font-weight-normal">System Architect</td>
                    <td class="text-sm font-weight-normal"><span class="status-paused ">Paused</span></td>
                    <td class="text-sm font-weight-normal">
                      <button class="btn btn-sm btn-info me-2" @click="editItem(1)"> <i class="fas fa-pen"></i></button>
                      <button class="btn btn-sm btn-danger" @click="deleteItem(1)"> <i class="fas fa-trash"></i></button>
  </td>
                    
                  </tr>
                  
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
 
  
  export default {
    name: "Vbots",
   
  };
  </script>
  <style scoped>
  .status-running {
    background-color: #d4edda; /* Light green for Running */
  }
  
  .status-connected {
    background-color: #cce5ff; /* Light blue for Connected */
  }
  
  .status-paused {
    background-color: #fff3cd; /* Light yellow for Paused */
  }
  </style>