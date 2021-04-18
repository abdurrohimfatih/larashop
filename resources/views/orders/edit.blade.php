@extends('layouts.global')

@section('title') Edit Order @endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('orders.update', [$order->id]) }}" class="shadow-sm bg-white p-3" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <label>Invoice number</label><br>
                <input type="text" class="form-control" value="{{ $order->invoice_number }}" disabled>
                <br>

                <label>Buyer</label><br>
                <input type="text" class="form-control" value="{{ $order->user->name }}" disabled>
                <br>

                <label>Order date</label><br>
                <input type="text" class="form-control" value="{{ $order->created_at }}" disabled>
                <br>

                <label>Books ({{ $order->totalQuantity }})</label><br>
                <ul>
                    @foreach ($order->books as $book)
                        <li>{{ $book->title }} <b>({{ $book->pivot->quantity }})</b></li>
                    @endforeach
                </ul>

                <label>Total price</label><br>
                <input type="text" class="form-control" value="{{ $order->total_price }}" disabled>
                <br>

                <label for="status">Status</label><br>
                <select name="status" id="status" class="form-control">
                    <option {{ $order->status == 'SUBMIT' ? 'selected' : '' }} value="SUBMIT">SUBMIT</option>
                    <option {{ $order->status == 'PROCESS' ? 'selected' : '' }} value="PROCESS">PROCES</option>
                    <option {{ $order->status == 'FINISH' ? 'selected' : '' }} value="FINISH">FINISH</option>
                    <option {{ $order->status == 'CANCEL' ? 'selected' : '' }} value="CANCEL">CANCEL</option>
                </select>
                <br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
