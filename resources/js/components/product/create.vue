<template>
     <div id="layoutAuthentication_content">
          <main>
               <div class="container">
                    <div class="row justify-content-center">
                         <div class="col-lg-12">
                              <div class="card shadow-lg border-0 rounded-lg mt-5">


                                   <div class="card-header">

                                        <i class="fas fa-chart-area"></i>
                                        <a href="" class="" style="font-weight:bold; font-size: 18px;"> Dashboard
                                        </a> / <span>
                                             Add Product </span>
                                        <router-link to="/product" class="btn btn-sm btn-primary" id="add_new">
                                             Product List</router-link>


                                   </div>
                                   <div class="card-body">
                                        <form @submit.prevent="productInsert" enctype="multipart/form-data">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="name" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="full name"
                                                                 v-model="form.product_name" />
                                                            <small class="text-danger" v-if="errors.product_name">{{
                                                                 errors.product_name[0]
                                                            }}</small>
                                                            <label for="inputEmail">Product Name</label>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="email" class="form-control" id="inputEmail"
                                                                 type="text" placeholder="product_code"
                                                                 v-model="form.product_code" />
                                                            <small class="text-danger" v-if="errors.product_code">{{
                                                                 errors.product_code[0]
                                                            }}</small>
                                                            <label for="inputEmail">Product Code</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-group mb-3">
                                                            <!-- <input name="address" class="form-control" id="address"
                                                                 type="text" placeholder="category_id"
                                                                 v-model="form.category_id" />
                                                            <small class="text-danger" v-if="errors.category_id">{{
                                                                 errors.category_id[0]
                                                            }}</small> -->

                                                            <label for="inputState">Category</label>
                                                            <select id="inputState" class="datatable-selector form-control"
                                                                 v-model="form.category_id">
                                                                 <option :value="category.id" v-for="category in categories">
                                                                      {{ category.category_name }}</option>

                                                                 <small class="text-danger" v-if="errors.category_id">{{
                                                                      errors.category_id[0]
                                                                 }}</small>
                                                            </select>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-group mb-3">

                                                            <label for="inputStated">Supplier</label>
                                                            <select id="inputState" class="datatable-selector form-control"
                                                                 v-model="form.supplier_id">
                                                                 <option :value="supplier.id" v-for="supplier in suppliers">
                                                                      {{ supplier.name }}</option>


                                                                 <small class="text-danger" v-if="errors.supplier_id">{{
                                                                      errors.supplier_id[0]
                                                                 }}</small>
                                                            </select>
                                                       </div>
                                                  </div>
                                                  <div class="col">
                                                       <div class="form-floating mb-3">
                                                            <input name="buying_price" class="form-control" id="buying_price"
                                                                 type="text" placeholder="buying_price"
                                                                 v-model="form.buying_price" />
                                                            <small class="text-danger" v-if="errors.buying_price">{{
                                                                 errors.buying_price[0]
                                                            }}</small>
                                                            <label for="buying_price">buying_price</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="row">
                                                  <div class="col-lg-3">
                                                       <div class="form-floating mb-3">
                                                            <input name="buying_date" class="form-control" id="joinDate"
                                                                 type="date" placeholder="Date" v-model="form.buying_date" />
                                                            <small class="text-danger" v-if="errors.buying_date">{{
                                                                 errors.buying_date[0]
                                                            }}</small>
                                                            <label for="joinDate">buying Date</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                       <div class="form-floating mb-3">
                                                            <input name="product_quality" class="form-control" id="nid"
                                                                 type="text" placeholder="product_quality"
                                                                 v-model="form.product_quality" />
                                                            <small class="text-danger" v-if="errors.product_quality">{{
                                                                 errors.product_quality[0]
                                                            }}</small>
                                                            <label for="nid">product_quality </label>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                       <div class="form-floating mb-3">
                                                            <input name="selling_price" class="form-control"
                                                                 id="selling_price" type="text" placeholder="selling_price"
                                                                 v-model="form.selling_price" />
                                                            <small class="text-danger" v-if="errors.selling_price">{{
                                                                 errors.selling_price[0]
                                                            }}</small>
                                                            <label for="selling_price">selling_price</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                       <div class="form-floating mb-3">
                                                            <input name="root" class="form-control" id="root" type="text"
                                                                 placeholder="root" v-model="form.root" />
                                                            <small class="text-danger" v-if="errors.root">{{
                                                                 errors.root[0]
                                                            }}</small>
                                                            <label for="root">root</label>
                                                       </div>
                                                  </div>
                                             </div>
                                             <!-- file -->
                                             <div class="row">
                                                  <div class="col-lg-4">
                                                       <div class="custom-file">
                                                            <input type="file" class="btn btn-primary" id="customFile"
                                                                 @change="onFileSelected">
                                                            <small class="text-danger" v-if="errors.image">{{ errors.image[0]
                                                            }}</small>
                                                       </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                       <div class="form-floating mb-3">
                                                            <img :src="form.image" alt="file"
                                                                 style="height: 40px; width: 40px;">
                                                       </div>
                                                  </div>
                                             </div>


                                             <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                                  <button type="submit" class="btn btn-primary"> Submit</button>
                                             </div>
                                        </form>
                                   </div>

                              </div>
                         </div>
                    </div>
               </div>
          </main>
     </div>
</template>
 
 
<script>

export default {
     created() {
          if (!User.loggedIn()) {
               this.$router.push({ name: 'home' })
          }
     },

     data() {
          return {
               form: {
                    category_id: '',
                    product_name: '',
                    product_code: '',
                    root: '',
                    buying_price: '',
                    selling_price: '',
                    supplier_id: '',
                    buying_date: '',
                    image: '',
                    product_quality: '',

               },
               errors: {},
               categories: {},
               suppliers: {}

          }
     },
     // dataEnd
     methods: {
          onFileSelected(event) {
               let file = event.target.files[0];
               // console.log(file);
               if (file.size > 1048770) {
                    Toast.fire({
                         icon: "error",
                         type: 'error',
                         title: "image upload less then 1mb"
                    })
               } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                         this.form.image = event.target.result

                    }
                    // console.log(event);
                    reader.readAsDataURL(file);
               }
          },
          productInsert() {
               axios.post('/api/product/', this.form)
                    .then(() => {
                         this.$router.push({ name: 'product' })
                         Toast.fire({
                              icon: "success",
                              type: 'success',
                              title: "submited  successfully"
                         });
                    })

                    .catch(error => this.errors = error.response.data.errors)
          }

     },
     // methodsEnd
     created() {
          axios.get('/api/category/')
               .then(({ data }) => (this.categories = data))
          axios.get('/api/supplier/')
               .then(({ data }) => (this.suppliers = data))
     },

}

</script>

<style>
#add_new {
     float: right;
}
</style>
 
