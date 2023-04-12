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
                                    v-model="form.role.name"
                                    :class="{'is-invalid': errors.roleName}"
                                />
                                <div class="invalid-feedback">Название роли обязательно!</div>
                            </div>

                            <label v-if="permissions.lesson" class="col-3 col-form-label">lessons</label>
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

                            <label v-if="permissions.user" class="col-3 col-form-label">user</label>
                            <div class="form-group row" v-for="permission in permissions.user">
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

    data() {
        return {
            form: {
                role: {
                    name: ''
                },
                permissions: []
            },
            errors: {
                roleName : false,
                roleNameError : '',
            },
            permissions: {},
        }
    },

    methods: {
       createRole(){
           this.resetErrors()

           axios.post('/admin/role', this.form)
               .then(res => {
                   if (res.status === 201){
                       this.$notify({
                           title: "Создание роли",
                           text: "Роль создана!",
                           speed: 1000,
                           duration: 1000,
                           type: 'success'
                       });
                       this.$inertia.visit('/admin/role')
                   }
               })
               .catch(err => {
                       let errors = err.response.data.errors

                       if (err.response.status === 422) {
                           this.errors = {
                               roleName: !!errors['role.name'],
                               roleNameError: errors['role.name'].length > 0 ? errors['role.name'][0] : '',
                           }
                           this.$notify({
                               title: "Ошибка",
                               text: "Заполните название роли",
                               speed: 1000,
                               duration: 1000,
                               type: 'error'
                           });
                       }
               })
       },

        getPermissions(){
           axios.get('/admin/permission')
               .then(response => {
                   this.permissions = response.data.data.permissions;
               })
        },

        resetErrors(){
            this.errors = {
                roleName: false,
                roleNameError: ''
            };
        },

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
