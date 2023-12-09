<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">


                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        Category Insert
                                        <router-link to="/category" class="btn btn-sm btn-primary" id="add_new"> All
                                             Category</router-link>

                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="categoryUpdate" enctype="multipart/form-data">
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


     data() {
          return {
               form: {
                    category_name: '',
                    slugName: ''


               },
               errors: {

               }

          }
     },
     // dataEnd
     created() {
          let id = this.$route.params.id
          axios.get('/api/category/' + id)
               .then(({ data }) => (this.form = data))
               .catch(console.log('error'))
     },
     methods: {

          categoryUpdate() {
               let id = this.$route.params.id
               axios.patch('/api/category/' + id, this.form)
                    .then(() => {
                         this.$router.push({ name: 'category' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: " Category Updated  successfully"
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
 
