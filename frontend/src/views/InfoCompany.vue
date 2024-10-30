<template>
  <div>
    <!-- Check if profileData is available -->
    
    <div class="p-4">
      <Form role="form" :validation-schema="schema" @submit="handleUpdate">
       
        <div class="input-group input-group-static mb-4">
          <label>Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.name"
            name="name"
            id="name"
          />
          <ErrorMessage name="name" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>Email</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.email"
            name="email"
            id="email"
          />
          <ErrorMessage name="email" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>Company Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.company_name"
            name="company_name"
            id="company_name"
          />
          <ErrorMessage name="company_name" class="text-danger" />
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Street Address</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.address" 
            name="address"
            id="address"
          />
          <ErrorMessage name="address" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>Pin Number</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.pin" 
            name="pin"
            id="pin"
          />
          <ErrorMessage name="pin" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>City</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.city" 
            name="city"
            id="city"
          />
          <ErrorMessage name="city" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>Phone Number</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.phone" 
            name="phone"
            id="phone"
          />
          <ErrorMessage name="city" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>Bank Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.bank" 
            name="bank"
            id="bank"
          />
          <ErrorMessage name="bank" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>IBAN</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.iban" 
            name="iban"
            id="iban"
          />
          <ErrorMessage name="iban" class="text-danger" />
        </div>
        <div class="input-group input-group-static mb-4">
          <label>BIC</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.bic" 
            name="bic"
            id="bic"
          />
          <ErrorMessage name="city" class="text-danger" />
        </div>

        <div class="button-row d-flex justify-content-end mt-4">
          <button class="btn btn-sm btn-dark">
           Update
          </button>
        </div>
      </Form>
    </div>
  </div>
</template>

<script>
import profileService from "@/services/profile.service";
import { Form, Field, ErrorMessage } from "vee-validate"; // Import necessary components
import * as Yup from 'yup';
import showSwal from "@/mixins/showSwal";

export default {
  name: "InfoCompany",
  components: {
    Form,
    Field,
    ErrorMessage // Register ErrorMessage component
  },
  data() {
    return {
      profileData: {},
      schema: Yup.object().shape({
        name: Yup.string().required("Name is a required input"),
        email: Yup.string().email("Email has to be a valid email address").required("Email is a required input"),
        company_name: Yup.string().required("Company name is a required input"),
        address: Yup.string().required("Address is a required input"),
        pin: Yup.string().required("Pin is a required input"),
        city: Yup.string().required("City is a required input"),
        phone: Yup.string().required("Phone number is a required input"),

      }),
    };
  },
  methods: {
    async handleUpdate() {
      try {
       console.log(this.profileData)
          await this.$store.dispatch('profile/editProfile', this.profileData);
            showSwal.methods.showSwal({
            type: "success",
            message: "Successfully registered!Please Verify your email address to login",
            width: 500,
            timer: 160000, // 1 minute
            showConfirmButton: true
        });
 
    } catch (error) {
        console.error('Signup error:', error); // Log the error
        showSwal.methods.showSwal({
            type: "error",
            message: "Email Already Exists!",
            width: 500
        });
    }
  }
  },
  async mounted() {
    try {
      const profile = await profileService.getProfile();
     
      this.profileData = profile;
    } catch (error) {
      console.error("Error fetching profile data:", error);
    }
  }
};
</script>
