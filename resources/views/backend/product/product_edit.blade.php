@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Edit Product</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('product-update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">

                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ $brand->id ==
                                                            $products->brand_id ? 'selected':'' }} >{{
                                                            $brand->brand_name_en }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id ==
                                                            $products->category_id ? 'selected':'' }}>{{
                                                            $category->category_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Sub Category Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($subcategory as $sub)
                                                        <option value="{{ $sub->id }}" {{ $sub->id ==
                                                            $products->subcategory_id ? 'selected':'' }}>{{
                                                            $sub->subcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 1st row end -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach($subsubcategory as $subsub)
                                                        <option value="{{ $subsub->id }}" {{ $subsub->id ==
                                                            $products->subsubcategory_id ? 'selected':'' }}>{{
                                                            $subsub->subsubcategory_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subsubcategory_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en"
                                                        value="{{ $products->product_name_en }}" class="form-control"
                                                        required="">
                                                    @error('product_name_en')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_hin"
                                                        value="{{ $products->product_name_hin }}" class="form-control"
                                                        required="">
                                                    @error('product_name_hin')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 2nd row end -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Code<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code"
                                                        value="{{ $products->product_code }}" class="form-control"
                                                        required="">
                                                    @error('product_code')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Quantity<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty"
                                                        value="{{ $products->product_qty }}" class="form-control"
                                                        required="">
                                                    @error('product_qty')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en"
                                                        value="{{ $products->product_tags_en }}" class="form-control"
                                                        value="Stylish, man, woman" data-role="tagsinput" required="" />
                                                    @error('product_tags_en')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 3nd row end -->

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_hin"
                                                        value="{{ $products->product_tags_hin }}" class="form-control"
                                                        value="स्टाइलिश,आदमी,औरत" data-role="tagsinput" required="" />
                                                    @error('product_tags_hin')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_en"
                                                        value="{{ $products->product_size_en }}" class="form-control"
                                                        value="S,M,L" data-role="tagsinput" required="" />
                                                    @error('product_size_en')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Size Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_size_hin"
                                                        value="{{ $products->product_size_hin }}" class="form-control"
                                                        value="S,M,L" data-role="tagsinput" required="" />
                                                    @error('product_size_hin')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 4th row end -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_en"
                                                        value="{{ $products->product_color_en }}" class="form-control"
                                                        value="orange, red, black" data-role="tagsinput" required="" />
                                                    @error('product_color_en')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Color Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color_hin"
                                                        value="{{ $products->product_color_hin }}" class="form-control"
                                                        value="orange, red, black" data-role="tagsinput" required="" />
                                                    @error('product_color_hin')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="selling_price"
                                                        value="{{ $products->selling_price }}" class="form-control"
                                                        required="">
                                                    @error('selling_price')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_price"
                                                        value="{{ $products->discount_price }}" class="form-control"
                                                        >
                                                    @error('discount_price')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 6th row end -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_en" id="textarea" class="form-control"
                                                        required placeholder="Textarea text" required="">
                                                        {!! $products->short_descp_en !!}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Short Description Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="short_descp_hin" id="textarea" class="form-control"
                                                        required placeholder="Textarea text" required="">
                                                        {!! $products->short_descp_hin !!}

                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 8th row end -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description English <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="long_descp_en" rows="10" cols="80"
                                                        required="">
                                                        {!! $products->long_descp_en !!}

                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Long Description Hindi<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor2" name="long_descp_hin" rows="10" cols="80"
                                                        required="">
                                                        {!! $products->long_descp_hin !!}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 9th row end -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input name="hot_deals" type="checkbox" id="checkbox_1"
                                                            value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_1">Hot Deals </label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input name="featured" type="checkbox" id="checkbox_2" value="1"
                                                            {{ $products->featured == 1 ? 'checked' : '' }}>
                                                        <label for="checkbox_2">Featured</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input name="special_offer" type="checkbox" id="checkbox_3"
                                                            value="1" {{ $products->special_offer == 1 ? 'checked' : ''
                                                        }}>
                                                        <label for="checkbox_3">Special Offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input name="special_deals" type="checkbox" id="checkbox_4"
                                                            value="1" {{ $products->special_deals == 1 ? 'checked' : ''
                                                        }}>
                                                        <label for="checkbox_4">Special Deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- 10th row end -->
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" value="Update Product" class="btn btn-rounded btn-primary mb-5">
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

    <!-- Multiple Image update Area Start -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multipl Image <strong>Update</strong></h4>
                    </div>

                    <div class="box-body">
                        <form method="post" action="{{ route('update-product-image') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row row-sm">
                                @foreach ($multiImgs as $img)
                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                            style="height: 200px; width: 100%; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a class="btn btn-sm btn-danger" title="Delete Data" id="delete"
                                                    href="{{ route('product.multiimg.delete', $img->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </h5>
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label" for="">
                                                    Change Image <span class="tx-danger">* </span>
                                                </label>
                                                <input type="file" name="multi_img[{{ $img->id }}]"
                                                    class="form-control">
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" value="Update image"
                                            class="btn btn-rounded btn-primary mb-5">
                                    </div>
                                    <br>

                                </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Multiple Image update Area End -->

    <!-- Thumbnaail Image update Area Start -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>

                    <div class="box-body">
                        <form method="post" action="{{ route('update-product-thambnial') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $products->id }}">
                            <input type="hidden" name="old_img" value="{{ $products->product_thambnial }}">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($products->product_thambnial) }}" class="card-img-top"
                                            style="height: 200px; width: 100%; object-fit: cover;">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label" for="">
                                                    Change Image <span class="tx-danger">* </span>
                                                </label>
                                                <input type="file" name="product_thambnial" class="form-control"
                                                    onChange="mainThamUrl(this)">

                                                <img src="" id="mainThmb">
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" value="Update image"
                                            class="btn btn-rounded btn-primary mb-5">
                                    </div>
                                    <br>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Thumbnaail Image update Area End -->


    <!-- /.content -->
</div>

<style>
    .bootstrap-tagsinput {
        width: 100%
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript">
    function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

</script>



@endsection
