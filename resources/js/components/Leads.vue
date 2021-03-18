<template>
    <div>
        <h2>Leads</h2>
        <!-- <form @submit.prevent="addArticle" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="article.title">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-block">Save</button>
        </form>
        <button @click="clearForm()" class="btn btn-danger btn-block">Cancel</button> -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li
                    v-bind:class="[{ disabled: !pagination.prev_page_url }]"
                    class="page-item"
                >
                    <a
                        class="page-link"
                        @click="fetchLeads(pagination.prev_page_url)"
                        >Previous</a
                    >
                </li>
                <li class="page-item disabled">
                    <a class="page-link text-dark" href=""
                        >Page {{ pagination.current_page }} of
                        {{ pagination.last_page }}</a
                    >
                </li>
                <li
                    v-bind:class="[{ disabled: !pagination.next_page_url }]"
                    class="page-item"
                >
                    <a
                        class="page-link"
                        @click="fetchLeads(pagination.next_page_url)"
                        >Next</a
                    >
                </li>
            </ul>
        </nav>
        <div
            class="card card-body mb-2"
            v-for="lead in leads"
            v-bind:key="lead.id"
        >
            <h3>{{ lead.name }}</h3>
            <p>{{ lead.value }}</p>
            <p>{{ lead.address }}</p>
            <p>{{ lead.segment }}</p>
            <p>{{ lead.by }}</p>
            <p>{{ lead.for }}</p>
            <p>{{ lead.status }}</p>
            <hr />
            <button @click="editLead(lead)" class="btn btn-warning mb-2">
                Edit
            </button>
            <button @click="deleteLead(lead.id)" class="btn btn-danger">
                Delete
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            leads: [],
            lead: {
                id: "",
                value: "",
                name: "",
                address: "",
                segment: "",
                by: "",
                for: "",
                status: "open"
            },
            lead_id: "",
            pagination: {},
            edit: false
        };
    },

    created() {
        this.fetchLeads();
    },
    methods: {
        fetchLeads(page_url) {
            let vm = this;
            page_url = page_url || "/api/leads";
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.leads = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };

            this.pagination = pagination;
        },
        deleteLead(id) {
            if (confirm("Are You Sure?")) {
                fetch(`api/lead/${id}`, {
                    method: "delete"
                })
                    .then(res => res.json())
                    .then(data => {
                        alert("Lead Removed");
                        this.fetchLeads();
                    })
                    .catch(err => console.log(err));
            }
        },
        addLead() {
            if (this.edit === false) {
                // Add
                fetch("api/lead", {
                    method: "post",
                    body: JSON.stringify(this.lead),
                    headers: {
                        "content-type": "application/json"
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.clearForm();
                        alert("Lead Added");
                        this.fetchLeads();
                    })
                    .catch(err => console.log(err));
            } else {
                // Update
                fetch("api/lead", {
                    method: "put",
                    body: JSON.stringify(this.lead),
                    headers: {
                        "content-type": "application/json"
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        this.clearForm();
                        alert("Lead Updated");
                        this.fetchLeads();
                    })
                    .catch(err => console.log(err));
            }
        },
        editLead(lead) {
            this.edit = true;
            this.lead.id = lead.id;
            this.lead.lead_id = lead.id;
            this.lead.value = lead.value;
            this.lead.name = lead.name;
            this.lead.address = lead.address;
            this.lead.segment = lead.segment;
            this.lead.by = lead.by;
            this.lead.for = lead.for;
            this.lead.status = lead.status;
        },
        clearForm() {
            this.edit = false;
            this.article.id = null;
            this.article.article_id = null;
            this.article.title = "";
            this.article.body = "";
            this.lead.id = null;
            this.lead.lead_id = null;
            this.lead.value = "";
            this.lead.name = "";
            this.lead.address = "";
            this.lead.segment = "";
            this.lead.by = "";
            this.lead.for = "";
            this.lead.status = "open";
        }
    }
};
</script>
