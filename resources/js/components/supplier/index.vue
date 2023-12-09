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
                                                  Example</a> / <span>
                                                  All
                                                  suppliers</span>





                                             <router-link to="/supplier-store" class="btn btn-sm btn-primary" id="add_new">
                                                  Add new supplier
                                             </router-link>
                                        </div>
                                        <div class="card-body">
                                             <input v-model="searchTerm" class="form-control mr-sm-2" type="search"
                                                  placeholder="Search" aria-label="Search">
                                             <table class="table table-bordered">


                                                  <thead>
                                                       <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>

                                                            <th>Photo</th>
                                                            <th>phone</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>

                                                  <tbody>
                                                       <tr v-for="supplier in filtersearch" :key="supplier.id">
                                                            <td>{{ supplier.name }}</td>
                                                            <td>{{ supplier.email }}</td>

                                                            <td><img :src="supplier.file" alt="" width="30px" height="30px">
                                                            </td>
                                                            <td>{{ supplier.phone }}</td>
                                                            <td>

                                                                 <router-link
                                                                      :to="{ name: 'supplier-edit', params: { id: supplier.id } }"
                                                                      class="btn btn-sm btn-info">Edit</router-link>

                                                                 <a @click="deleteSupplier(supplier.id)"
                                                                      class="btn btn-danger"> delete</a>
                                                            </td>
                                                       </tr>

                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>


                              </div> <!-- rrrrrrrrrrrr -->
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
          this.allSupplier();
     },

     data() {
          return {
               suppliers: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.suppliers.filter(supplier => {
                    return supplier.name.match(this.searchTerm)
                    return supplier.phone.match(this.searchTerm)
               })
          }
     },
     methods: {
          allSupplier() {
               axios.get('/api/supplier/')
                    .then(({ data }) => (this.suppliers = data))
                    .catch()
          },
          deleteSupplier(id) {
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
                         axios.delete('/api/supplier/' + id)
                              .then(() => {
                                   this.suppliers = this.suppliers.filter(supplier => {
                                        return supplier.id != id
                                   })
                              })
                              .catch(() => {
                                   this.$router.push({ name: 'supplier' })
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