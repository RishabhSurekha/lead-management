<template>
    <CDataTable
        :items="items"
        :fields="fields"
        column-filter
        table-filter
        items-per-page-select
        :items-per-page="10"
        hover
        sorter
        pagination
    >
        <template #status="{item}">
            <td>
                <CBadge v-if="item.status == 'open'" color="warning">
                    Open
                </CBadge>
                <CBadge v-if="item.status == 'validated'" color="info">
                    Validated
                </CBadge>
                <CBadge v-if="item.status == 'rejected'" color="danger">
                    Rejected
                </CBadge>
                <CBadge v-if="item.status == 'closed'" color="success">
                    Closed
                </CBadge>
            </td>
        </template>
        <template #edit_lead="{ item }">
            <td class="py-2">
                <CButton
                    color="primary"
                    variant="outline"
                    square
                    size="sm"
                    @click="editLead(item)"
                >
                    Edit
                </CButton>
            </td>
        </template>
    </CDataTable>
</template>

<script>
import {
    CCardBody,
    CDataTable,
    CBadge,
    CButton,
    CCollapse,
    CMedia
} from "@coreui/vue";

const fields = [
    "name",
    "value",
    "details",
    "segment",
    // {
    //     key: "by",
    //     label: "Added By"
    // },
    {
        key: "for",
        label: "Assigned To"
    },
    "status",
    {
        key: "updated_at",
        label: "Updated at"
    }
];

export default {
    data() {
        return {
            items: [],
            fields,
            details: [],
            collapseDuration: 0,
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
            edit: false
        };
    },
    components: {
        CCardBody,
        CDataTable,
        CBadge,
        CButton
    },
    created() {
        this.fetchLeads();
    },
    methods: {
        fetchLeads() {
            // page_url = "/api/leads";
            fetch("myapi/leads-submitted")
                .then(res => res.json())
                .then(res => {
                    // console.log(res.data);
                    this.items = res.data;
                })
                .catch(err => console.log(err));
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
