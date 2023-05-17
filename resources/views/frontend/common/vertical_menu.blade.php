@php
$categories = App\Models\Category::orderby('category_name_en', 'ASC')->get();
@endphp


<!-- ============ TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach ($categories as $category)
            <!-- Start Category foreach  -->

            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>

                    @if(session()->get('language') == 'hindi') {{ $category->category_name_hin }}
                    @else {{ $category->category_name_en }} @endif

                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">

                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',
                            $category->id)->orderby('subcategory_name_en',
                            'ASC')->get();
                            @endphp

                            @foreach ($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">
                                <h2 class="title">
                                    @if(session()->get('language') == 'hindi') {{
                                    $subcategory->subcategory_name_hin }} @else {{
                                    $subcategory->subcategory_name_en }} @endif
                                </h2>
                            </a>
                                @php
                                $subsubcategories =
                                App\Models\SubSubCategory::where('subcategory_id',
                                $subcategory->id)->orderby('subsubcategory_name_en',
                                'ASC')->get();
                                @endphp
                                @foreach ( $subsubcategories as $subsubcategory)
                                <!-- Start Sub Sub category foreach  -->
                                <ul class="links list-unstyled">
                                    <li>
                                        <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en ) }}">
                                            @if(session()->get('language') == 'hindi') {{
                                            $subsubcategory->subsubcategory_name_hin }} @else {{
                                            $subsubcategory->subsubcategory_name_en }} @endif
                                        </a>
                                    </li>
                                </ul>
                                @endforeach
                                <!-- Start Sub Sub category foreach  -->
                            </div>
                            @endforeach
                            <!-- /.End Sub category foreach  -->

                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- End Category foreach  -->
            <!-- /.menu-item -->



            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sports</a>
            </li>
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home and Garden</a>
            </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ============= TOP NAVIGATION : END ================================== -->
