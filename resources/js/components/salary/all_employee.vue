<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container-fluid px-4">

                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                         <li class="breadcrumb-item active">Salary</li>
                    </ol>

                    <div class="card mb-4">
                         <div class="card-header">
                              <i class="fas fa-table me-1"></i>
                              DataTable Example
                              <router-link to="/employee-store" class="btn btn-sm btn-primary" id="add_new"> Add new employee
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
                                             <th>Salary</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="employee in filtersearch" :key="employee.id">
                                             <td>{{ employee.name }}</td>
                                             <td>{{ employee.email }}</td>

                                             <td><img :src="employee.file" alt="" width="30px" height="30px"></td>
                                             <td>{{ employee.salary }}</td>
                                             <td>

                                                  <router-link :to="{ name: 'salary-pay', params: { id: employee.id } }"
                                                       class="btn btn-sm btn-info">Pay Salary</router-link>
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
          this.allEmployee();
     },

     data() {
          return {
               employees: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.employees.filter(employee => {
                    return employee.name.match(this.searchTerm)

               })
          }
     },
     methods: {
          allEmployee() {
               axios.get('/api/employee/')
                    .then(({ data }) => (this.employees = data))
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