<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function generatePDF(Request $request)
    {
        // Your HTML template goes here
        $html = '

        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <style>
                @media print {
                    .print-button {
                        display: none;
                    }
                }
                .table-avatar th,
                .table-avatar td {
                    vertical-align: middle;
                }

                .table-avatar .img-avatar40 {
                    height: 150px;
                }

                .table-avatar .img-avatar20 {
                    width: 170px;
                    height: 20px;
                }

                .table-avatar .img-avatar70 {
                    width: 300px;
                    height: 40px;
                }
                .horizontal{
                    margin-top: 1px;
                }
                /* Adjust table styles */
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                .table td, .table th {
                    vertical-align: top;
                    padding: 0.15rem!important;
                    border-top: 1px solid rgb(222, 226, 230);
                }

                /* Add styles for form input fields */
                input[type="text"] {
                    width: 100%;
                    border: none;
                    border-bottom: 1px solid #ccc;
                    padding: 4px;
                }

                /* Adjust the small text style */
                .small-text {
                    font-size: 8px;
                }
            </style>
            <link rel="stylesheet" href="https://afrisend.com/assets/front/css/sent_receipt.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        </head>

        <body id="body">

            <div class="block-content p-3" id="here">

                    <div class="table-responsive">
                        <table class="table table-borderless table-avatar">
                            <thead>
                                <tr>
                                    <th scope="row" class="text-left"><img class="left img-avatar40" alt="Avatar"
                                            src="https://afrisend.com/assets/images/logo/afrisend.png">
                                    </th>
                                    <th scope="row"></th>

                                    <th scope="row" class="text-right">
                                        <img class="right img-avatar20" alt="Avatar"
                                            src="https://afrisend.com/assets/images/logo/afrisend_secure_logo.png">
                                    </th>
                                    <th scope="row"></th>


                                </tr>
                            </thead>
                            <tr>
                                <th scope="row" class="text-left"><img class="left img-avatar70"
                                        src="https://storage.googleapis.com/m_tickets/assets/event_poster/green.svg" /><b></b>
                                </th>

                                <th scope="row"></th>
                                <td class="text-right" style="width: auto; font-weight: bolder; font-size: large"><b>AFRI PIN: {{ $invoice->trx }}</b></td>
                            </tr>

                        </table>
                        <hr class = "horizontal">
                    </div>

                    <h3 class="block-title text-right"></h3>
                    <div class="container">
                        <div class="table-responsive-sm">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th class="text-left" style="color: rgb(56,177,74)" scope="row"><b>SEND MONEY</b></th>
                                        <th scope="row"></th>
                                        <th class="text-right" scope="row"><span>Collection Pin: <span id="CollectionPin">{{ $collection_pin }}</span></span></th><br>
                                    </tr>
                                </tbody>

                            </table>
                            <br>
                            <br>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="s4">Sender:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Abdul Suleiman</p>
                                        </td>
                                        <td>
                                            <p class="s4">Operator Name:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Brian Kisese</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">Telephone:</p>
                                        </td>
                                        <td>
                                            <p class="s5">2547****5893</p>
                                        </td>
                                        <td>
                                            <p class="s4">Date:</p>
                                        </td>
                                        <td>
                                            <p class="s5">07/09/2023</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">Sender Address:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Nairobi</p>
                                        </td>
                                        <td>
                                            <p class="s4">Time:</p>
                                        </td>
                                        <td>
                                            <p class="s5">16:30:05</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">ID type:</p>
                                        </td>
                                        <td>
                                            <p class="s5">National ID</p>
                                        </td>
                                        <td>
                                            <p class="s4">Office:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Afrisend HQ</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">ID number:</p>
                                        </td>
                                        <td>
                                            <p class="s5">3137****85</p>
                                        </td>
                                        <td>
                                            <p class="s4">Destination:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Abu Dhabi</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">Source:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Business</p>
                                        </td>
                                        <td>
                                            <p class="s4">Amount sent:</p>
                                        </td>
                                        <td>
                                            <p class="s5">KES 1,000</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="s4">Purpose:</p>
                                        </td>
                                        <td>
                                            <p class="s5">Family Maintenance</p>
                                        </td>
                                        <td>
                                            <p class="s4">Charge:</p>
                                        </td>
                                        <td>
                                            <p class="s5">KES 30</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p class="s4">Taxes:</p>
                                        </td>
                                        <td>
                                            <p class="s5">KES 6</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p class="s4">Total:</p>
                                        </td>
                                        <td>
                                            <p class="s5">KES 1,036</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p class="s4">Exchange Rate:</p>
                                        </td>
                                        <td>
                                            <p class="s5">AED 38.71</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p class="s4">Payout Amount:</p>
                                        </td>
                                        <td>
                                            <p class="s5">AED 25.83</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p>&nbsp;</p>
                                        </td>
                                        <td>
                                            <p class="s4">Tranfer Type:</p>
                                        </td>
                                        <td>
                                            <p class="s5">CASH</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <div class="">
                                <small class="form-text text-muted"> <i>This transaction is executed by Afrisend subject to
                                        the condition that it
                                        will not be held liable for delay/non-payment/underpayment/non-
                                        delivery due to reasons beyond its control and disruption of
                                        communication systems. Payment at destination is subject to rules and
                                        regulations of that country.<br>Afrisend is also not responsible, if the
                                        information provided by the customer is inadequate/incorrect.
                                        I/We, hereby, confirm that the purpose &amp; source of funds for this
                                        transaction declared above is not intended for any illegal activities. I
                                        declare that this remittance is sent for me/us &amp; not on behalf of any third
                                        party.<br>I, further confirm that details provided above are true and correct
                                        to the best of my knowledge.
                                        I/We confirm having read &amp; accepted the terms and conditions
                                        governing this transaction.
                                        <br>Please, verify your cash before leaving the counter.</i></small>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>

    </html>

        ';
        $trx_number = 'AU44AZs23';
        // Generate PDF
        $pdf = PDF::loadHTML($html);

        // Save the PDF to a file (optional)
        $pdf->save(storage_path('app/public/send-invoices/' . $trx_number . '.pdf'));

        // Send the PDF as an email attachment
        Mail::send('emails.email_template', [], function ($message) use ($trx_number) {
            $message->to('johnnnzivo@gmail.com')
                ->subject('' . $trx_number . '- Afrisend Receipt')
                ->attach(storage_path('app/public/send-invoices/' . $trx_number . '.pdf')); // Attach the generated PDF
        });

        return 'PDF sent via email';
    }
}
