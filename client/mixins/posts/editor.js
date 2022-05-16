import Editor from '@tinymce/tinymce-vue'
export const editor = {
  components: {
    editor: Editor,
  },
  data() {
    return {
      lang: 'ja', // 現在の言語
      init: {
        // 基本設定
        language: '',
        height: 500,
        menubar: false,
        spellcheck: true,
        body_class: 'reshelf-editor',
        selector: 'textarea',
        // toc
        toc_header: 'div',
        toc_class: 'reshelf-toc',
        toc_depth: 6,
        // plugins
        plugins: [
          'print preview paste importcss blockquote searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc tocupdate insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        ],
        // toolbar
        toolbar:
          'formatselect | underline strikethrough forecolor backcolor | alignleft aligncenter alignright | bullist numlist | link | toc tocupdate | charmap emoticons | help',
        // insert_toolbar
        // insert_toolbar: 'quickimage quicktable emoticons',
        // quick_toolbar
        quickbars_insert_toolbar: 'quickimage quicktable codesample',
        // color_map
        color_map: [
          '#BFEDD2',
          'Light Green',
          '#FBEEB8',
          'Light Yellow',
          '#F8CAC6',
          'Light Red',
          '#ECCAFA',
          'Light Purple',
          '#C2E0F4',
          'Light Blue',

          '#2DC26B',
          'Green',
          '#F1C40F',
          'Yellow',
          '#E03E2D',
          'Red',
          '#B96AD9',
          'Purple',
          '#3598DB',
          'Blue',

          '#169179',
          'Dark Turquoise',
          '#E67E23',
          'Orange',
          '#BA372A',
          'Dark Red',
          '#843FA1',
          'Dark Purple',
          '#236FA1',
          'Dark Blue',

          '#ECF0F1',
          'Light Gray',
          '#CED4D9',
          'Medium Gray',
          '#95A5A6',
          'Gray',
          '#7E8C8D',
          'Dark Gray',
          '#34495E',
          'Navy Blue',

          '#000000',
          'Black',
          '#ffffff',
          'White',
        ],
        // markdown
        textpattern_patterns: [
          { start: '*', end: '*', format: 'italic' },
          { start: '**', end: '**', format: 'bold' },
          { start: '#', format: 'h1' },
          { start: '##', format: 'h2' },
          { start: '###', format: 'h3' },
          { start: '####', format: 'h4' },
          { start: '#####', format: 'h5' },
          { start: '######', format: 'h6' },
          // { start: '> ', format: 'blockquote' },
          { start: '1. ', cmd: 'InsertOrderedList' },
          { start: '* ', cmd: 'InsertUnorderedList' },
          { start: '- ', cmd: 'InsertUnorderedList' },
          // { start: '//brb', replacement: 'Be Right Back' },
        ],
        // codesample
        codesample_languages: [
          { text: 'HTML/XML', value: 'markup' },
          { text: 'JavaScript', value: 'javascript' },
          { text: 'CSS', value: 'css' },
          { text: 'PHP', value: 'php' },
          { text: 'Ruby', value: 'ruby' },
          { text: 'Python', value: 'python' },
          { text: 'Java', value: 'java' },
          { text: 'C', value: 'c' },
          { text: 'C#', value: 'csharp' },
          { text: 'C++', value: 'cpp' },
        ],
        // link
        default_link_target: '_blank',
        link_assume_external_targets: true,
        link_quicklink: true,
        // image upload
        images_upload_credentials: true,
        images_reuse_filename: true,
        // list
        advlist_bullet_styles: 'disc',
        advlist_number_styles: 'lower-alpha',
      },
    }
  },
  mounted() {
    this.init.language = this.lang // 現在の言語を入れる
  },
}
