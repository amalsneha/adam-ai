<template>
    <navbar btn-background="bg-gradient-success" />

    <main class="mt-0 main-content">
        <div class="page-header align-items-start min-vh-50 m-3 border-radius-lg" style="
        background-image: url('https://images.unsplash.com/photo-1497996541515-6549b145cd90?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80');
      ">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <section>
            <div class="container mb-4">
                <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card mt-8">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div
                                    class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1 text-center py-4">
                                    <h3 class="font-weight-bolder text-white">Login</h3>
                                    
                                </div>
                            </div>
                            <div class="py-4 card-body">
                                <Form role="form" :validation-schema="schema" @submit="handleLogin">
                                    <div class="mb-3">
                                        <material-input-field id="email" v-model:value="user.email" type="email" label="Email"
                                        name="email" variant="static"/>
                                    </div>
                                    <div class="mb-3">
                                        <material-input-field id="password" v-model:value="user.password" type="password"
                                    label="Password" name="password" variant="static"/>
                                    </div>
                                    <div class="text-center">
                                        <material-button class="mt-4" variant="gradient" color="success"
                                            full-width>Login</material-button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                    <router-link :to="{ name: 'Signup' }"
                                        class="text-success text-gradient font-weight-bold">Sign
                                        up</router-link>
                                </p>
                                <p class="text-sm text-center">
                                    <router-link :to="{ name: 'Password Forgot' }"
                                        class="text-success text-gradient font-weight-bold">Recover
                                        Password</router-link>
                                </p>
                                </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <app-footer />
</template>

<script>
import Navbar from "@/examples/PageLayout/Navbar.vue";
import AppFooter from "@/examples/PageLayout/Footer.vue";
import MaterialInputField from "@/components/MaterialInputField.vue";
import MaterialButton from "@/components/MaterialButton.vue";
import showSwal from "@/mixins/showSwal";
const body = document.getElementsByTagName("body")[0];
import { mapMutations } from "vuex";

import { Form } from "vee-validate";
import * as Yup from 'yup'

export default {
    name: "PasswordForgot",
    components: {
        Navbar,
        AppFooter,
        MaterialInputField,
        MaterialButton,
        Form
    },
    data() {
        return {
            user: {email: "admin@jsonapi.com", password: "secret"},
            schema: Yup.object().shape({
                email: Yup.string().email("Email has to be a valid email address").required("Email is a required input"),
                password: Yup.string().required("Password is a required input")
            }),
        };
    },
    computed: {
        loggedIn() {
            return this.$store.state.auth.loggedIn;
        }
    },
    beforeMount() {
        this.toggleEveryDisplay();
        this.toggleHideConfig();
        body.classList.remove("bg-gray-100");
    },
    beforeUnmount() {
        this.toggleEveryDisplay();
        this.toggleHideConfig();
        body.classList.add("bg-gray-100");
    },
    methods: {
    ...mapMutations(["toggleEveryDisplay", "toggleHideConfig"]),
    async handleLogin() {
      try {
        await this.$store.dispatch("auth/login", this.user);
        this.$router.push({ name: "Dashboard" });
      } catch (error) {
        showSwal.methods.showSwal({
          type: "error",
          message: "Invalid credentials!",
          width: 500,
        });
      }
    },
  },
};
</script>
