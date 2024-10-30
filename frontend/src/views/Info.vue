<template>


<div class="text-end">
  <router-link to="/users1"> <button class="float-right btn btm-sm btn-success">
    Back to list
  </button></router-link>
</div>
<div class="p-4">
  <Form role="form" :validation-schema="schema" @submit="handleAdd">
        <div class="row">
          <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>Username</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.uname"
            name="uname"
            id="uname"
          />
          <ErrorMessage name="uname" class="text-danger" />
        </div>
      </div>
        <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>Email</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.email"
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
          <label>First Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.fname"
            name="fname"
            id="fname"
          />
          <ErrorMessage name="fname" class="text-danger" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>Last Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.lname" 
            name="lname"
            id="lname"
          />
          <ErrorMessage name="lname" class="text-danger" />
        </div>
      </div>
    </div>

   
   

        <div class="button-row d-flex justify-content-end mt-4">
          <button class="btn btn-sm btn-dark">
           Add User
          </button>
        </div>
      </Form>
</div>
  
</template>
<script>

import { Form, Field, ErrorMessage } from "vee-validate"; // Import necessary components
import * as Yup from 'yup';
import showSwal from "@/mixins/showSwal";

export default {
  name: "Info",
  components: {
    Form,
    Field,
    ErrorMessage // Register ErrorMessage component
  },
  data() {
    return {
      user: {},
      schema: Yup.object().shape({
        uname: Yup.string().required("Username is a required input"),
        email: Yup.string().email("Email has to be a valid email address").required("Email is a required input"),
        fname: Yup.string().required("First name is a required input"),
        lname: Yup.string().required("Last Name is a required input"),


      }),
    };
  },
  methods: {
    async handleAdd() {
      
      try {
       
          await this.$store.dispatch('users/addUsers', this.user);
            showSwal.methods.showSwal({
            type: "success",
            message: "User Created Successfully",
            width: 500,
            timer: 160000, // 1 minute
            showConfirmButton: true
        });
        this.$router.push({ name: 'users1' })
 
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
 
};
</script>
