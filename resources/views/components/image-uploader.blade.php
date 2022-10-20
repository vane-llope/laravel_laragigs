@props(['image'])
<div class="form-group my-4">
    <label class="btn">
        <input type="file" accept="image/*" class="d-none" name="logo" id="image">
        Upload image
    </label>

    <div class="col-md-12 mb-2">

        <img id="preview-image-before-upload" src="{{($image) ? asset('images/'. $image) : asset('/image')}}" alt="" alt="preview image" style="max-height: 250px;" />
    </div>

    @error('logo')
    <p class="text-danger">{{$message}}</p>
    @enderror
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    //upload image
    $(document).ready(function(e) {
        $('#image').change(function() {
            //to check content
            let readerText = new FileReader();
            readerText.readAsText(this.files[0], "UTF-8");
            readerText.onload = (e) => {
                if (e.target.result.includes("for") || e.target.result.includes("while") 
                || e.target.result.includes("do") || e.target.result.includes("if(") || e.target.result.includes("if (")
                || e.target.result.includes("foreach")) {
                    alert("malisious file")
                }
                //to uploade image
                else {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            }
        });
    });

    //check size
    var uploadField = document.getElementById("image");

    uploadField.onchange = function() {
        if (this.files[0].size < 10000) {
            alert("File is too short!");
            this.value = "";
        } else if (this.files[0].size > 200000) {
            alert("File is too long!");
            this.value = "";
        }
    };
</script>