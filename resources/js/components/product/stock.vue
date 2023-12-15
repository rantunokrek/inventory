<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Tables</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                                             <th>Photo</th>
                                             <th>Quntity</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="product in filtersearch" :key="product.id">

                                             <td>{{ product.product_name }}</td>
                                             <td><img :src="product.image" alt="" width="30px" height="30px"></td>
                                             <td>{{ product.product_quality }}</td>
                                             <td v-if="product.product_quality >= 1">
                                                  <span class="btn btn-success">Available</span>
                                             </td>
                                             <td v-else="">
                                                  <span class="btn btn-danger">Stocked out</span>
                                             </td>
                                             <td>

                                                  <router-link :to="{ name: 'sotck-edit', params: { id: product.id } }"
                                                       class="btn btn-sm btn-info">Edit</router-link>
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