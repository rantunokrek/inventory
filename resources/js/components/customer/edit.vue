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
                                        <router-link to="/customer" class="btn btn-sm btn-primary" id="add_new"> All
                                             Employee</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="customerUpdate" enctype="multipart/form-data">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="name" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="full name"
                                                                 v-model="form.customer_name" />
                                                            <small class="text-danger" v-if="errors.customer_name">{{
                                                                 errors.customer_name[0]
                                                            }}</small>
                                                            <label for="inputEmail">Full Name</label>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="customer_email" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="name@example.com"
                                                                 v-model="form.customer_email" />
                                                            <small class="text-danger" v-if="errors.customer_email">{{
                                                                 errors.customer_email[0]
                                                            }}</small>
                                                            <label for="inputEmail">Email address</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="address" class="form-control" id="address"
                                                                 type="text" placeholder="customer_address"
                                                                 v-model="form.customer_address" />
                                                            <small class="text-danger" v-if="errors.customer_address">{{
                                                                 errors.customer_address[0]
                                                            }}</small>
                                                            <label for="address">Address</label>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="salary" class="form-control" id="salary" type="text"
                                                                 placeholder="salary" v-model="form.customer_phone" />
                                                            <small class="text-danger" v-if="errors.customer_phone">{{
                                                                 errors.customer_phone[0]
                                                            }}</small>
                                                            <label for="salary">Phone</label>
                                                       </div>
                                                  </div>
                                             </div>

                                             <!-- file -->
                                             <div class="row">
                                                  <div class="col-lg-4">
                                                       <div class="custom-file">
                                                            <input type="file" class="btn btn-primary" id="customFile"
                                                                 @change="onFileSelected">
                                                            <small class="text-danger" v-if="errors.customer_photo">{{
                                                                 errors.customer_photo[0]
                                                            }}</small>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                       <div class="form-floating mb-3">
                                                            <img :src="form.customer_photo" alt="customer_photo"
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


     data() {
          return {
               form: {
                    customer_name: '',
                    customer_email: '',
                    customer_phone: '',
                    customer_address: '',
                    customer_photo: '',

               },
               errors: {

               }

          }
     },
     // dataEnd
     created() {
          let id = this.$route.params.id
          axios.get('/api/customer/' + id)
               .then(({ data }) => (this.form = data))
               .catch(console.log('error'))
     },
     methods: {
          onFileSelected(event) {
               let customer_photo = event.target.files[0];
               // console.log(file);
               if (customer_photo.size > 1048770) {
                    Toast.fire({
                         icon: "error",
                         type: 'error',
                         title: "image upload less then 1mb"
                    })
               } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                         this.form.newPhoto = event.target.result

                    }
                    // console.log(event);
                    reader.readAsDataURL(customer_photo);
               }
          },
          customerUpdate() {
               let id = this.$route.params.id
               axios.patch('/api/customer/' + id, this.form)
                    .then(() => {
                         this.$router.push({ name: 'customer' })
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
 
