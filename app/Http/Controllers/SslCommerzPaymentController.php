<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use Image;

use Mail;
use Auth;
use Session;
use DateTime;

use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\About;

use App\Models\Communicate;
use App\Models\User;
use App\Models\Order;
use Xenon\LaravelBDSms\Facades\SMS;


class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = strip_tags($request->total_amount); # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] =  strip_tags($request->name);
        $post_data['cus_email'] = strip_tags($request->email);
        $post_data['cus_add1'] =  strip_tags($request->address);
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] =  strip_tags($request->mobile);
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        # User Information 
        $post_data['first_name'] = strip_tags($request->first_name);
        $post_data['last_name'] = strip_tags($request->last_name);
        $post_data['date_of_birth'] = strip_tags($request->date_of_birth);
        $post_data['nid'] = strip_tags($request->nid);

        $post_data['gender'] = strip_tags($request->gender);
        $post_data['blood_group'] = strip_tags($request->blood_group);
        $post_data['education_qualification'] = strip_tags($request->education_qualification);
        $post_data['profession'] = strip_tags($request->profession);

        $post_data['other_expertise'] = strip_tags($request->other_expertise);
        $post_data['country'] = strip_tags($request->country);
        $post_data['division'] = strip_tags($request->division);
        $post_data['district'] = strip_tags($request->district);

        $post_data['membership_type'] = strip_tags($request->membership_type);    
        $post_data['tshirt'] = strip_tags($request->tshirt);  
        $post_data['batch'] = strip_tags($request->batch);      
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $file = Image::make(public_path('upload/user_images/').$filename);
            $file->resize(590,708)->save(public_path('upload/user_images/').$filename);
            $post_data['image']= $filename;
        }


        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([

                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],


                'first_name' => $post_data['first_name'],
                'last_name' => $post_data['last_name'],
                'date_of_birth' => $post_data['date_of_birth'],
                'nid' => $post_data['nid'],
        
                'gender' => $post_data['gender'],
                'blood_group' => $post_data['blood_group'],
                'education_qualification' => $post_data['education_qualification'],
                'profession' => $post_data['profession'],
        
                'other_expertise' => $post_data['other_expertise'],
                'country' => $post_data['country'],
                'division' => $post_data['division'],
                'district' => $post_data['district'],
        
                'membership_type' => $post_data['membership_type'],
                'tshirt' => $post_data['tshirt'],
                'batch' => $post_data['batch'],
                'image' => $post_data['image'],

            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency']
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        
        
        // when transaction successfull create user to users table   

        $tran_id = $request->input('tran_id');
        
        $order_information = DB::table('orders')
                            ->where('transaction_id', $tran_id)
                            ->select('*')->first();

        $code = rand(000000,999999);  
        $user_id = User::select('id')->orderBy('id', 'desc')->first();
        $member_serial = ($user_id->id)+1;  
        
        $user = new User();

        $user->first_name =  $order_information->first_name;
        $user->last_name = $order_information->last_name;
        $user->name = $order_information->name;
        $user->email = $order_information->email;

        $user->mobile = $order_information->phone;   
        $user->date_of_birth = $order_information->date_of_birth;
        $user->nid = $order_information->nid;                
        $user->gender = $order_information->gender;

        $user->blood_group = $order_information->blood_group;
        $user->education_qualification = $order_information->education_qualification;
        $user->profession = $order_information->profession;
        $user->other_expertise = $order_information->other_expertise;

        $user->country = $order_information->country;
        $user->division = $order_information->division;
        $user->district = $order_information->district;

        //password random
        $random_pass = str_random(6);
        $user->upazila = $random_pass;

        $user->union = '1';
        $user->address = $order_information->address;
        $user->membership_type = $order_information->membership_type;
        $user->tshirt = $order_information->tshirt;
        $user->batch = $order_information->batch;
        $user->member_id = $member_serial;

        $user->order_id = $order_information->id;
        //username generate
        $user->username = $order_information->last_name.$member_serial;
        //encrypt password
        $user->password = bcrypt($random_pass);
        $user->reg_date = date('d-m-Y');

        $user->usertype = 'customer';
        $user->role = 'customer';
        $user->role_id = '0';
        $user->code = $code;

        $user->status = '1';    
        $user->image = $order_information->image;
        $user->save();
        
        // end user create 
         
        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();
            
            

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                echo "<br >Transaction is successfully Completed";
            }
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed.";
            
               
            //email send 
                
                $data = array(
                    
                    'name' => $order_information->name,
                    'batch' => $order_information->batch,
        
                    'member_id' => 'BZMGHS'.$member_serial,
                    // 'username' => $order_information->last_name.$member_serial,
                    // 'password' => $random_pass,
                    'email' => $order_information->email,        
        
                );
        
                Mail::send('frontend.emails.registration-email',$data, function($message) use($data){
                    $message->from('info@connectbzmghs.com','BZMGHS');
                    $message->to($data['email'],$data['name']);
                    $message->cc('payment@connectbzmghs.com','BZMGHS');
                    $message->bcc('bzmghs.alumni40@gmail.com','BZMGHS');
                    $message->subject('Welcome to BZMGHS');
                });

                
            //send sms 
                SMS::shoot($order_information->phone, 'Congratulations! Your registration was successful. Thank you for becoming a member of BZMGHS. Registration No: '.'BZMGHS'.$member_serial.', Name: '.$order_information->name.', Batch: '.$order_information->batch);    
                     
            return redirect()->route('registration.success');

        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";


            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
