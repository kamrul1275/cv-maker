<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use App\Notifications\NotificationOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class OfferController extends Controller

{

  
    public function createOffer(){
        return view('backend.notification.create_offer');
    }


    public function storeOffer(Request $request)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'discount' => 'required|numeric',
            'valid_until' => 'nullable|date|after_or_equal:today', // Ensure the date is today or in the future
        ]);

        set_time_limit(300); // Increase the execution time

        $offer = new Offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->discount = $request->discount;
        $offer->valid_until = $request->valid_until;
        $offer->save();

        // Dispatch the job to send notifications
        Notification::send(User::all(), new NotificationOffer($offer));

        return redirect()->back()->with('success', 'Offer created and notifications sent.');
    }


    public function viewOffer($id)
    {
        $offer = Offer::find($id);
        return view('backend.notification.offer_view', ['offer' => $offer]);
    }//end method


    public function viewOffers()
    {
        $offers = Offer::all();
        return view('offers', ['offers' => $offers]);
    }//end method



    public function deleteOffer($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect()->back()->with('success', 'Offer deleted.');
    }//end method

    public function editOffer($id)
    {
        $offer = Offer::find($id);
        return view('edit_offer', ['offer' => $offer]);
    }//end method

    public function updateOffer(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->save();
        return redirect()->route('offers')->with('success', 'Offer updated.');
    }//end method



}//end class

