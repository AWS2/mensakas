@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Business #'.$business->id])
@endsection

@section('content')

<div>
    <div class="col-7 mx-auto">
        <div class="form-row">
            <div class="col-md-4">
                <label for="name"><strong>Name:</strong></label>
                <p id="name">{{$business->name ?? 'Not informed'}}</p>
            </div>
            <div class="col-md-4">
                <label for="tel"><strong>Phone:</strong></label>
                <p id="phone">{{$business->phone ?? 'Not informed'}}</p>
            </div>
            <div class="col-md-4">
                <label for="status"><strong>Status:</strong></label>
                <p id="status">
                    @if ($business->active)
                    Activated
                    @else
                    Disabled
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="col-7 mx-auto">
        <div class="h5 border-bottom" style="opacity:0.7">Address</div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="street"><strong>Street:</strong></label>
                <p id="street">{{$business->businessAddresses->street ?? 'Not informed'}}</p>
            </div>
            <div class=" col-md-2 ml-3">
                <label for="number"><strong>Number:</strong></label>
                <p id="number">{{$business->businessAddresses->number ?? 'Not informed'}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="City"><strong>City:</strong></label>
                <p id="City">{{$business->businessAddresses->city ?? 'Not informed'}}</p>
            </div>
            <div class="col-md-4 ml-2">
                <label for="Zip"><strong>Zip:</strong></label>
                <p id="Zip">{{$business->businessAddresses->zip_code ?? 'Not informed'}}</p>
            </div>
        </div>
    </div>
    @if (!$business->schedules->isEmpty())
    <div class="col-7 mx-auto">
        <div class="h5 border-bottom" style="opacity:0.7">Schedules</div>
        @foreach ($business->schedules as $schedule)
        <div class="form-row mt-3">
            <div class="col-md-2">
                <label for="day"><strong>Day:</strong></label>
                <p id="day">
                    @switch($schedule->day)
                    @case(0)
                    Monday
                    @break
                    @case(1)
                    Tuesday
                    @break
                    @case(2)
                    Wednesday
                    @break
                    @case(3)
                    Tuesday
                    @break
                    @case(4)
                    Friday
                    @break
                    @case(5)
                    Saturday
                    @break
                    @case(6)
                    Sunday
                    @break
                    @default
                    Not informed
                    @endswitch
                </p>
            </div>
            <div class="col-md-2">
                <label for="open1"><strong>Open:</strong></label>
                <p id="open1">{{$schedule->open_1 ?? '-'}}</p>
            </div>
            <div class=" col-md-2 border-right">
                <label for="close"><strong>Close:</strong></label>
                <p id="close">{{$schedule->close_1 ?? '-'}}</p>
            </div>
            @if ($schedule->open_2 != null)
            <div class="col-md-2 ml-2">
                <label for="open2"><strong>Open:</strong></label>
                <p id="open2">{{$schedule->open_2 ?? '-'}}</p>
            </div>
            <div class=" col-md-2">
                <label for="close"><strong>Close:</strong></label>
                <p id="close">{{$schedule->close_2 ?? '-'}}</p>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @endif
    <div class="col-7 mx-auto row mt-2">
        <div class="mr-2">
            <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
        </div>
        <div class="mr-2">
            <form action="{{route('businesses.edit', ['business'=>$business->id])}}" method="get">
                <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>
            </form>
        </div>
        <div class="mr-2">
            <form action="{{route('businesses.destroy', ['business'=>$business])}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i
                        class="fa fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>

@endsection