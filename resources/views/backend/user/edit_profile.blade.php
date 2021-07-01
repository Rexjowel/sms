@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">manage profile</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       
                       <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf
                         <div class="row">

                           <div class="col-12">	


                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required=""></div>
                                        
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ $editData->email }}" class="form-control" required=""></div>
                                        
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Mobile <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control" required=""></div>
                                        
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" value="{{ $editData->address }}" class="form-control" required=""></div>
                                        
                                    </div>

                                </div>
                            </div>





                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>User Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="usertype" required="" class="form-control">
                                                <option selected="" disabled="">Select Gender</option>
                                                <option value="Male" {{ ($editData->gender == "Male" ? "selected" : "") }} >Male</option>
                                                <option value="Female" {{ ($editData->gender == "Female" ? "selected" : "") }}>feMale</option>
                                                
                                            </select>
                                        </div>
                                    </div> 

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Profile image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" id="Image"></div>
                                        
                                    </div>

                                    <div class="form-group">
                                        
                                        <div class="controls">
                                           <img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" style="width: 100px; borderd : 1px solid #000000;"> 
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>


                           </div>

                        </div>

                        
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="update">
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
    
    </div>
</div>
<!-- /.content-wrapper -->

{{--any select picture and show selected picture // image script --}}

<script>

    $(document).ready(function(){
        $('#Image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result)
            }

            reader.readAsDataURL(e.target.files['0']);

        });
    });

</script>

{{--any select picture and show selected picture --}}
@endsection