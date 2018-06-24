var app = {

  init: function () {
    console.log('init');
    
    tinymce.init({
      selector: '#title-post-editor',
      theme: 'modern',
      theme_url: '/programmation/Développeur_web_formation/P4_Blog/public/tinymce/js/tinymce/themes/modern/theme.js',
      branding: false,
      height: 100,
      min_height: 80,
      skin: 'lightgray',
      mode: 'textareas',
      preview_styles: 'font-size color',
      plugins: [
        'advlist autolink lists link charmap print preview anchor textcolor colorpicker',
        'searchreplace visualblocks code fullscreen ',
        'insertdatetime media table contextmenu paste code help wordcount '
      ],
      toolbar: [
        'insert | undo redo | formatselect | styleselect | bold italic | forecolor backcolor | quicklink h2 h3 blockquote | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
      ],
      content_css: [
        ' //fonts.googleapis.com/css?family=Lato:300,300i,400,400i', '//www.tinymce.com/css/codepen.min.css'
      ],
      mobile: {
        theme: 'mobile',
        theme_url: '/programmation/Développeur_web_formation/P4_Blog/public/tinymce/js/tinymce/themes/mobile/theme.js',
        plugins: ['autosave', 'lists', 'autolink'],
        toolbar: ['undo', 'bold', 'italic', 'styleselect']
      }
    });

    tinymce.init({
      selector: '#content-post-editor',
      theme: 'modern',
      theme_url: '/programmation/Développeur_web_formation/P4_Blog/public/tinymce/js/tinymce/themes/modern/theme.js',
      branding: false,
      height: 500,
      min_height: 80,
      skin: 'lightgray',
      mode: 'textareas',
      preview_styles: 'font-size color',
      plugins: [
        'advlist autolink lists link charmap print preview anchor textcolor colorpicker',
        'searchreplace visualblocks code fullscreen ',
        'insertdatetime media table contextmenu paste code help wordcount '
      ],
      toolbar: [
        'insert | undo redo | formatselect | styleselect | bold italic | forecolor backcolor | quicklink h2 h3 blockquote | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
      ],
      content_css: [
        ' //fonts.googleapis.com/css?family=Lato:300,300i,400,400i', '//www.tinymce.com/css/codepen.min.css'
      ],
      mobile: {
        theme: 'mobile',
        theme_url: '/programmation/Développeur_web_formation/P4_Blog/public/tinymce/js/tinymce/themes/mobile/theme.js',
        plugins: ['autosave', 'lists', 'autolink'],
        toolbar: ['undo', 'bold', 'italic', 'styleselect']
      }
    });
  },
}

$(app.init);