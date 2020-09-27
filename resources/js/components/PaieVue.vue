<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary ">
                    <div class="card-header text-primary ">Tout Les Fiches</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="employer in employers" :key="employer.id">
                                {{employer.id}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employers: {}
        };
    },
    created() {
        axios
            .get("http://127.0.0.1:8000/admin/paie#/")
            .then(response => (this.employers = response))
            .catch(error => console.log(error));
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
