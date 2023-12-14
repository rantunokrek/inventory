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
                              <router-link to="/salary" class="btn btn-sm btn-primary" id="add_new"> SalaryView
                              </router-link>
                         </div>
                         <div class="card-body">
                              <input v-model="searchTerm" class="form-control mr-sm-2" type="search" placeholder="Search"
                                   aria-label="Search">
                              <table class="table table-bordered">


                                   <thead>
                                        <tr>
                                             <th>Name</th>

                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>

                                        <tr v-for="salary in filtersearch" :key="salary.salary_month">
                                             <td>{{ salary.salary_month }}</td>
                                             <td>
                                                  <router-link
                                                       :to="{ name: 'salary-view', params: { id: salary.salary_month } }"
                                                       class="btn btn-sm btn-info">View Salary</router-link>
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
          this.allSalary();
     },

     data() {
          return {
               salaries: [],
               searchTerm: '',
          }
     },
     computed: {
          filtersearch() {
               return this.salaries.filter(salary => {
                    return salary.salary_month.match(this.searchTerm)
               })
          }
     },
     methods: {
          allSalary() {
               axios.get('/api/salary/')
                    .then(({ data }) => (this.salaries = data))
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