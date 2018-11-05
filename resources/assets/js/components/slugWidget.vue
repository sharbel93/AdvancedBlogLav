<style scoped>
  .slug-widget{
      display: flex;
      justify-content: flex-start;
      align-items: center;
  }
    .wrapper{
        margin-left: 8px;
    }
    .slug {
        background-color: #fdfd96;
        padding: 3px 5px;
    }
    .input {
        width:auto;
    }
    .url-wrapper {
        display: flex;
        align-items: center;
        height: 28px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

  #slug-editor {
      min-width: 142px;
      max-width: 300px;
  }

</style>

<template>
     <div class="slug-widget">
        <div class="icon-wrapper wrapper">
            <i :class="icon"></i>
        </div>
          <div class="url-wrapper wrapper">
      <span class="root-url">{{urlSanitized}}</span
      ><span class="subdirectory-url">/{{subdirectorySanitized}}/</span
          ><span class="slug" :title="slug" v-show="slug && !isEditing">{{slug}}</span
          ><input type="text" name="slug" id="slug-editor" class="input is-small" v-show="isEditing" v-model="customSlug" @keyup="adjustWidth" @keydown.esc.prevent @keydown.enter.prevent/>
          </div>

         <div class="button-wrapper wrapper">
             <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">{{slug.length < 1 ? 'Create New Slug' : 'Edit'}}</button>
             <b-dropdown hoverable v-show="!isEditing && slug.length > 1">
                 <button class="save-slug-button button is-small" slot="trigger">
                     <span>Actions</span>
                     <b-icon icon="arrow_drop_down"></b-icon>
                 </button>
                 <b-dropdown-item @click="copyToClipboard(fullUrl)" style="font-size: 0.8em;"><b-icon icon="content_copy" size="is-small"></b-icon> Copy Full Url</b-dropdown-item>
                 <b-dropdown-item @click="copyToClipboard(slug)" style="font-size: 0.8em;"><b-icon icon="content_copy" size="is-small"></b-icon> Copy Slug</b-dropdown-item>
                 <b-dropdown-item has-link style="font-size: 0.8em;">
                     <a :href="fullUrl" target="_blank">
                         <b-icon icon="link" size="is-small"></b-icon>
                         Visit Url
                     </a>
                 </b-dropdown-item>
             </b-dropdown>
             <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="saveSlug">Save</button>
             <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="resetEditing">Reset
             </button>
         </div>
     </div>
</template>

<script>
    export default {
        props: {
          url: {
              type: String,
              required:true
          },
            subdirectory: {
              type: String,
              required:true
          },
            title: {
              type: String,
              required:true
          },
            icon: {
              type: String,
                default: "fa fa-link"
            }
        },
        data: function() {
            return {
                // slug: this.convertTitle(),
                slug: this.setSlug(this.title),
                isEditing: false,
                customSlug: '',
                wasEdited: false,
                api_token: this.$root.api_token
            }
        },
        // mounted() {  },
         methods: {
             // convertTitle: function() {
             //     return Slug(this.title)
             // },
             adjustWidth: function(event) {
               const val = event.target.value;
               const key = event.key;
               if (key === "Escape") {
                   event.preventDefault();
                   this.cancelEditing();
               } else if (key === "Enter") {
                   event.preventDefault();
                   this.saveSlug();
               } else {
                   let canvas = document.createElement('canvas');
                   let ctx = canvas.getContext('2d');
                   ctx.font = "14px sans-serif";
                   document.getElementById('slug-editor').style.width = Math.ceil(ctx.measureText(val).width+25)+"px";
               }
             },
             editSlug: function() {
                 this.customSlug = this.slug;
                 this.$emit('edit', this.slug);
                this.isEditing = true;
                // must set timeout to wait for the thread to become available
                window.setTimeout(function () {document.getElementById('slug-editor').focus()}, 0);

             },
             saveSlug: function() {
                 if(this.customSlug !== this.slug){
                     this.wasEdited = true;
                 }
                 // this.slug = Slug(this.customSlug);
                 this.setSlug(this.customSlug);
                 this.$emit('save', this.slug);
                 this.isEditing = false;
             },
             resetEditing: function() {
                 // this.slug = this.convertTitle();
                 this.setSlug(this.title);
                 this.$emit('reset', this.slug);
                 this.wasEdited = false;
                 this.isEditing = false;
             },
             setSlug: function(newVal, count = 0) {
                 //Slugify the newVal
                 if (newVal === '') return '';
                 let slug = Slug(newVal + (count > 0 ? `-${count}` : ''));
                 let vm = this;
                 // test to see if unique
                 if (this.api_token && slug) {
                     axios.get('/api/posts/unique', {
                         params: {
                             api_token: vm.api_token,
                             slug: slug

                         }
                     }).then(function (response) {
                         // if unique, then set the slug and emit event
                         if (response.data) {
                             vm.slug = slug;
                             vm.$emit('slug-changed', slug);
                         } else {
                             // if not, customize the slug to make it uique and test again
                             vm.setSlug(newVal, count + 1)
                         }

                     }).catch(function (error) {
                         console.log(error);
                     });
                 }
             },
             copyToClipboard: function(val) {
                 let temp = document.createElement('textarea');
                 temp.value = val;
                 document.body.appendChild(temp);
                 temp.select();
                 try {
                     let success = document.execCommand('copy');
                     let type = (success ? 'success' : 'warning');
                     let msg = (success ? `Copied to ClipBoard: ${val}` :
                         "Copy failed, your browser may not support this feature");
                     this.$emit('copied', type, msg, val);
                     console.log("Copied to CLipboard: ", val);

                 } catch (err){
                     this.$emit('copy-failed', val);
                     console.log("Copy failed, your browser may not support this feature");
                     console.log("Attempted to copy: ", val);
                 }
                 document.body.removeChild(temp);
             }
         },
        computed: {

              urlSanitized: function() {
                  return this.url.replace(/^\/|\/$/g, '');
              },
              subdirectorySanitized: function() {
                  return this.subdirectory.replace(/^\/|\/$/g, '');
              },
              fullUrl: function() {
                  return `${this.urlSanitized}/${this.subdirectorySanitized}/${this.slug}`;
              }

        },
        watch: {
            title: _.debounce(function() {
                if(this.wasEdited === false) {
                     // this.slug =this.convertTitle()
                    this.setSlug(this.title);
                }
                // run ajax to see if slug is unique
                //if not unique, customize the slug to make it unique
                 }, 250)
            // ,
            // slug: function(val) {
            //     this.$emit('slug-changed', this.slug)
            // }
        }
    }
</script>
