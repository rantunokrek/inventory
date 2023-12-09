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
                                             Add category </span>
                                        <router-link to="/category" class="btn btn-sm btn-primary" id="add_new">
                                             Category List</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="categoryInsert" enctype="multipart/form-data">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input class="form-control" id="idFor" type="text"
                                                                 placeholder="Categiory name" v-model="form.category_name" />
                                                            <small class="text-danger" v-if="errors.category_name">{{
                                                                 errors.category_name[0]
                                                            }}</small>
                                                            <label for="idFor">Category Name</label>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input class="form-control" id="Idname" type="text"
                                                                 placeholder="Slug Name" v-model="form.slugName" />
                                                            <small class="text-danger" v-if="errors.slugName">{{
                                                                 errors.slugName[0]
                                                            }}</small>
                                                            <label for="Idname">Slug Name</label>
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
                    category_name: '',
                    slugName: '',


               },
               errors: {

               }

          }
     },
     // dataEnd
     methods: {

          categoryInsert() {
               axios.post('/api/category/', this.form)
                    .then(() => {
                         this.$router.push({ name: 'category' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "Category added successfully"
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
 
