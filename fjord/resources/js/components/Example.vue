<template>
    <fj-container>
        <fj-navigation />
        <fj-header :title="title" />

        <b-row>
            <b-col>
                <b-card>
                    <div>
                        <b-button variant="primary">Primary</b-button>
                        <b-button variant="secondary">Secondary</b-button>
                        <b-button variant="success">Success</b-button>
                        <b-button variant="danger">Danger</b-button>
                        <b-button variant="warning">Warning</b-button>
                        <b-button variant="info">Info</b-button>
                        <b-button variant="light">Light</b-button>
                        <b-button variant="dark">Dark</b-button>
                    </div>
                    <div class="mt-3">
                        <b-badge variant="primary">Primary</b-badge>
                        <b-badge variant="secondary">Secondary</b-badge>
                        <b-badge variant="success">Success</b-badge>
                        <b-badge variant="danger">Danger</b-badge>
                        <b-badge variant="warning">Warning</b-badge>
                        <b-badge variant="info">Info</b-badge>
                        <b-badge variant="light">Light</b-badge>
                        <b-badge variant="dark">Dark</b-badge>
                    </div>
                </b-card>
            </b-col>
        </b-row>
    </fj-container>
</template>

<script>
export default {
    name: 'Example',
    props: {
        title: {
            required: true,
            type: String
        }
    }
};
</script>
