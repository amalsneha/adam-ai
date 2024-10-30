<template>

<div class="p-4">
  <Form role="form" :validation-schema="schema" @submit="handleUpdate">
        <div class="row">
          <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
          <label>Username</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.company_name"
            name="company_name"
            id="company_name"
          />
          <ErrorMessage name="company_name" class="text-danger" />
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
          <label>Name</label>
          <Field
            type="text"
            class="form-control"
            v-model="user.name"
            name="name"
            id="name"
          />
          <ErrorMessage name="name" class="text-danger" />
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-group input-group-static mb-4">
  <label>Role</label>
  <Field as="select" class="form-control" v-model="user.role" name="role" id="role">
  <option value="" disabled>Select Role</option>
  <option value="user">User</option>
  <option value="admin">Admin</option>
</Field>
  <ErrorMessage name="role" class="text-danger" />
</div>

      </div>
    </div>

    <Field
            type="hidden"
            class="form-control"
            v-model="user.id"
            name="id"
            id="id"
          />
   

        <div class="button-row d-flex justify-content-end mt-4">
          <button class="btn btn-sm btn-dark">
           Add User
          </button>
        </div>
      </Form>
</div>
  
</template>
<script>
import userService from "@/services/users.service";
import { Form, Field, ErrorMessage } from "vee-validate"; // Import necessary components
import * as Yup from 'yup';
import showSwal from "@/mixins/showSwal";

export default {
  name: "Info2",
  
  components: {
    Form,
    Field,
    ErrorMessage // Register ErrorMessage component
  },
  data() {
    return {
      user: {},
      schema: Yup.object().shape({
        company_name: Yup.string().required("Username is a required input"),
        email: Yup.string().email("Email has to be a valid email address").required("Email is a required input"),
        name: Yup.string().required("Name is a required input"),
        role: Yup.string().required("Role is a required input"),


      }),
    };
  },
  methods: {
    async handleUpdate() {
      
      try {
       
          await this.$store.dispatch('users/updateUser',this.user);
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
  async mounted() {
    const userId = this.$route.params.id;
    
      try {
        const users = await userService.getUserById(userId);
        
      
        this.user = users;
        
      } catch (error) {
        console.error("Error fetching profile data:", error);
      }
    }
 
};
</script>
