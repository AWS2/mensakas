@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Riders'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">

    <div class="">
        <table>
            <tr>
                <td></td>
                <td><strong>Name</strong></td>
                <td><strong>Last name</strong></td>
                <td><strong>Username</strong></td>
                <td><strong>Phone</strong></td>
                <td colspan="2">
                    <form action="{{route('riders.create')}}" method="get">
                        <button type="submit" value="Add new rider" class="btn btn-success ml-4"><i
                                class="fa fa-plus"></i> Add Rider</button>
                    </form>
                </td>

            </tr>

            @foreach($riders as $rider)
            <tr>
                <td>
                    <form action="{{route('riders.show', ['rider'=>$rider['id']])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search"></button>
                    </form>

                </td>
                <td>{{$rider['first_name']}}</td>
                <td>{{$rider['last_name']}}</td>
                <td>{{$rider['username']}}</td>
                <td>{{$rider['phone']}}</td>
                <td>
                    <form action="{{route('riders.edit', ['rider'=>$rider['id']])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i>
                            Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('riders.destroy', ['rider'=>$rider['id']])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
