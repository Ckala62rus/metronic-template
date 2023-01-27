<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card-header">
                        <h3 class="card-title">
                            Создание роли
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>

                    <form @submit.prevent="createRole">
                        <div class="card-body">
                            <div class="form-group mb-8">
                            </div>
                            <div class="form-group">
                                <label>Название роли <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Your name"
                                    v-model="form.name"
                                    :class="{'is-invalid': errors.errorName}"
                                />
                                <div class="invalid-feedback">Название обязательно!</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mr-2">Создать</button>
                            <Link :href="route('metronic.role.index')" as="button" method="get" class="btn btn-primary font-weight-bolder">Назад</Link>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "RoleCreate",

    components: {
        Link
    },

    data() {
        return {
            form: {
                name: '',
                permissions: []
            },
            errors: {},
            permissions: {},
        }
    },

    methods: {
       createRole(){
           console.log(this.form)
           // axios.put('/dashboard/user/' + this.id, this.form_profile)
           //     .then(res => {
           //         // if (res.status === 201){
           //         //     this.$notify({
           //         //         title: "Создание пользователя",
           //         //         text: "Пользователь создан!",
           //         //         speed: 1000,
           //         //         duration: 1000,
           //         //         type: 'success'
           //         //     });
           //         // }
           //         console.log(res)
           //     })
           //     .catch(err => {
           //         console.log(err)
           //     })
       },

        getPermissions(){
           axios.get('/dashboard/permission')
               .then(response => {
                   this.permissions = response.data.data.permissions;
               })
        }

    },

    mounted() {
        this.getPermissions();
    }
}
</script>

<style scoped>
    .height-profile {
        height: 100%;
    }
</style>
