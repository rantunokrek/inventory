<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">

                                   <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Employee Upadte</li>
                                   </ol>
                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        Employee Insert
                                        <router-link to="/employee" class="btn btn-sm btn-primary" id="add_new"> All
                                             Employee</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="salaryPaid">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="name" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="full name" v-model="form.name" />
                                                            <small class="text-danger" v-if="errors.name">{{ errors.name[0]
                                                            }}</small>
                                                            <label for="inputEmail">Full Name</label>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="email" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="name@example.com"
                                                                 v-model="form.email" />
                                                            <small class="text-danger" v-if="errors.email">{{ errors.email[0]
                                                            }}</small>
                                                            <label for="inputEmail">Email address</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <label for="inputStated">Select Month</label>
                                                       <div class="form-floating mb-3">

                                                            <select id="inputState" class="datatable-selector form-control"
                                                                 v-model="form.salary_month">
                                                                 <option value="January"> January</option>
                                                                 <option value="Frebuary">Frebuary</option>
                                                                 <option value="March">March</option>
                                                                 <option value="April">April</option>
                                                                 <option value="May">May</option>
                                                                 <option value="Jun">Jun</option>
                                                                 <option value="July">July</option>
                                                                 <option value="Agust">August</option>
                                                                 <option value="September">September</option>
                                                                 <option value="October">October</option>
                                                                 <option value="Novenber">Novenber</option>
                                                                 <option value="December">December</option>


                                                                 <small class="text-danger" v-if="errors.salary_month">{{
                                                                      errors.salary_month[0]
                                                                 }}</small>
                                                            </select>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="salary" class="form-control" id="salary" type="text"
                                                                 placeholder="salary" v-model="form.salary" />
                                                            <small class="text-danger" v-if="errors.salary">{{
                                                                 errors.salary[0]
                                                            }}</small>
                                                            <label for="salary">Salary</label>
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


     data() {
          return {
               form: {
                    name: '',
                    email: '',
                    salary_month: '',
                    salary: '',


               },
               errors: {

               }

          }
     },
     // dataEnd
     created() {
          let id = this.$route.params.id
          axios.get('/api/employee/' + id)
               .then(({ data }) => (this.form = data))
               .catch(console.log('error'))
     },
     methods: {

          salaryPaid() {
               let id = this.$route.params.id
               axios.post('/api/salary/' + id, this.form)
                    .then(() => {
                         this.$router.push({ name: 'salary-store' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "updated  successfully"
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
 
