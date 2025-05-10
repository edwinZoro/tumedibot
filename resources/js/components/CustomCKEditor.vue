<template>
  <div class="custom-ckeditor">
    <textarea :id="editorId" :name="name" v-model="internalValue"></textarea>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      default: ''
    },
    name: {
      type: String,
      default: 'editor'
    }
  },
  data() {
    return {
      editor: null,
      internalValue: this.value,
      editorId: `editor-${Math.random().toString(36).substr(2, 9)}`
    };
  },
  watch: {
    value(newVal) {
      if (newVal !== this.internalValue) {
        this.internalValue = newVal;
        if (this.editor) {
          this.editor.setData(newVal);
        }
      }
    }
  },
  mounted() {
    this.initEditor();
  },
  beforeDestroy() {
    this.destroyEditor();
  },
  methods: {
    initEditor() {
      if (typeof CKEDITOR === 'undefined') {
        console.error('CKEDITOR no está cargado');
        return;
      }

      this.editor = CKEDITOR.replace(this.editorId, {
        toolbar: [
          { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
          { name: 'links', items: ['Link', 'Unlink'] },
          { name: 'lists', items: ['NumberedList', 'BulletedList'] },
          { name: 'tools', items: ['Maximize'] }
        ],
        removePlugins: 'elementspath',
        resize_enabled: false,
        height: 200
      });

      this.editor.setData(this.internalValue);

      this.editor.on('change', () => {
        this.internalValue = this.editor.getData();
        this.$emit('input', this.internalValue);
      });
    },
    destroyEditor() {
      if (this.editor) {
        this.editor.destroy();
        this.editor = null;
      }
    }
  }
};
</script>

<style>
.custom-ckeditor .cke_chrome {
  border: 1px solid #ddd !important;
  box-shadow: none !important;
}

.custom-ckeditor .cke_contents {
  min-height: 200px !important;
}
</style>