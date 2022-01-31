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
                 <h4 class="box-title">Edit Other Cost </h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       
                       <form method="POST" action="{{ route('update.other.cost',$editData->id) }}" enctype="multipart/form-data">
                            @csrf
                         <div class="row">

                           <div class="col-12">	


                            {{-- 1st row start --}}
                                   
                            <div class="row">


                                <div class="col-md-3">
                                   
                                    <div class="form-group">
                                        <h5>Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="amount" value="{{ $editData->amount }}" class="form-control" required>
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5> Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" value="{{ $editData->date }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" id="Image"></div>
                                        
                                    </div>
                                </div>


                                <div class="col-md-3">
                                   <div class="form-group">
                                        
                                        <div class="controls">
                                           <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/cost_images/'.$editData->image) : url('upload/no_image.jpg') }}" style="width:70px; height: 50px;"> 
                                        </div>
                                        
                                    </div>
                                </div>
                                

                            </div> 

                            {{-- 1st row end --}}


                           </div>

                        </div>

                    {{-- 2nd row start --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description" id="description" class="form-control" required="" placeholder="Textarea text" aria-invalid="false">{{ $editData->description }} </textarea>
                                    <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>

                        {{-- 2nd row end --}}

                        
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