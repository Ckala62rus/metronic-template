<template>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom rdp_statistic_mg">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title flex-row flex-row-fluid flex-center justify-content-between">
                                <h3 class="card-label">
                                    Редактировать статью
                                </h3>
                                <Link :href="route('metronic.lesson.index')" as="button" method="get" class="btn btn-primary font-weight-bolder">Назад</Link>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form @submit.prevent="saveLesson">
                        <div class="card-body">
                            <div class="form-group mb-8">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        Сдесь вы можете отредактировать статью
                                    </div>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label>Заголовок статьи<span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.title" class="form-control" :class="{'is-invalid': errors.errorTitle}"  placeholder="Введите название статьи"/>
                                    <div class="invalid-feedback">Заголовок обязателен!</div>
                                </div>

                                <div class="form-group">
                                    <label>Описание статьи<span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.description" class="form-control" :class="{'is-invalid': errors.errorDescription}"  placeholder="Введите описание статьи"/>
                                    <div class="invalid-feedback">Описание статьи обязателено!</div>
                                </div>

                                <div class="form-group" >
                                    <div v-show="errors.errorText" style="color: red">Статья не может быть пеустой!</div>
                                    <editor
                                        api-key="pimvicjtxnosbo72b7zyixgqgvs7ka37ptz0ue5572hi9tzt"
                                        :init="init"
                                        v-model="form.text"
                                    />
                                </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success mr-2">Создать</button>
                            <Link :href="route('metronic.lesson.index')" as="button" method="get" class="btn btn-primary font-weight-bolder">Назад</Link>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import Editor from  "@tinymce/tinymce-vue";

export default {
    name: "LessonCreate",

    components: {
        Link,
        Editor
    },

    props: {
        id: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            init: {
                height: 500,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize |  bold italic underline strikethrough codesample | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                file_picker_callback : this.elFinderBrowser,
                relative_urls: false,
                document_base_url : 'http://template/',
                convert_urls : true,
            },
            form: {
                title: '',
                description: '',
                text: '',
            },
            errors: {
                errorTitle: false,
                errorDescription: false,
                errorText: false,
            },
        }
    },

    methods: {
        elFinderBrowser (callback, value, meta) {
            tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: '/elfinder/tinymce5',
            /**
             * On message will be triggered by the child window
             *
             * @param dialogApi
             * @param details
             * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
             */
                onMessage: function (dialogApi, details) {
                    if (details.mceAction === 'fileSelected') {
                        const file = details.data.file;

                        // Make file info
                        const info = file.name;

                        // Provide file and text for the link dialog
                        if (meta.filetype === 'file') {
                            callback(file.url, {text: info, title: info});
                        }

                        // Provide image and alt text for the image dialog
                        if (meta.filetype === 'image') {
                            callback(file.url, {alt: info});
                        }

                        // Provide alternative source and posted for the media dialog
                        if (meta.filetype === 'media') {
                            callback(file.url);
                        }

                        dialogApi.close();
                    }
                }
            });
        },
        saveLesson(){
            this.resetErrors();

            axios.put('/dashboard/lessons/' + this.id, this.form)
                .then(response => {
                    console.log(response);
                    window.location.href = '/dashboard/lessons';
                })
                .catch(err => {
                    let errors = err.response.data.errors
                    if (err.response.status === 422) {
                        this.errors = {
                            errorTitle: errors.hasOwnProperty('title'),
                            errorDescription: errors.hasOwnProperty('description'),
                            errorText: errors.hasOwnProperty('text'),
                        };
                    }
                })
        },

        resetErrors(){
            this.errors = {
                errorText: false,
                errorDescription: false,
                errorTitle: false
            };
        },

        getLesson(id){
            axios.get('/dashboard/lessons/' + id)
            .then(resp => {
                let lesson = resp.data.data.lesson;

                this.form.title = lesson.title;
                this.form.description = lesson.description;
                this.form.text = lesson.text;
            })
        },
    },

    mounted() {
        this.getLesson(this.id);
    }
}
</script>

<style scoped>

</style>
