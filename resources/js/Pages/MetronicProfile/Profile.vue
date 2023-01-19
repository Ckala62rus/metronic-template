<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card-header">
                        <h3 class="card-title">
                            Мой профиль
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <!--            <div class="col-md-6">-->
                    <form>
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        Сдесь вы можете отредактировать данные о своем профиле
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control"  placeholder="Enter email"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-primary mr-2">SAVE</button>
<!--                            <button type="reset" class="btn btn-secondary">Cancel</button>-->
                            <Link :href="route('dashboard')" as="button" method="get" class="btn btn-secondary font-weight-bolder">Cancel</Link>
                        </div>
                    </form>
                </div>
                <!--end::Form-->
            </div>

            <div class="col-md-6">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card-header">
                        <h3 class="card-title">
                            Обновление пароля
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form>
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        Убедитесь, что ваша учетная запись использует длинный случайный пароль, чтобы оставаться в безопасности.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Текущий пароль<span class="text-danger">*</span></label>
                                <input type="email" class="form-control"  placeholder="Enter email"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Новый пароль<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword3">Подтверждение пароля<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password"/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-primary mr-2">SAVE</button>
                        </div>
                    </form>
                </div>
                <!--end::Form-->

            </div>

            <div class="col-md-12 mt-5 mb-5">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card-header">
                        <h3 class="card-title">
                            Удаление аккаунта
                        </h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <!--            <div class="col-md-6">-->
                    <form>
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        После удаления вашей учетной записи все ее ресурсы и данные будут безвозвратно удалены.
                                        Перед удалением своей учетной записи загрузите любые данные или информацию, которые вы хотите сохранить.
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-danger mr-2">DELETE ACCOUNT</button>
                            </div>
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
    name: "Profile",
    components: {
        Link
    },
}
</script>

<style scoped>

</style>
