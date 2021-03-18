<template>
    <div>
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
            <template #validate="{ item }">
                <td v-if="item.status == 'open'" class="py-2">
                    <CButton
                        color="info"
                        variant="outline"
                        square
                        size="sm"
                        @click="validateLead(item.id)"
                    >
                        Validate
                    </CButton>
                </td>
            </template>
            <template #reject="{ item }">
                <td
                    v-if="item.status == 'open' || item.status == 'validated'"
                    class="py-2"
                >
                    <CButton
                        color="danger"
                        variant="outline"
                        square
                        size="sm"
                        @click="rejectLead(item.id)"
                    >
                        Reject
                    </CButton>
                </td>
            </template>
            <template #close="{ item }">
                <td v-if="item.status == 'validated'" class="py-2">
                    <CButton
                        color="success"
                        variant="outline"
                        square
                        size="sm"
                        @click="closeLead(item.id)"
                    >
                        Close
                    </CButton>
                </td>
            </template>
        </CDataTable>
    </div>
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
    {
        key: "by",
        label: "Assigned By"
    },
    // {
    //     key: "for",
    //     label: "Assigned To"
    // },
    "status",
    {
        key: "updated_at",
        label: "Updated at"
    },
    {
        key: "validate",
        label: "",
        _style: "width:1%",
        sorter: false,
        filter: false
    },
    {
        key: "reject",
        label: "",
        _style: "width:1%",
        sorter: false,
        filter: false
    },
    {
        key: "close",
        label: "",
        _style: "width:1%",
        sorter: false,
        filter: false
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
            fetch("myapi/leads-assigned")
                .then(res => res.json())
                .then(res => {
                    this.items = res.data;
                })
                .catch(err => console.log(err));
        },

        validateLead(id) {
            console.log(id);
            fetch(`api/validate-lead/${id}`, {
                method: "put"
            })
                .then(res => res.json())
                .then(data => {
                    this.fetchLeads();
                })
                .catch(err => console.log(err));
        },
        rejectLead(id) {
            console.log(id);
            fetch(`api/reject-lead/${id}`, {
                method: "put"
            })
                .then(res => res.json())
                .then(data => {
                    this.fetchLeads();
                })
                .catch(err => console.log(err));
        },
        closeLead(id) {
            console.log(id);
            fetch(`api/close-lead/${id}`, {
                method: "put"
            })
                .then(res => res.json())
                .then(data => {
                    this.fetchLeads();
                })
                .catch(err => console.log(err));
        }
    }
};
</script>
