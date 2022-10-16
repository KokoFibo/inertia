<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    nama: "",
    email: "",
});
</script>

<template>
    <div class="container">
        <div class="row">
            <div class="col-5 m-auto mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Data</h3>
                    </div>
                    <form @submit.prevent="form.post('store')">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label"
                                    >Nama</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    v-model="form.nama"
                                    placeholder="Nama"
                                />
                                <span
                                    class="text-danger"
                                    v-if="$page.props.errors.nama"
                                    >{{ $page.props.errors.nama }}</span
                                >
                                <br />
                                <label for="email" class="form-label"
                                    >Email address</label
                                >
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="form.email"
                                    placeholder="name@example.com"
                                />
                                <span
                                    class="text-danger"
                                    v-if="$page.props.errors.email"
                                    >{{ $page.props.errors.email }}</span
                                >
                            </div>
                            <button
                                type="submit"
                                class="btn btn-primary btn-sm"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
