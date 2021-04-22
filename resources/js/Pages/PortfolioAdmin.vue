<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Portfolio
            </h2>
        </template>
        
        <dialog-modal :max-width="'3xl'" @close="close()" v-if="modals.project.create" :show="modals.project.create" :title="'Nouveau projet'" :action="'create-project'" :_token="_token"></dialog-modal>


        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-8 overflow-x-scroll">
                    <p class="text-2xl font-bold inline-block mr-6">Projets</p>
                    <button @click="showCreateProject()" class="bg-transparent hover:bg-myBlue text-myBlue font-semibold hover:text-white py-2 px-4 border border-myBlue hover:border-transparent rounded">Nouveau projet</button>

                    {{ content }}
                </div>
            </div>
        </div>

        <!--<div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-html="content" id="editor" class="bg-white shadow-xl sm:rounded-lg p-8 ">
                    
                </div>
            </div>
        </div>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg p-8 overflow-x-scroll">

                    <form method="post">
                        <editor
                            api-key="sgxf1ralsaej5hjevdyn8ijnf450tkyfqz9bjshicnibtc3a"

                            :init="{
                                height: 500,
                                menubar: true,

                                image_advtab: true,
                                image_uploadtab: true,

                                plugins: [
                                    'advlist autolink autosave lists link image charmap',
                                    'searchreplace visualblocks code fullscreen',
                                    'print preview anchor insertdatetime media',
                                    'paste code help wordcount', 
                                    'table emoticons anchor charmap codesample hr importcss preview print save searchreplace visualblocks'
                                ],
                                toolbar:
                                    'undo redo | formatselect | bold italic underline forecolor backcolor | \
                                    alignleft aligncenter alignright alignjustify outdent indent | \
                                    bullist numlist table image media link | emoticons  codesample hr importcss  searchreplace visualblocks preview print save | help',

                                images_upload_url: '/upload-image', //url pour upload l'image
                                image_prepend_url: '../img/portfolio/', // début d'url avant le nom de l'image
                                images_reuse_filename: false,
                                images_upload_credentials: true, // permet de modifier la fonction d'envoie de base
                                images_upload_handler: example_image_upload_handler, // fonction changée

                                autosave_interval: '20s', // interval d'auto-sauvegarde (non fonctionnel)
                                autosave_restore_when_empty: true, // récupère la sauvegarde automatiquement (non fonctionnel)
                                //save_onsavecallback: saveEditorContent, <-- fonction à créer pour enregistrer le contenu de l'éditeur + le reste des infos

                                //content_css: '../css/showEditorContent.css', // fichier css qui formate le contenu
                                extended_valid_elements : elementConfig,

                                
                                
                                color_map: [
                                    '212121', 'Black',
                                    '374151', 'Gray',
                                    '6B7280', 'GrayMedium',
                                    'D1D5DB', 'GraySmall',
                                    'FFFFFF', 'White',
                                    'F87171', 'Red',
                                    'FFD166', 'Yellow',
                                    '06D6A0', 'Green',
                                    '00C0FF', 'Blue',
                                    'FF9900', 'Orange',
                                    'C489F3', 'Pink'
                                ],
                                
                            }"

                            tinymce-script-src="../../../node_modules/"
                            v-model="content"
                        >
                        </editor>
                    </form>

                </div>
            </div>
        </div>-->
    </app-layout>

</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Editor from '@tinymce/tinymce-vue'
    import DialogModal from '../Jetstream/DialogModal'

    export default {
        components: {
            AppLayout,
            editor: Editor,
            DialogModal,
        },
        props: {
            _token: String,
        },
        data() {
            return {
                  content: '',
                  elementConfig: [
                    // title
                    'h1[class=text-5xl font-bold text-gray-900]',
                    'h2[class=text-4xl font-bold text-gray-900]',
                    'h3[class=text-3xl font-bold text-gray-900]',
                    'h4[class=text-2xl font-bold text-gray-900]',
                    'h5[class=text-xl font-bold text-gray-900]',
                    'h6[class=text-lg font-bold text-gray-900]',

                    // text
                    'p[class=text-gray-600]',
                    'a[class=hover:underline duration-300 cursor-pointer]',

                    // table
                    'tr[class=border-b border-gray-500]',
                    'td[class=border-r border-gray-500 pl-4]',

                  ],
                  modals: {
                      project: {
                          create: false,
                          update: false,
                          delete: false,
                      }
                  }
            }
        },
        mounted(){
            console.log(this._token)
        },
        methods: {
            example_image_upload_handler (blobInfo, success, failure, progress) {
                                
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/upload-image');
                var token = this._token;
                console.log(token)
                xhr.setRequestHeader("X-CSRF-Token", token);

                xhr.upload.onprogress = function (e) {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = function() {
                    var json;

                    if (xhr.status === 403) {
                    failure('HTTP Error: ' + xhr.status, { remove: true });
                    return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                    }

                    success(json.location);
                    console.log(json)
                };

                xhr.onerror = function () {
                    failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                var formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                //formData.append('X-CSRF-TOKEN', this.$page.props.csrf_token);

                xhr.send(formData);
            },
            showCreateProject(){
                if(!this.modals.project.create){
                    this.modals.project.create = true;
                }
            }
        }
    }
</script>

<style scoped>
#editor *{
  font-family: 'Hind' !important;
}

#editor h1{
  font-weight: 700;
  font-size: 3rem;
  line-height: 1;
  margin: 0;
  color: #111827;
  }
#editor h2{
  font-weight: 700;
  font-size: 2.25rem;
  line-height: 2.5rem;
  margin: 0;
  color: #111827;
}
#editor h3{
  font-weight: 700;
  font-size: 1.875rem;
  line-height: 2.25rem;
  margin: 0;
  color: #111827;
}
#editor h4{
  font-weight: 700;
  font-size: 1.5rem;
  line-height: 2rem;
  margin: 0;
  color: #111827;
}
#editor h5{
  font-weight: 700;
  font-size: 1.25rem;
  line-height: 1.75rem;;
  margin: 0;
  color: #111827;
}
#editor h6{
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.75rem;
  margin: 0;
  color: #111827;
}
#editor p{
  margin: 0;
  color: red;
  /*color: #4B5563;*/
}
#editor ul, #editor ol{
    list-style: disc !important;
    list-style-type: disc !important;
}

tr{
    border-bottom: 1px solid #4B5563;
}
</style>