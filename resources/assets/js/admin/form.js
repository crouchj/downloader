module.exports = function() {
  // General Form functionality
  $('form .submit-button').each(function() {
    $(this).on('click', function() {
      $(this).parents('form').submit();
    });
  });

  // Image upload
  if ($('input[type="file"].image-upload').length) {
    var $imagePreview = $('.image-preview');

    $('input[type="file"].image-upload').change(function(event) {
      $(this).nextAll('.file-name').removeClass('empty').text($(this).val().replace("C:\\fakepath\\", ""));

      var files = event.target.files;
      var image = files[0];
      var reader = new FileReader();
      reader.onload = function(file) {
        var img = new Image();
        img.src = file.target.result;
        $imagePreview.prepend(img);
        $(img).on('load', function() {
          $(img).parents('.form-group').find('.icon-image').addClass('shadowed').hide();
          var inputHeight = $(img).height();

          // handle portrait/landscape
          if ($(img).height() > $(img).width()) {
            $(img).css({
              'max-height': previewHeight,
              'height': '100%',
              'width': 'auto'
            });
          } else {
            $(img).css({
              'height': 'auto',
              'width': '100%'
            });
          }
        })
      };
      reader.readAsDataURL(image);
    });
  }

  // Zipfile upload
  if ($('input[name="zipfile"]').length) {
    $('input[name="zipfile"]').each(function() {
      if ($(this).val() != '') {
        $(this).nextAll('.filename').text($(this).val().replace("C:\\fakepath\\", ""));
      } else {
        $(this).nextAll('.filename').html('&nbsp;');
      }

      $(this).on('change', function(event) {
        $('.filename').text($(this).val().replace("C:\\fakepath\\", ""));
      });
    });
  }

  /***********************
   ** Form UI components
   ***********************/

  /*** datepickers */
  // $('input.date').datepicker();

  /*** comboboxes */
  if ($('select.combobox').length) {
    $('select.combobox').combobox();

    $('select.combobox ~ input.ui-autocomplete-input').each(function() {
      if ($(this).prev('select[name=artist]').length) {
        $(this).addClass('artist-name');
        $(this).attr('placeholder', 'Artist');
      }

      $(this).siblings('button').on('click', function(e) {
        e.preventDefault();
      });
    });
  }

  /*** Chosen.js multi select boxes */
  if ($('.chosen-select').length) {
    $('.chosen-select').chosen({
      no_results_text: "Oops, nothing found!",
      placeholder_text_multiple: $(this).data('placeholder'),
      search_contains: true,
      width: "100%"
    });

    // update chosen list when item is removed
    $('.chosen-select').on('change', function(evt, params) {
      if (params.deselected) {
        $this = $(this);
        $this.trigger('chosen:updated');
        $this.siblings('.chosen-container').find('.chosen-choices .search-field input[type=text]').click();
      }
    });
  }

};
