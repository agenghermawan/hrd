@extends('layouts.layout')

@section('title','Attendance')

@section('content')
 <div class="col-lg-10 col-sm-12 col-md-10">
     <div class="card">
         <div class="card-body">
             {{ echo User::find(1)->created_at->timezone(Auth::user()->timezone); }}
         </div>
     </div>
 </div>
@endsection

@section('script')
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>
@endsection