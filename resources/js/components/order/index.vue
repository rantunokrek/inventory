<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Order view</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                         <li class="breadcrumb-item active">Order</li>
                    </ol>

                    <div class="card mb-4">
                         <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                              DataTable Example

                         </div>
                         <div class="card-body">
                              <input v-model="searchTerm" class="form-control mr-sm-2" type="search" placeholder="Search"
                                   aria-label="Search">
                              <table class="table table-bordered">


                                   <thead>
                                        <tr>
                                             <th>Name</th>
                                             <th>Total Amount</th>
                                             <th>Pay</th>
                                             <th>Due</th>
                                             <th>PayBy</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="order in filtersearch" :key="order.id">
                                             <td>{{ order.customer_name }}</td>
                                             <td>{{ order.total }}</td>
                                             <td>{{ order.pay }}</td>
                                             <td>{{ order.due }}</td>
                                             <td>{{ order.payby }}</td>


                                             <td>

                                                  <router-link :to="{ name: 'view-order', params: { id: order.id } }"
                                                       class="btn btn-sm btn-info">View</router-link>

                                                  <a @click="DeleteOrder(order.id)" class="btn btn-danger"> delete</a>
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
          this.allOrder();
     },

     data() {
          return {
               orders: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.orders.filter(order => {
                    return order.customer_name.match(this.searchTerm)
               })
          }
     },
     methods: {
          allOrder() {
               axios.get('/api/order/')
                    .then(({ data }) => (this.orders = data))
                    .catch()
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