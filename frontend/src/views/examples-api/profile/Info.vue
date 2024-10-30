<template>
  <div class="multisteps-form__panel border-radius-xl bg-white" data-animation="FadeIn">
    <h5 class="font-weight-bolder mb-0">About me</h5>
    <div class="multisteps-form__content">

      <div class="row mt-4 overflow-hidden">
        <div>
          <material-avatar :img="getImage" shadow="regular" class="img-fluid w-20 mt-7" :fixedSize="true">
          </material-avatar>
        </div>
        <div class="mt-1  mb-2">
          <material-button v-show="!file" size="sm" type="button">
            <label for="imageInput" class="mb-0 text-white small cursor-pointer">Select Image</label>
            <input id="imageInput" type="file" style="display: none;" accept="image/*" @change.prevent="onFileChange">
          </material-button>

          <div v-show="file">
            <material-button class="mx-2" size="sm" type="button" color="danger" @click.prevent="onFileRemove">
              <label class="mb-0 text-white small cursor-pointer"> &#10005; Remove</label>
            </material-button>
            <material-button size="sm" type="button">
              <label for="imageInput" class="mb-0 text-white small cursor-pointer">Change</label>
              <input id="imageInput" type="file" style="display: none;" accept="image/*" @change.prevent="onFileChange">
            </material-button>
          </div>

        </div>
      </div>


      <div class="row mt-5">

        <material-input id="name" label="Name" variant="static" v-model:value="user.name" name="name" />
        <validation-error :errors="apiValidationErrors.name" />

      </div>

      <div class="row mt-5">
        <material-input id="email" type="email" label="Email Address" variant="static" v-model:value="user.email"
          name="email" />

        <validation-error :errors="apiValidationErrors.email" />
      </div>

      <div class="button-row d-flex mt-4">
        <material-button type="button" color="dark" variant="gradient" class="ms-auto mb-0 js-btn-next"
          @click="handleSubmit">Submit Changes</material-button>
      </div>
    </div>
  </div>
</template>
  
<script>
import MaterialInput from "@/components/MaterialInput.vue";
import MaterialButton from "@/components/MaterialButton.vue";
import MaterialAvatar from "@/components/MaterialAvatar.vue";
import ValidationError from "@/components/ValidationError.vue";



export default {
  name: "Info",
  components: {
    MaterialInput,
    MaterialButton,
    MaterialAvatar,
    ValidationError,
  },
  data() {
    return {
      user: {},
      file: null,
      imgSource: 'https://vue-material-dashboard-laravel-pro.creative-tim.com/img/placeholder.jpg',
      loading: null,
    }
  },

 
  
};
</script>
  
