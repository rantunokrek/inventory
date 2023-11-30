<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-5">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">
                                   <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="login">
                                             <div class="form-floating mb-3">
                                                  <input name="email" class="form-control" id="inputEmail" type="email"
                                                       placeholder="name@example.com" v-model="form.email" />
                                                  <small class="text-danger" v-if="errors.email">{{ errors.email[0]
                                                  }}</small>
                                                  <label for="inputEmail">Email address</label>
                                             </div>
                                             <div class="form-floating mb-3">
                                                  <input name="password" class="form-control" id="inputPassword"
                                                       type="password" placeholder="Password" v-model="form.password" />
                                                  <small class="text-danger" v-if="errors.password">{{ errors.password[0]
                                                  }}</small>
                                                  <label for="inputPassword">Password</label>
                                             </div>
                                             <div class="form-check mb-3">
                                                  <input name="remeberPass" class="form-check-input"
                                                       id="inputRememberPassword" type="checkbox" value=""
                                                       v-model="form.password_confirmation" />
                                                  <label class="form-check-label" for="inputRememberPassword">Remember
                                                       Password</label>
                                             </div>
                                             <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                  <router-link to="/forgot"> Forgot password </router-link>
                                                  <button type="submit" class="btn btn-primary"> Login</button>
                                             </div>
                                        </form>
                                   </div>
                                   <div class="card-footer text-center py-3">
                                        <div class="small"> <router-link to="/register"> Register </router-link></div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </main>
     </div>
</template>
 
 
<script>

export default {
     created() {
          if (User.loggedIn()) {
               this.$router.push({ name: 'home' })
          }
     },

     data() {
          return {
               form: {
                    email: '',
                    password: ''

               },
               errors: {

               }

          }
     },
     // dataEnd
     methods: {
          login() {
               axios.post('/api/auth/login', this.form)
                    .then(res => {
                         User.responseAfterLogin(res)
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "Login in successfully"
                         });
                         this.$router.push({ name: 'home' })
                    })
                    .catch(error => this.errors = error.response.data.errors)
               // .catch(
               //      Toast.fire({
               //           icon: "warning",
               //           type: 'warning',
               //           title: "Invalid Eamil or password"
               //      })
               // )

          }
     }
     // methodsEnd
}

</script>
 
