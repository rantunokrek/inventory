<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">

                                   <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Employee</li>
                                   </ol>
                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        Employee Insert
                                        <router-link to="/employee" class="btn btn-sm btn-primary" id="add_new"> All
                                             Employee</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="employeeInsert" enctype="multipart/form-data">
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
                                                       <div class="form-floating mb-3">
                                                            <input name="address" class="form-control" id="address"
                                                                 type="text" placeholder="address" v-model="form.address" />
                                                            <small class="text-danger" v-if="errors.address">{{
                                                                 errors.address[0]
                                                            }}</small>
                                                            <label for="address">Address</label>
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
                                             <div class="row">
                                                  <div class="col-lg-4">
                                                       <div class="form-floating mb-3">
                                                            <input name="joiningDate" class="form-control" id="joinDate"
                                                                 type="date" placeholder="Date" v-model="form.joiningDate" />
                                                            <small class="text-danger" v-if="errors.joiningDate">{{
                                                                 errors.joiningDate[0]
                                                            }}</small>
                                                            <label for="joinDate">Joining Date</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-4">
                                                       <div class="form-floating mb-3">
                                                            <input name="nid" class="form-control" id="nid" type="text"
                                                                 placeholder="NID" v-model="form.nid" />
                                                            <small class="text-danger" v-if="errors.nid">{{ errors.nid[0]
                                                            }}</small>
                                                            <label for="nid">NID Number</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-4">
                                                       <div class="form-floating mb-3">
                                                            <input name="phone" class="form-control" id="phone" type="text"
                                                                 placeholder="phone" v-model="form.phone" />
                                                            <small class="text-danger" v-if="errors.phone">{{ errors.phone[0]
                                                            }}</small>
                                                            <label for="phone">Phone</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- file -->
                                             <div class="row">
                                                  <div class="col-lg-4">
                                                       <div class="custom-file">
                                                            <input type="file" class="btn btn-primary" id="customFile"
                                                                 @change="onFileSelected">
                                                            <small class="text-danger" v-if="errors.file">{{ errors.file[0]
                                                            }}</small>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                       <div class="form-floating mb-3">
                                                            <img :src="form.file" alt="file"
                                                                 style="height: 40px; width: 40px;">
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
                    name: '',
                    email: '',
                    address: '',
                    salary: '',
                    joiningDate: '',
                    nid: '',
                    phone: '',
                    file: '',

               },
               errors: {

               }

          }
     },
     // dataEnd
     methods: {
          onFileSelected(event) {
               let file = event.target.files[0];
               // console.log(file);
               if (file.size > 1048770) {
                    Toast.fire({
                         icon: "error",
                         type: 'error',
                         title: "image upload less then 1mb"
                    })
               } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                         this.form.file = event.target.result
                         console.log(event.target.result);
                    }
                    // console.log(event);
                    reader.readAsDataURL(file);
               }
          },
          employeeInsert() {
               axios.post('/api/employee/', this.form)
                    .then(() => {
                         this.$router.push({ name: 'employee' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "submited  successfully"
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
 
