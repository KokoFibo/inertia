<template>
    <div v-if="pagination.last_page > 1">
        Showing {{ pagination.from }} to {{ pagination.to }} of
        {{ pagination.total }} results
        <nav aria-label="Page navigation example" class="float-end">
            <ul class="pagination">
                <li class="page-item" @click="loadPage(1)">
                    <a class="page-link" href="#">First</a>
                </li>
                <li
                    class="page-item"
                    :disabled="noPreviousPage"
                    @click="loadPage(pagination.current_page - 1)"
                >
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li
                    class="page-item"
                    :disabled="noNextPage"
                    @click="loadPage(pagination.current_page + 1)"
                >
                    <a class="page-link" href="#">Next</a>
                </li>
                <li class="page-item" @click="loadPage(pagination.last_page)">
                    <a :disabled="noNextPage" class="page-link" href="#"
                        >Last</a
                    >
                </li>
            </ul>
        </nav>
        <button
            class="btn btn-primary btn-sm me-1"
            :disabled="noPreviousPage"
            @click="loadPage(1)"
        >
            First
        </button>
        <button
            class="btn btn-primary btn-sm me-1"
            :disabled="noPreviousPage"
            @click="loadPage(pagination.current_page - 1)"
        >
            Previous
        </button>
        <input type="text" value="1" size="2" class="d-inline" />
        <p>of {{ pagination.total }}</p>
        <button
            class="btn btn-primary btn-sm me-1"
            :disabled="noNextPage"
            @click="loadPage(pagination.current_page + 1)"
        >
            Next
        </button>
        <button
            class="btn btn-primary btn-sm me-1"
            :disabled="noNextPage"
            @click="loadPage(pagination.last_page)"
        >
            Last
        </button>
    </div>
</template>
<script>
export default {
    name: "Pagination",
    props: {
        pagination: Object,
    },

    methods: {
        loadPage(page) {
            this.$inertia.get(this.$page.url, { page: page });
        },
    },
    computed: {
        noPreviousPage() {
            return this.pagination.current_page - 1 <= 0;
        },
        noNextPage() {
            return this.pagination.current_page + 1 > this.pagination.last_page;
        },
    },
};
</script>
