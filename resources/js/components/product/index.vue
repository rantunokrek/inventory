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
                              <router-link to="/product-store" class="btn btn-sm btn-primary" id="add_new"> Add new product
                              </router-link>
                         </div>
                         <div class="card-body">
                              <input v-model="searchTerm" class="form-control mr-sm-2" type="search" placeholder="Search"
                                   aria-label="Search">
                              <table class="table table-bordered">


                                   <thead>
                                        <tr>
                                             <th>Product Name</th>
                                             <th>category</th>
                                             <th>Supplier</th>
                                             <th>Photo</th>

                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="product in filtersearch" :key="product.id">
                                             <td>{{ product.product_name }}</td>
                                             <td>{{ product.category_name }}</td>
                                             <td>{{ product.name }}</td>
                                             <td><img :src="product.image" alt="" width="30px" height="30px"></td>

                                             <td>

                                                  <router-link :to="{ name: 'product-edit', params: { id: product.id } }"
                                                       class="btn btn-sm btn-info">Edit</router-link>

                                                  <a @click="deleteProduct(product.id)" class="btn btn-danger"> delete</a>
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
          this.allProduct();
     },

     data() {
          return {
               products: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.products.filter(product => {
                    return product.name.match(this.searchTerm)

               })
          }
     },
     methods: {
          allProduct() {
               axios.get('/api/product/')
                    .then(({ data }) => (this.products = data))
                    .catch()
          },
          deleteProduct(id) {
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
                         axios.delete('/api/product/' + id)
                              .then(() => {
                                   this.products = this.products.filter(product => {
                                        return product.id != id
                                   })
                              })
                              .catch(() => {
                                   this.$router.push({ name: 'product' })
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