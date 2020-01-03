  var image_row = 0;

  function addImage() {
      html = '<tr id="image-row' + image_row + '">';
      html += '<td class="text-left"><a href="" id="thumb-image' + image_row + '"data-toggle="image" class="img-thumbnail"><img id="blah" style="width:111px; height:111px;" src="http://www.thinkpad.com.vn/public/backend/images/icons8-upload-48.png"  title="" data-placeholder="http://www.thinkpad.com.vn/public/backend/images/icons8-upload-48.png" /></a><input class="file" type="hidden" name="product_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" /></i></td>';
      html += '<td class="text-right"><input type="text" name="product_image[' + image_row + '][sort_order]" value="" placeholder="Sort Order" class="form-control" /></td>';
      html += '<td class="text-left"><input class="file" type="file" onclick="$(\'#image-row' + image_row + '\').readURL(this);" /><button type="button" onclick="$(\'#image-row' + image_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
      html += '</tr>';

      $('#images tbody').append(html);

      image_row++;
  }

  function readURL(input) {
      var i = 0;
      if (input.files && input.files[i]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[i]);
      }
      $("#imgInp").change(function() {
          readURL(this);
      });
      i++;
  }