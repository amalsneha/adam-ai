<template>
  <div class="py-4 container-fluid">
    <div class="mt-4 row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">CALLS DASHBOARD</h5>
          </div>
          <!-- Basic DataTable (Optional, can be removed) -->
          

          <!-- Searchable DataTable -->
          <div class="table-responsive">
            <table id="datatable-search" class="table table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Phonebot</th>
                  <th>Caller #</th>
                  <th>Text</th>
                  <th>Status</th>
                  <th>Date/Time</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                  <td class="text-sm font-weight-normal">KI-Zentrale   </td>
                  <td class="text-sm font-weight-normal">0170-12345678</td>
                  <td class="text-sm font-weight-normal">Ich würde gerne Herrn Meier sprechen …</td>
                  <td class="text-sm font-weight-normal">transfer	 12	</td>
                  <td class="text-sm font-weight-normal">1.10.24 10:23        
                  </td>
                  <td class="text-sm font-weight-normal">
                   
                    <button class="btn btn-sm btn-danger" @click="deleteItem(1)"> <i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                <tr>
                  <td class="text-sm font-weight-normal">KI-Zentrale   </td>
                  <td class="text-sm font-weight-normal">0170-12345678</td>
                  <td class="text-sm font-weight-normal">Ich würde gerne Herrn Meier sprechen …</td>
                  <td class="text-sm font-weight-normal">transfer	 12	</td>
                  <td class="text-sm font-weight-normal">1.10.24 10:23        
                  </td>
                  <td class="text-sm font-weight-normal">
                   
                    <button class="btn btn-sm btn-danger" @click="deleteItem(1)"> <i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                
                
                <!-- Additional Rows Here -->
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
  name: "Calls",
  data() {
    return {
      
    };
  },
 
 
   
};
</script>
