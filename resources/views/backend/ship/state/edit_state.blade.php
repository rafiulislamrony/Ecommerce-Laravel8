@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-------- Add Brand Page  --------->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit State</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('state.update', $state->id) }}" >
                            @csrf

                            <div class="form-group">
                                <h5>Division Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Division</option>
                                        @foreach ($division as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $state->division_id ? 'selected' : '' }}>
                                            {{ $item->division_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>District Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="district_id" class="form-control">
                                        <option value="" selected="" disabled="">Select District</option>
                                        @foreach ($district as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $state->district_id ? 'selected' : '' }}>
                                            {{ $item->district_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>State Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $state->state_name }}" name="state_name" class="form-control">
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{ url('/shipping/division/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="district_id"]').html('');
                          var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection
