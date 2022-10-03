<?php

use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('testtest',function(){
// return 'test';
// });

//Dont Do This Just For test only
// Route::get('send-notification' , function(){
// // $user = Auth::user();

// // Mail::to
// //         ($user->email)->send(new InvoiceMail());

// // $user->notify(new NewOrderNotification());
// });

// route::get('invoice', function(){
//     return view('pdf.invoice');
//     $order = Order::find(2);
//     $pdf = Pdf::loadView('pdf.invoice', ['order' => $order]);
//    $pdf->save('invoices/latest.pdf');
// });

Route::get('send-notify',function(){
$user = Auth::user();
$order = Order::find(2);
// $user = User::find(1);
$user->notify(new NewOrder($order));
return view('send-notify');
})->name('send-notify');

Route::get('read_notify',function(){
    return view('read_notify');
})->name('Read_notify');

Route::get('read_notify/{id}',function($id){
    // Auth::user()->notifications->find($id)->update(['read_at' => now()]);
    Auth::user()->notifications->find($id)->MarkAsRead();
    return redirect()->back();
    // return redirect( Auth::user()->notifications->find($id)->data['url']);
})->name('readd');

route::delete('delete_notify/{id}',function($id){
    Auth::user()->notifications->find($id)->delete();
    return redirect()->back();
})->name('del');

Route::get('read_all_notify',function(){
    Auth::user()->unreadnotifications->MarkAsRead();
    return redirect()->back();

})->name('readall_notify');

// Route::delete('del_all_notify/{id}',function($id){
//      Auth::user()->unreadnotifications->find($id)->delete();
//     // Auth::user()->unreadnotifications->destroy($id);
//     return redirect()->back();

// })->name('delall_notify');
