<template>
    <div class="container">

    </div>
</template>

<script>
    export default {
        mounted() {
            axios
                .get('http://localhost:9080/api/api-test')
                .then(({ data }) => {
                    console.log(data);
                });
        }
    }
</script>
