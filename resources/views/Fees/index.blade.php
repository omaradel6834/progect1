@extends('layouts.master')
@section('css')

@section('title')
   اضافه رسوم دراسيه
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
 الرسوم دراسيه
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{route('Fees.create')}}" class="btn btn-success btn-sm" role="button"
                aria-pressed="true">اضافه رسوم جديده</a><br><br>
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">الاسماء</th>
                                <th class="wd-20p border-bottom-0">المبلغ</th>
                                <th class="wd-15p border-bottom-0">المرحله الدراسيه</th>
                                <th class="wd-10p border-bottom-0">الصف الدراسي</th>
                                <th class="wd-25p border-bottom-0">السنه الدراسيه</th>
                                <th class="wd-25p border-bottom-0">الملاحظات </th>
                                <th class="wd-25p border-bottom-0">العمليات </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0?>
                            @foreach($fees as $fee)
                            <?php $i++?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$fee->title}}</td>
                                <td>{{$fee->amount}}</td>
                                <td>{{$fee->grade->Name}}</td>
                                <td>{{$fee->classroom->Name_Class}}</td>
                                <td>{{$fee->year}}</td>
                                <td>{{$fee->description}}</td>
                                <td>
                                  <a class="btn btn-info btn-sm" href="{{route('Fees.edit', $fee->id)}}">
                                   <i class="fas fa-edit"></i> 
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                            </tr>
<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_Fee{{$fee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('Students_trans.Deleted_Student')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Fees.destroy','test')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$fee->id}}">
                    <h5 style="font-family: 'Cairo', sans-serif;">هل انت متاكد مع عملية الحذف ؟</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                        <button  class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
