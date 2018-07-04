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
        'insert | undo redo | styleselect | italic | forecolor backcolor | quicklink h2 h3 blockquote | link image | bullist numlist outdent indent | removeformat | help'
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
        'insert | undo redo | styleselect | bold italic | forecolor backcolor | quicklink h2 h3 blockquote | link image | bullist numlist outdent indent | removeformat | help'
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

    $('#connectionForm').on('submit', {
      url: "./login/submit"
    }, app.submitForm);

    $('#registrationForm').on('submit', {
      url: "./signup/submit"
    }, app.submitForm);

    $('.report-form').on('submit', {
      url: "./comment/report"
    }, app.submitForm);

  },

  submitForm: function (evt) {
    
    evt.preventDefault();
    var $currentForm = $(this);
    var formData = $currentForm.serialize();
    $.ajax({
      url: evt.data.url,
      method: 'POST',
      dataType: 'json',
      data: formData
    }).done(function (response) {
      console.log(response);
      if (response['url'] != undefined) {
        document.location.href = response['url']

      } else {
        var errors = "";
        $('#errors').show();
        $(response).each(function (index, element) {
          errors += element + '<br>';
        })
        $('#errors').html(errors);
      }

      if (response['reported'] != undefined) {
        // TODO afficher un message dans une balise
        alert('Vous avez bien signalé le commentaire')
        

      }

    }).fail(function () {
      alert('ajax failed');
    });
  },
}

$(app.init);