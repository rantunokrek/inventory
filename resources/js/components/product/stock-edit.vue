<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">

                                   <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>Stock Edit</li>

                                   </ol>
                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        Employee Insert
                                        <router-link to="/stock" class="btn btn-sm btn-primary" id="add_new"> All
                                             Stock</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="stockUpdate">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="name" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="full name"
                                                                 v-model="form.product_quality" />
                                                            <small class="text-danger" v-if="errors.product_quality">{{
                                                                 errors.product_quality[0]
                                                            }}</small>
                                                            <label for="inputEmail">Product Quality</label>
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

                    product_quality: ''



               },
               errors: {},



          }
     },
     // dataEnd

     methods: {

          stockUpdate() {
               let id = this.$route.params.id
               axios.post('/api/stock/update/' + id, this.form)
                    .then(() => {
                         this.$router.push({ name: 'stock' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "updated  successfully"
                         });
                    })

                    .catch(error => this.errors = error.response.data.errors)
          }

     },
     // methodsEnd

     created() {
          let id = this.$route.params.id
          axios.get('/api/product/' + id)
               .then(({ data }) => (this.form = data))
               .catch(console.log('error'))

     },
}

</script>

<style>
#add_new {
     float: right;
}
</style>
 
