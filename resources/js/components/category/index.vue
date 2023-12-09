<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">

                                   <div class="card mb-4">
                                        <div class="card-header">
                                             <i class="fas fa-table me-1"></i>
                                             <a href="" class="" style="font-weight:bold; font-size: 18px;"> DataTable
                                                  Example</a> /
                                             <span>All categories</span>
                                             <router-link to="/category-store" class="btn btn-sm btn-primary" id="add_new">
                                                  Add new category
                                             </router-link>
                                        </div>
                                        <div class="card-body">
                                             <input v-model="searchTerm" class="form-control mr-sm-2" type="search"
                                                  placeholder="Search" aria-label="Search">
                                             <table class="table table-bordered">


                                                  <thead>
                                                       <tr>
                                                            <th>Name</th>
                                                            <th>slug name</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>
                                                       <tr v-for="category in filtersearch" :key="category.id">
                                                            <td>{{ category.category_name }}</td>
                                                            <td>{{ category.slugName }}</td>


                                                            <td>

                                                                 <router-link
                                                                      :to="{ name: 'category-edit', params: { id: category.id } }"
                                                                      class="btn btn-sm btn-info">Edit</router-link>

                                                                 <a @click="deleteCategory(category.id)"
                                                                      class="btn btn-danger"> delete</a>
                                                            </td>
                                                       </tr>

                                                  </tbody>
                                             </table>
                                        </div>
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
     mounted() {
          if (!User.loggedIn()) {
               this.$router.push({ name: '/' })
          }
     },

     created() {
          this.allCategory();
     },

     data() {
          return {
               categories: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.categories.filter(category => {
                    return category.category_name.match(this.searchTerm)

               })
          }
     },
     methods: {
          allCategory() {
               axios.get('/api/category/')
                    .then(({ data }) => (this.categories = data))
                    .catch()
          },
          deleteCategory(id) {
               Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
               }).then((result) => {
                    if (result.value) {
                         axios.delete('/api/category/' + id)
                              .then(() => {
                                   this.categories = this.categories.filter(category => {
                                        return category.id != id
                                   })
                              })
                              .catch(() => {
                                   this.$router.push({ name: 'category' })
                              })
                         Swal.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                         )
                    }
               })
          }
     },

}



</script>

<style>
#add_new {
     float: right;
}

#em_photo {
     height: 40px;
     width: 40px;
}
</style>