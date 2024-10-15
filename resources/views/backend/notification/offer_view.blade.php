@extends('backend.layout.master')

@section('admin_content')
<div class="container">
    <h1>Offer Details</h1>




  @php

   use app\Models\Offer;
        $offer = Offer::find(1);
    if ($offer->isValid()) {
        echo "The offer is still valid!";
    } else {
        echo "This offer has expired.";
    }
    

  @endphp






    <div class="card">
        <div class="card-header">
            <h2>{{ $offer->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $offer->description }}</p>
            <p><strong>Valid Until:</strong> {{ $offer->valid_until }}</p>
            <p><strong>Discount:</strong> {{ $offer->discount }}%</p>
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-primary">Back to Offers</a>
        </div>
    </div>
</div>
@endsection