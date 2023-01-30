<template>
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card-header">
                        <h3 class="card-title">
                            Редактирование роли
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
                                    v-model="form.role.name"
                                    :class="{'is-invalid': errors.errorName}"
                                />
                                <div class="invalid-feedback">Название обязательно!</div>
                            </div>

                            <div class="form-group row" v-for="permission in permissions.lesson">
                                <label class="col-3 col-form-label">{{permission.name}}</label>
                                <div class="col-3">
                                    <span class="switch switch-sm">
                                        <label>
                                            <input type="checkbox" v-model="form.permissions" :value="permission.id"/>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
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

    props: {
        id: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            form: {
                role: {
                    name: ''
                },
                permissions: []
            },
            errors: {},
            permissions: {},
        }
    },

    methods: {
       createRole(){
           axios.put(`/dashboard/role/${this.id}`, this.form)
               .then(res => {
                   if (res.status === 200){
                       this.$notify({
                           title: "Обновление роли",
                           text: "Роль обновлена!",
                           speed: 1000,
                           duration: 4000,
                           type: 'success'
                       });
                   }
                   this.$inertia.visit('/dashboard/role')
               })
               .catch(err => {
                   console.log(err)
               })
       },

        getPermissions(){
           axios.get('/dashboard/permission')
               .then(response => {
                   this.permissions = response.data.data.permissions;
               })
        },

        getRoleById(){
           axios.get(`/dashboard/role/${this.id}`)
               .then(responce => {
                   let role = responce.data.data.role;
                   this.form.role.name = role.name;
                   this.form.permissions = role.permissions;
               })
        },

    },

    mounted() {
        this.getPermissions();
        this.getRoleById();
    }
}
</script>

<style scoped>
    .height-profile {
        height: 100%;
    }
</style>
