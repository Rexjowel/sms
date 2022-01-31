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
                 <h4 class="box-title">Edit Grade Marks</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       
                       <form method="POST" action="{{ route('update.marks.grade',$editData->id) }}">
                            @csrf
                         <div class="row">

                           <div class="col-12">	

                        {{-- 1st row start --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Grade Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="grade_name" value="{{ $editData->grade_name }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Grade Point <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="grade_point" value="{{ $editData->grade_point }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Start Marks<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="start_marks" value="{{ $editData->start_marks }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                            </div> 

                                {{-- 1st row end --}}

                                {{-- 2nd row start --}}
                                   
                            <div class="row">
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>End Marks <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="end_marks" value="{{ $editData->end_marks }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Start Point<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="start_point" value="{{ $editData->start_point }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>End Point<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="end_point"  value="{{ $editData->end_point }}" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                            </div> 

                            {{-- 2nd row end --}}
                            

                            {{-- 3rd row start --}}
                                   
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Remarks<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="remarks"  value="{{ $editData->remarks }}"  class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                   
                                </div>

                                

                            </div> 

                            {{-- 3rd row end --}}


                           </div>

                        </div>

                        
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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




@endsection