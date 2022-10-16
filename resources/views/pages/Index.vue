<template>
    <Navbar />
    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                <h3>
                    Data Customer
                    <Link :href="`/customer/create`"
                        ><button class="btn btn-primary btn-sm float-end">
                            Add
                        </button>
                    </Link>
                </h3>
            </div>
            <div class="col-3">
                <input
                    v-model="params.search"
                    type="text"
                    class="form-control ms-3 mt-3"
                    placeholder="Search..."
                />
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><span @click="sort('nama')">Nama</span></th>
                            <th><span @click="sort('email')">Email</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="c in customer.data" :key="c.id">
                            <td>{{ c.id }}</td>
                            <td>{{ c.nama }}</td>
                            <td>{{ c.email }}</td>
                            <td>
                                <a href="#"
                                    ><button
                                        class="btn btn-warning btn-sm me-2"
                                    >
                                        Edit
                                    </button>
                                </a>

                                <Link
                                    :href="`/customer/${c.id}`"
                                    method="delete"
                                    ><button class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :pagination="customer"></Pagination>
            </div>
        </div>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/views/components/Navbar.vue";
import Pagination from "@/views/components/Pagination.vue";

export default {
    components: {
        Navbar,
        Pagination,
        Link,
    },
    props: {
        customer: Object,
        filters: Object,
    },

    data() {
        return {
            params: {
                search: this.filters.search,
                field: this.filters.field,
                direction: this.filters.direction,
            },
        };
    },

    methods: {
        sort(field) {
            this.params.field = field;
            this.params.direction =
                this.params.direction === "asc" ? "desc" : "asc";
        },
    },

    watch: {
        params: {
            handler() {
                //pakai lodash hanya 1 baris ini utk menghilangkan sisa ketikkan search di url
                // let params = pickBy(this.params);

                // tanpa lodash
                let params = this.params;

                Object.keys(params).forEach((key) => {
                    if (params[key] == "") {
                        delete params[key];
                    }
                });
                // sampai sini

                this.$inertia.get(this.route("customer"), this.params, {
                    replace: true,
                    preserveState: true,
                });
            },
            deep: true,
        },
    },
};
</script>

//
