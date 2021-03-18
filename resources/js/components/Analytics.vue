<template>
    <div class="container-fluid">
        <h1>Analysis of leads submitted</h1>
        <hr />
        <div id="leads-submitted" style="width: 100%; height: 400px;"></div>

        <h1 class="mt-3">Analysis of leads assigned</h1>
        <hr />
        <div id="leads-assigned" style="width: 100%; height: 400px;"></div>

        <h1 class="mt-3">Analysis of segments by leads</h1>
        <hr />
        <div id="segment-leads" style="width: 100%; height: 400px;"></div>

        <h1 class="mt-3">Analysis of segments by value</h1>
        <hr />
        <div id="segment-value" style="width: 100%; height: 400px;"></div>
    </div>
</template>

<script>
var leads_submitted_data = [];
var leads_assigned_data = [];
var segment_value_data = [];
var segment_lead_data = [];
export default {
    created() {
        this.fetchdata();
    },

    methods: {
        fetchdata() {
            fetch("myapi/leads-submitted-analytics")
                .then(res => res.json())
                .then(res => {
                    var arr = [];
                    for (const property in res.data) {
                        // console.log(`${property}: ${res.data[property]}`);
                        var temp = [property, res.data[property]];
                        arr.push(temp);
                    }
                    leads_submitted_data = arr;
                    var chart = anychart.pie();
                    chart.data(leads_submitted_data);
                    chart.container("leads-submitted");
                    chart.draw();
                })
                .catch(err => console.log(err));
            fetch("myapi/leads-assigned-analytics")
                .then(res => res.json())
                .then(res => {
                    var arr = [];
                    for (const property in res.data) {
                        // console.log(`${property}: ${res.data[property]}`);
                        var temp = [property, res.data[property]];
                        arr.push(temp);
                    }
                    leads_assigned_data = arr;
                    var chart = anychart.pie();
                    chart.data(leads_assigned_data);
                    chart.container("leads-assigned");
                    chart.draw();
                })
                .catch(err => console.log(err));
            fetch("api/segment-leads-analytics")
                .then(res => res.json())
                .then(res => {
                    var arr = [];
                    for (const property in res.data) {
                        // console.log(`${property}: ${res.data[property]}`);
                        var temp = [property, res.data[property]];
                        arr.push(temp);
                    }
                    segment_lead_data = arr;
                    var chart = anychart.pie();
                    chart.data(segment_lead_data);
                    chart.container("segment-leads");
                    chart.draw();
                })
                .catch(err => console.log(err));
            fetch("api/segment-value-analytics")
                .then(res => res.json())
                .then(res => {
                    var arr = [];
                    for (const property in res.data) {
                        // console.log(`${property}: ${res.data[property]}`);
                        var temp = [property, res.data[property]];
                        arr.push(temp);
                    }
                    segment_value_data = arr;
                    var chart = anychart.pie();
                    chart.data(segment_value_data);
                    chart.container("segment-value");
                    chart.draw();
                })
                .catch(err => console.log(err));
        }
    }
};
</script>
