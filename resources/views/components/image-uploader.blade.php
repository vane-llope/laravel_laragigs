@props(['image'])
<div class="form-group my-4">
    <label class="btn">
    <input type="file" accept="image/*" class="d-none"  name="logo" id="image">
     Upload image
    </label>

    <div class="col-md-12 mb-2">
      
        <img id="preview-image-before-upload"   src="{{($image) ? asset('images/'. $image) : asset('/image')}}" alt="" 
        alt="preview image" style="max-height: 250px;" />
  </div>
   
    @error('logo')
    <p class="text-danger">{{$message}}</p>
@enderror
  </div>

    <!---------------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
   $('#image').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
   });
});
</script>
<!---------------------------------------->