<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                         <li class="breadcrumb-item active">Tables</li>
                    </ol>

                    <div class="card mb-4">
                         <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                              DataTable Example
                              <router-link to="/customer-store" class="btn btn-sm btn-primary" id="add_new"> Add new customer
                              </router-link>
                         </div>
                         <div class="card-body">
                              <input v-model="searchTerm" class="form-control mr-sm-2" type="search" placeholder="Search"
                                   aria-label="Search">
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
                                        <tr v-for="customer in filtersearch" :key="customer.id">
                                             <td>{{ customer.customer_name }}</td>
                                             <td>{{ customer.customer_email }}</td>
                                             <td><img :src="customer.customer_photo" alt="" width="30px" height="30px"></td>
                                             <td>{{ customer.customer_phone }}</td>
                                             <td>

                                                  <router-link :to="{ name: 'customer-edit', params: { id: customer.id } }"
                                                       class="btn btn-sm btn-info">Edit</router-link>

                                                  <a @click="DeleteCustomer(customer.id)" class="btn btn-danger"> delete</a>
                                             </td>
                                        </tr>

                                   </tbody>
                              </table>
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
          this.allCustomer();
     },

     data() {
          return {
               customers: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.customers.filter(customer => {
                    return customer.customer_name.match(this.searchTerm)

               })
          }
     },
     methods: {
          allCustomer() {
               axios.get('/api/customer/')
                    .then(({ data }) => (this.customers = data))
                    .catch()
          },
          DeleteCustomer(id) {
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
                         axios.delete('/api/customer/' + id)
                              .then(() => {
                                   this.customers = this.customers.filter(customer => {
                                        return customer.id != id
                                   })
                              })
                              .catch(() => {
                                   this.$router.push({ name: 'customer' })
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