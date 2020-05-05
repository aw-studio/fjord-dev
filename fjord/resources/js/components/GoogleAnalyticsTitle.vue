<template>
    <h6>
        Google Analytics Id
        <b-badge>{{ gid }}</b-badge>
    </h6>
</template>

<script>
export default {
    name: 'GoogleAnalyticsTitle',
    props: {
        field: {},
        model: {}
    },
    computed: {
        gid() {
            let code = this.model[this.field.id];
            let split = this.model[this.field.id].split('src="')[1];
            if (split.length < 2) {
                return;
            }
            let src = split.split('"')[0];
            return src.split('id=')[1];
        }
    }
};
</script>
