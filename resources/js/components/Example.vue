<template>
    <fj-base-container>
        <fj-base-header :title="title" />

        <b-row>
            <b-col>
                <b-card>
                    {{ employees[0].name }}
                </b-card>
            </b-col>
        </b-row>
    </fj-base-container>
</template>

<script>
import EloquentModel from "fjord-eloquent-js";

export default {
    name: "Example",
    props: {
        title: {
            required: true,
            type: String
        },
        eloquent: {
            required: true,
            type: Object
        }
    },
    beforeMount() {
        this.employees = new EloquentModel(this.eloquent.employees);
    },
    data() {
        return {
            employees: {}
        };
    },
    async mounted() {
        let employee = this.employees[0];

        employee.first_name = "Karsten";
        await employee.save();
    }
};
</script>
