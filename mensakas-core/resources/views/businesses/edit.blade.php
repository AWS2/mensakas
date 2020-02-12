@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Business
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($business, ['route' => ['businesses.update', $business->id], 'method' => 'patch']) !!}

                        @include('businesses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection