<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-5">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">
                                   <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                   </div>
                                   <div class="card-body">
                                        <div class="small mb-3 text-muted">Enter your email address and we will send you a
                                             link to reset your password.</div>
                                        <form>
                                             <div class="form-floating mb-3">
                                                  <input name="email" class="form-control" id="inputEmail" type="email"
                                                       placeholder="name@example.com" />
                                                  <label for="inputEmail">Email address</label>
                                             </div>
                                             <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                  <router-link to="/"> return login </router-link>

                                                  <button type="submit" class="btn btn-primary"> Reset Password</button>
                                             </div>
                                        </form>
                                   </div>
                                   <div class="card-footer text-center py-3">
                                        <div class="small"> <router-link to="/register"> return login </router-link></div>
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
                    email: ''
               

               },
               errors: {

               }

          }
     },
     // dataEnd
     methods: {
          forgot() {
               axios.post('/api/auth/forgot', this.form)
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
        

          }
     }
     // methodsEnd
}

</script>
 
