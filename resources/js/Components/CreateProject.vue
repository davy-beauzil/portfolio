<template>
<div>
  <form enctype="multipart/form-data">
    <div class="flex flex-col mb-4">
      <label for="title">Titre</label>
      <input v-model="projectToCreate.title" type="text" name="title" class="rounded">
    </div>

    <div class="flex flex-col mb-4">
      <label for="description">Description</label>
      <textarea v-model="projectToCreate.description" name="description" class="rounded"></textarea>
    </div>

    <div class="flex flex-col mb-4">
      <label for="image">Image</label>
      <input @change="onFileChange($event)" name="image" type="file" accept="image/*" class="rounded">
    </div>

    <div class="flex flex-row mb-4">
      <label for="visible">Visible</label>
      <input v-model="projectToCreate.visible" name="visible" type="checkbox" class="rounded ml-2 mt">
    </div>

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
              bullist numlist table image media link | emoticons  codesample hr importcss  searchreplace visualblocks preview print save | help code',

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
      v-model="projectToCreate.content_html"></editor>
      <input type="button" value="Créer" class="rounded mt-4 px-4 py-2" @click="createProject(); $emit('close')">
  </form>

   <div class="py-6 flex justify-center">
        <div class="bg-white shadow-xl sm:rounded-lg p-8 overflow-x-scroll" style="width: 100%; max-width: 1200px;">
          <div class="flex flex-row justify-between items-center">
            <titre :title="projectToCreate.title" :class="'blue mb-8'"></titre>
            <p class="hover:text-myBlue flex flex-row" style="border:0;"><svg style="transform: translateY(-1px); margin-right: 4px;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left fa-w-14 w-4 h-4"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg> Retour</p>
          </div>
          
          <p class="text-justify">{{ projectToCreate.description }}</p>
          <hr class="my-8">
          <div id="editor" v-html="projectToCreate.content_html"></div>
        </div>
    </div>
</div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue'
import Titre from '../Components/Title'

export default {
  components: {
    Editor,
    Titre,
  },
  props: {
    _token: {
      default: null
    },
  },
  mounted() {
    console.log('create project : ' + this._token)
  },
  data() {
      return {
        content: '',
        elementConfig: [
          // title
          'h1[class=text-5xl font-bold text-gray-900 mb-4]',
          'h2[class=text-4xl font-bold text-gray-900 mb-4]',
          'h3[class=text-3xl font-bold text-gray-900 mb-4]',
          'h4[class=text-2xl font-bold text-gray-900 mb-4]',
          'h5[class=text-xl font-bold text-gray-900 mb-4]',
          'h6[class=text-lg font-bold text-gray-900 mb-4]',

          // text
          'p[class=text-gray-600 mb-2]',
          'a[class=hover:underline duration-300 cursor-pointer text-myBlue]',

          // table
          'tr[class=border-b border-gray-500]',
          'td[class=border-r border-gray-500 pl-4]',

        ],
        projectToCreate: {
          title: '',
          description: '',
          image: '',
          visible: '',
          content_html: '',
        }

      }
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
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length) return;
        this.projectToCreate.image =  files[0];
        console.log(this.projectToCreate.image.type)
      },
      createProject(){
        console.log(this.projectToCreate.image)
        this.$inertia.post('/create-project', this.projectToCreate, { preserveScroll: true });
        this.projectToCreate.title = '';
        this.projectToCreate.description = '';
        this.projectToCreate.visible = '';
        console.log(this.projectToCreate.image)
        this.projectToCreate.image = '';
        this.projectToCreate.content_html = '';
        console.log(this.projectToCreate.image)
      }
  }
}
</script>

<style scoped>

</style>