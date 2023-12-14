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
                                             <th>Month</th>
                                             <th>Amount</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="salary in filtersearch" :key="salary.id">
                                             <td>{{ salary.name }}</td>
                                             <td>{{ salary.salary_month }}</td>
                                             <td>{{ salary.amount }}</td>
                                             <td>{{ salary.salary_date }}</td>
                                             <td>

                                                  <router-link :to="{ name: 'salary-edit', params: { id: salary.id } }"
                                                       class="btn btn-sm btn-info">Edit Salary</router-link>
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
          this.viewSalary();
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
                    return salary.name.match(this.searchTerm)
               })
          }
     },
     methods: {
          viewSalary() {
               let id = this.$route.params.id
               axios.get('/api/salary/view/' + id)
                    .then(({ data }) => (this.salaries = data))
                    .catch(error => this.errors = error.response.data.errors)
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