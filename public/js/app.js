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
        'insert | undo redo | bold italic | fontselect fontsizeselect | forecolor backcolor | quicklink h2 h3 blockquote | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
      ],
      font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
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
        'insert | undo redo | bold italic | fontselect fontsizeselect | forecolor backcolor | quicklink h2 h3 blockquote | link image | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
      ],
      font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
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
      url: "./post/comment/report"
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

      // Si le retour json comprend la réponse reported, affichage d'un message de confirmation
      if (response['reported'] != undefined) {
        // TODO afficher un message dans une balise
        // alert('Vous avez bien signalé le commentaire')
        $('#alertBox').modal('show');
        $('#alertBox-text').text('Le commentaire a bien été signalé !');
      }
    }).fail(function () {
      $('#alertBox').modal('show');
      $('#alertBox-text').text('Une erreur est survenue !');
    });
  },
}

$(app.init);