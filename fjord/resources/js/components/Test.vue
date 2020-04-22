<template>
    <b-col :cols="field.cols" class="text-secondary">
        Ihre Bestellnummer wird angezeigt als #<b>{{ model }}</b
        >1001, #<b>{{ model }}</b
        >1002, #<b>{{ model }}</b
        >1003...
    </b-col>
</template>

<script>
export default {
    name: 'Test',
    props: ['model', 'field']
};
</script>
