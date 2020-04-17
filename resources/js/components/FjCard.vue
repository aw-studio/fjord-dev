<template>
    <b-col :cols="cols">
        <b-card :title="title">
            Hallo
        </b-card>
    </b-col>
</template>

<script>
import EloquentModel from 'fjord-eloquent-js';

export default {
    name: 'FjCard',
    props: {
        cols: {},
        title: {}
    }
};
</script>
