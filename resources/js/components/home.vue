<template>
    <div id="layoutAuthentication">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">{{ todaysell }}.Taka</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">{{ income }}.Taka</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">{{ due }}.Taka</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">{{ expense }}.Taka</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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

                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="product in products" :key="product.id">

                                <td>{{ product.product_name }}</td>
                                <td><img :src="product.image" alt="" width="30px" height="30px"></td>
                                <td>{{ product.product_quality }}</td>
                                <td v-if="product.product_quality >= 1">
                                    <span class="btn btn-success">Available</span>
                                </td>
                                <td v-else="">
                                    <span class="btn btn-danger">Stocked out</span>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: '/' })
        }
    },

    data() {
        return {
            todaysell: '',
            income: '',
            expense: '',
            due: '',
            products: '',
        }
    },

    // createdEnd
    mounted() {
        this.TodaySell();
        this.TodayIncome();
        this.TodayDue();
        this.TodayExpense();
        this.StocksOut();
    },
    methods: {
        TodaySell() {
            axios.get('/api/today/sell')
                .then(({ data }) => (this.todaysell = data))
                .catch()
        },
        TodayIncome() {
            axios.get('/api/today/income')
                .then(({ data }) => (this.income = data))
                .catch()
        },
        TodayDue() {
            axios.get('/api/today/due')
                .then(({ data }) => (this.due = data))
                .catch()
        },
        TodayExpense() {
            axios.get('/api/today/expense')
                .then(({ data }) => (this.expense = data))
                .catch()
        },
        StocksOut() {
            axios.get('api/today/stocksout')
                .then(({ data }) => (this.products = data))
                .catch()
        }

    }


}


</script>

