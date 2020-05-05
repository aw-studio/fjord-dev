<template>
    <b-col :cols="field.cols" class="text-secondary">
        Input: {{ model[locale].text }}
    </b-col>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    name: 'Test',
    props: ['model', 'field'],
    computed: {
        ...mapGetters(['fallback_locale', 'locale'])
    }
};
</script>
