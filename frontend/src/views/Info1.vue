<template>


<div class="text-end">
  <router-link to="/vbots"> <button class="float-right btn btm-sm btn-success">
    Back to list
  </button></router-link>
</div>
<div class="p-4">
  <form>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Bezeichnung</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">License_Key</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Status</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Product_Name</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_benutzername</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_passwd</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_registername</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_phonenumber</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_server</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sip_port</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">e_mail_server</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">e_mail_user</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">e_mail_passwd</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">e_mail_server_port</label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">e_mail_server_from</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">mail_certifikate_validation </label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Ansagetext</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Prompt </label>
        <textarea class="form-control"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">chatmodel</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">chatmodel_api </label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sttmodel</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">sttmodel_api </label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">ttsmodel</label>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">ttsmodel_api </label>
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Attended Transfer</label>
        <input type="text" class="form-control">
      </div>
    </div>
   
  </div>
  <div class="button-row d-flex justify-content-end mt-4">
  <material-button class="btn btm-sm btn-dark">
    Add Vbot
  </material-button>
</div>
</form>
</div>
  
</template>

<script>







export default {
  name: "Info1",
  components: {
  
  },
  data() {
    return {
      user: {},
      
    }
  },
  
  
  
};
</script>
