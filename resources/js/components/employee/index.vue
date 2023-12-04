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
                              <table id="datatablesSimple">
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
                                        <tr v-for="employee in employees" :key="employee.id">
                                             <td>{{ employee.name }}</td>
                                             <td>{{ employee.email }}</td>
                                             <td>{{ employee.joiningDate }}</td>
                                             <td><img :src="employee.file" alt="" width="30px" height="30px"></td>
                                             <td>{{ employee.phone }}</td>
                                             <td>
                                                  <button class="btn btn-primary"> edit</button>
                                                  <button class="btn btn-danger"> delete</button>
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


     data() {
          return {

               employees: {}

          }
     },
     // dataEnd
     methods: {
          allEmployee() {
               axios.get('/api/employee')
                    .then(({ data }) => (this.employees = data))
                    .catch(error => this.errors = error.response.data.errors)


          }

     },
     // methodsEnd

     created() {
          this.allEmployee();
     }
}

</script>
 
<style>
#add_new {
     float: right;
}
</style>