<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">
                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        <a href="" class="" style="font-weight:bold; font-size: 18px;"> Dashboard</a> /
                                        <span>
                                             Add expense </span>
                                        <router-link to="/expense" class="btn btn-sm btn-primary" id="add_new">
                                             expense List</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="ExpenseInsert" enctype="multipart/form-data">
                                             <div class="row">
                                                  <div class="col-12">
                                                       <label for="Idname">Write details</label>
                                                       <div class="form-floating mb-3">
                                                            <textarea v-model="form.details" name="" id="" cols="137"
                                                                 rows="5"></textarea>
                                                            <small class="text-danger" v-if="errors.details">{{
                                                                 errors.details[0]
                                                            }}</small>

                                                       </div>
                                                  </div>
                                                  <div class="col-12">
                                                       <div class="form-floating mb-3">
                                                            <input class="form-control" id="Idname" type="text"
                                                                 placeholder="Slug Name" v-model="form.amount" />
                                                            <small class="text-danger" v-if="errors.amount">{{
                                                                 errors.amount[0]
                                                            }}</small>
                                                            <label for="Idname">Amout</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                  <button type="submit" class="btn btn-primary"> Submit</button>
                                             </div>
                                        </form>
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
          if (!User.loggedIn()) {
               this.$router.push({ name: 'home' })
          }
     },

     data() {
          return {
               form: {
                    details: '',
                    amount: '',


               },
               errors: {

               }

          }
     },
     // dataEnd
     methods: {

          ExpenseInsert() {
               axios.post('/api/expense/', this.form)
                    .then(() => {
                         this.$router.push({ name: 'expense' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "expense added successfully"
                         });
                    })

                    .catch(error => this.errors = error.response.data.errors)
          }

     }
     // methodsEnd
}

</script>

<style>
#add_new {
     float: right;
}
</style>
 
