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
                                             <th>Join date</th>
                                             <th>Photo</th>
                                             <th>phone</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>

                                   <tbody>
                                        <tr v-for="employee in filtersearch" :key="employee.id">
                                             <td>{{ employee.name }}</td>
                                             <td>{{ employee.email }}</td>
                                             <td>{{ employee.joiningDate }}</td>
                                             <td><img :src="employee.file" alt="" width="30px" height="30px"></td>
                                             <td>{{ employee.phone }}</td>
                                             <td>

                                                  <router-link :to="{ name: 'employee-edit', params: { id: employee.id } }"
                                                       class="btn btn-sm btn-info">Edit</router-link>

                                                  <a @click="deleteEmployee(employee.id)" class="btn btn-danger"> delete</a>
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
                    return employee.phone.match(this.searchTerm)
               })
          }
     },
     methods: {
          allEmployee() {
               axios.get('/api/employee/')
                    .then(({ data }) => (this.employees = data))
                    .catch()
          },
          deleteEmployee(id) {
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
                         axios.delete('/api/employee/' + id)
                              .then(() => {
                                   this.employees = this.employees.filter(employee => {
                                        return employee.id != id
                                   })
                              })
                              .catch(() => {
                                   this.$router.push({ name: 'employee' })
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