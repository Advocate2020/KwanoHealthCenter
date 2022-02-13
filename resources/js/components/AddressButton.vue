<template>
    <div>
        <button class="btn btn-primary" @click="getAddress">Add Address</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')

        },
        methods: {
            getAddress() {
                axios.post('/patient/' + this.userId + '/address/create')
                    .then(response => {
                        this.status = ! this.status;
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },


    }

</script>
