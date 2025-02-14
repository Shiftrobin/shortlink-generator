<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: content-box;
    }
    </style>
    <title> Membership Card</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <div style="height: 100vh;">
        <table cellspacing="0" cellpadding="0" style="margin: 0 auto;">
            <tbody>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td
                                        style="height: 216px;width: 333px;border-radius: 10px; {{-- background-image: url(data:image/png;base64,<?php // echo base64_encode(file_get_contents(base_path('public/backend/images/pdf/fornt_part_id_card.png'))); ?>); background-size:cover; overflow: hidden; --}} ">
                                        <div
                                            style="text-align: center;text-transform: capitalize;font-weight: bold;font-size: 16px;color: #ffffff; position: relative;">
                                            
                                            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/upload/user_images/'.$allData->image))); ?>" style="width: 80px;padding:0px 120px 0px 0px; height:90px; margin-top:25px;">
                
                                            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/backend/images/pdf/logo.png'))); ?>" style=" width: 70px;position: absolute;top: 40px;right: 7px;z-index: 3;">
                                            {{-- <img src="data:image/png;base64,<?php// echo base64_encode(file_get_contents(base_path('public/backend/images/pdf/shap.png'))); ?>" style=" width: 65px; height: 216px;position:absolute;right: 82px;z-index: 2;margin-top:-25px;"> --}}
                                                
                                            <p
                                                style="margin:0px 0px 6px 0px;padding: 0px 130px 0px 10px;color: #FED700; font-size:12px">
                                                NAME: {{$allData->first_name}} {{$allData->last_name}}
                                            </p>
                                            <p
                                                style="background-color: #0c8542;border-radius: 0px 0px 20px 20px;padding: 6px 8px;border-style: solid;border: 1px solid rgb(233,218,35);text-align: center;font-size: 14px;margin: 0 157px 0 25px;border-top:none;">
                                                Membership No: {{$allData->member_id}}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td
                                        style="height: 216px;width: 333px;border-radius: 10px; {{-- background-image: url(data:image/png;base64,<?php // echo base64_encode(file_get_contents(base_path('public/backend/images/pdf/back_part_id_card.png'))); ?>); background-size:cover; --}} ">

                                        <div
                                            style="line-height: 10px;font-size: 10px;text-align: center; position: relative;">
                                            <div style="padding-top: 10px;position: relative;">
                                                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/backend/images/pdf/logo.png'))); ?>"
                                                    style="width:50px; margin-bottom: 6px;">
                                            </div>
                                            <div style="font-size: 10px;color: #ffffff;">
                                                <p><b style="color: #fff799;font-family: 'Open Sans', sans-serif;">
                                                    বিশ্ব জাকের মঞ্জিল সরকারি উচ্চ বিদ্যালয় 
                                                </b></p>
                                                {{-- <p><b>Head Office</b></p> --}}
                                            </div>
                                            {{-- <p
                                                style="margin-top: 2px; font-size: 10px; padding:0 20px; margin-bottom: 5px;color: #ffffff;font-family: 'Open Sans', sans-serif;">
                                                Evergreen Plaza (4th Floor), 260/B, Tejgaon I/A, Dhaka–1208,<br>
                                                Phone: +88 01409 964 888, +88 01409 964 999<br>
                                                www.pojf.org/club<br>
                                                club@pojf.org
                                            </p> --}}
                                            <div
                                                style="font-size: 11px; margin-left: 5px;text-align: left;color: #ffffff;font-family: 'Open Sans', sans-serif;">
                                                <p style="margin-bottom: 2px;padding: 0px 0px 0px 38px;font-family: 'Open Sans', sans-serif;">
                                                   
                                                    {{-- <span><b style="color: #fff799;font-family: 'Open Sans', sans-serif;">District:</b>
                                                        {{$allData->district}}</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}

                                                        <span><b style="color: #fff799; font-family: 'Open Sans', sans-serif;">Blood
                                                            Group :
                                                            </b> {{$allData->blood_group}}
                                                        </span>
                                                </p>
                                                <p style="margin-bottom: 7px;padding: 0px 0px 0px 38px;text-align:left font-family: 'Open Sans', sans-serif;">
                                                    <b style="color: #fff799; font-family: 'Open Sans', sans-serif;">Member
                                                        Since :</b>
                                                        {{$allData->reg_date}}
                                                </p>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>