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
                 <h4 class="box-title">Edit Employee Leave</h4>
                 
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       
                       <form method="POST" action="{{ route('update.employee.leave',$editData->id) }}">
                            @csrf
                         <div class="row">

                           <div class="col-12">	


                                <div class="row">

                                    <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="employee_id" required="" class="form-control">

                                                <option selected="" disabled="">Select Employee Name</option>
                                                @foreach($employees as $employee)
            <option value="{{ $employee->id }}" {{ ($editData->employee_id  == $employee->id)? 'selected' : '' }}>{{ $employee->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div> 

                                    </div>


                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Start Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date"  name="start_date" class="form-control" value="{{ $editData->start_date }}">
                                        </div>
                                        
                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Leave Purpose <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="leave_purposes_id" id="leave_purposes_id" required="" class="form-control">

                                                <option selected="" disabled="">Select Employee Name</option>
                                                @foreach($leave_purposes as $leave)
                                                <option value="{{ $leave->id }}" {{ ($editData->leave_purposes_id  == $leave->id)? 'selected' : '' }} >{{ $leave->name }}</option>
                                                @endforeach
                                                <option value="0">New Purpose</option>
                                            </select>
                <input type="text" name="name" id="add_another" class="form-control" placeholder="Write Purpose" style="display: none;">

                                        </div>
                                    </div>

                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>End Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                    <input type="date" name="end_date" class="form-control" value="{{ $editData->end_date }}">
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


<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#leave_purposes_id',function(){
            var leave_purposes_id = $(this).val();
            if (leave_purposes_id == '0') {
                $('#add_another').show();
            }else{
                $('#add_another').hide();  
            }
        });
    });
</script>



@endsection