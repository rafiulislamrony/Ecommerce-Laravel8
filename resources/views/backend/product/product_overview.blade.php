@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Product OverView</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        <br>
                        <img src="{{ asset($products->product_thambnial) }}" class="card-img-top"
                            style="width: 100%; object-fit: cover;">
                        <br>
                        <br>
                        <div class="row">
                            @foreach ($multiImgs as $img)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top"
                                        style="width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <style>
                        .cs {
                            font-size: 18px;
                            color: #fff;
                            font-weight: 700
                        }
                    </style>
                    <div class="col-md-6">
                        <p class="cs"> Product Name English: {{ $products->product_name_en }} </p>
                        <p class="cs"> Product Name Hindi: {{ $products->product_name_hin }} </p>

                        <p class="cs">
                            Brands:
                            @foreach($brands as $item)
                            @if($item->id == $products->brand_id)
                            {{ $item->brand_name_en }}
                            @endif
                            @endforeach
                        </p>

                        <p class="cs">
                            Category:
                            @foreach($categories as $category)
                            @if($category->id ==  $products->category_id)
                            {{ $category->category_name_en }}
                            @endif
                            @endforeach
                        </p>

                        <p class="cs">
                            Subcategory:
                            @foreach($subcategory as $sub)
                            @if( $sub->id == $products->subcategory_id)
                            {{  $sub->subcategory_name_en }}
                            @endif
                            @endforeach
                        </p>
                        <p class="cs">
                            Subsubcategory:
                            @foreach($subsubcategory as $subsub)
                            @if( $subsub->id == $products->subsubcategory_id)
                            {{  $subsub->subsubcategory_name_en }}
                            @endif
                            @endforeach
                        </p>
                        <p class="cs"> Code : {{ $products->product_code }} </p>
                        <p class="cs"> Quantity : {{ $products->product_qty }} </p>
                        <p class="cs"> Tags English: {{ $products->product_tags_en }} </p>
                        <p class="cs"> Tags Hindi: {{ $products->product_tags_hin }} </p>
                        <p class="cs"> Size Eingish: {{ $products->product_size_en }} </p>
                        <p class="cs"> Size Hindi: {{ $products->product_size_hin }} </p>
                        <p class="cs"> Color Eingish: {{ $products->product_color_en }} </p>
                        <p class="cs"> Color Hindi: {{ $products->product_color_hin }} </p>
                        <p class="cs"> Selling Price: {{ $products->selling_price }} </p>
                        <p class="cs"> Discount price: {{ $products->discount_price }} </p>
                        <p class="cs"> Description English: {{ strip_tags($products->long_descp_en) }}</p>
                        <p class="cs"> Description Hindi: {{ strip_tags($products->long_descp_hin) }} </p>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>

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
