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
              <p class="ms-3 text-white text-center"><b>UPDATE COMPANY PROFILE</b></p>
              <div v-if="profileData" class="row">
      <div class="col-md-6">
      <p class="ms-3 text-white" style="font-size: small;"> 
      <strong>Email:</strong> {{ profileData.email }}<br>{{ profileData.company_name }} <br>{{ profileData.address }}<br>{{ profileData.pin }}
  {{ profileData.city }}<br>{{ profileData.phone }}
    </p>
    </div>
    <div class="col-md-6">
      <p class="ms-3 text-white" style="font-size: small;"> {{ profileData.bank }} <br>
      {{ profileData.iban }}<br>{{ profileData.bic }}
    </p>
    </div>
    
    </div>

    <!-- Display a loader if the profile data is being fetched -->
    <div v-else>
      Loading profile...
    </div>

          </div>
        </div>
                  <div class="card-body">
                    
  <div>
    <!-- Check if profileData is available -->
    
    <div class="p-4">
      <Form role="form" :validation-schema="schema" @submit="handleUpdate">
        <div class="row">
          <div class="col-md-6">
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
      </div>
        <div class="col-md-6">
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
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
      </div>
      <div class="col-md-6">
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
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
      </div>
      <div class="col-md-6">
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>Phone Number</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.phone" 
            name="phone"
            id="phone"
          />
          <ErrorMessage name="phone" class="text-danger" />
        </div>
      </div>
      <div class="col-md-6">
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
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
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
      </div>
      <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>BIC</label>
          <Field
            type="text"
            class="form-control"
            v-model="profileData.bic" 
            name="bic"
            id="bic"
          />
          <ErrorMessage name="bic" class="text-danger" />
        </div>
      </div>
    </div>
        <div class="button-row d-flex justify-content-end mt-4">
          <button class="btn btn-sm btn-dark">
           Update
          </button>
        </div>
      </Form>
    </div>
  </div>

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
  import profileService from "@/services/profile.service";
  import { Form, Field, ErrorMessage } from "vee-validate"; // Import necessary components
  import * as Yup from 'yup';
  import showSwal from "@/mixins/showSwal";
  
  export default {
    name: "CompanyProfile",
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
          bank: Yup.string().required("Bank name is a required input"),
          iban: Yup.string().required("IBAN is a required input"),
          phone: Yup.string().required("Phone number is a required input"),
          bic: Yup.string().required("BIC is a required input"),
  
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
              message: "Successfully Updated",
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
  

  