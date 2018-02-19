@extends('layout.admin-master')

@section('content')

<div class="page-layout carded full-width" id="dv_print" onload="">
    <div class="top-bg bg-blue"></div>
    <div class="page-content">
        <div class="header bg-blue text-auto row no-gutters align-items-center justify-content-between">
            <div class="col-12 col-sm">
                <div class="logo row no-gutters align-items-start">
                    <div class="logo-icon mr-3 mt-1">
                        <i class="icon-document"></i>
                    </div>
                    <div class="logo-text">
                        <div class="h4">Print Voucher</div>
                        <div class="">Doc No: {{ SanitizeHelper::stringOutputSanitize($dv->doc_no) }}</div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
        		<a href="{{ route('admin.dv.edit', $dv->slug) }}" class="btn btn-secondary fuse-ripple-ready">
                    <i style="font-size:15px;" class="icon icon-border-color"></i> Edit
                </a>
            </div>
        </div>
        <div class="page-content-card">
            <div class="p-5 col-12">

			<div class="preview">
				<div class="preview-elements">
			        <ul class="nav nav-tabs" id="myTab" role="tablist">
			            <li class="nav-item">
			                <a class="nav-link active" id="front-tab" data-toggle="tab" href="#front" role="tab" aria-controls="front" aria-expanded="true">Front</a>
			            </li>
			            <li class="nav-item">
			                <a class="nav-link" id="back-tab" data-toggle="tab" href="#back" role="tab" aria-controls="back" aria-expanded="false">Back</a>
			            </li>
			        </ul>
			        <div class="tab-content" id="myTabContent">
			         

				    <div class="tab-pane fade active show" id="front" role="tabpanel" aria-labelledby="front-tab" aria-expanded="true">
				        <div id="frontDiv">
							<div class="row" style=" padding:20px;">

								<div class="col-sm-12" style="border-style:solid; padding-top:10px; padding-bottom:48px;"> 
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-8">
											<img src="{{ asset('template/images/logos/sra.png') }}" style="width:120px; margin-bottom:-90px;" >
											<center><span><strong>Republic of the Philippines</strong></span></center>
											<center><span style="font-size:20px; font-weight:bold;">SUGAR REGULATORY ADMINISTRATION</span></center>
											<center><span><strong>North Avenue, Diliman, Quezon City</strong></span></center>
										</div>
										<div class="col-sm-2"></div>
									</div>
								</div>


								<div class="col-sm-9" style="border-style:solid; border-top-style:none; padding:10px;">
									<center><span style="font-size:30px;"><strong>DISBURSEMENT VOUCHER</strong></span></center>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<span style="font-size:15px;"><strong>No.</strong></span><br>
									<span style="font-size:20px; font-weight:bold;"> {{ SanitizeHelper::stringOutputSanitize($dv->dv_no) }} </span>
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:1px;">
									<center><span style="font-size:15px; margin:-9px;"><strong>&nbsp;Mode of<br><span style="margin-left:-11px;">Payment</span></strong></span></center>
								</div>
								<div class="col-sm-11" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<div class="row">
										@if($dv->dv_mop == 01)
											<div style="width: 30px; height: 25px; border: 13px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Check</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Cash</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Others</span>
										@elseif($dv->dv_mop == 02)
											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Check</span>

											<div style="width: 30px; height: 25px; border: 13px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Cash</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Others</span>
										@elseif($dv->dv_mop == 03)
											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Check</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Cash</span>

											<div style="width: 30px; height: 25px; border: 13px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Others</span>
										@else
											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Check</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Cash</span>

											<div style="width: 30px; height: 25px; border: 3px solid; margin-top: 11px; margin-left:150px;"></div>
											<span style="margin-top: 12px; margin-left: 20px; font-weight:bold;">Others</span>
										@endif
									</div>
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:17px;">
									<center><span style="font-size:16px; margin-left:-20px;"><strong>Payee:</strong></span></center>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; padding-top:2px;">
									<span style="font-size:16px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_payee) }}</strong></span>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<span style="font-size:13px;"><strong>TIN/Employee No.:</strong></span><br>
									<span style="font-size:19px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_tin) }}</strong></span>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<span style="font-size:13px;"><strong>BUR No.:</strong></span><br>
									<span style="font-size:19px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_bur_no) }}</strong></span>
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:1px; padding-top:25px;">
									<center><span style="font-size:16px; margin-left:-12px"><strong>Address:</strong></span></center>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; padding-top:12px;">
									<span style="font-size:16px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_address) }}</strong></span>
								</div>
								<div class="col-sm-6" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<center><span style="font-size:13px;"><strong>Responsibility Center</strong></span></center>
									<div class="row">
										<div class="col-sm-6" style="border-style:solid; border-left-style: none; border-bottom-style: none; padding:5px;">
											<span style="font-size:13px;"><strong>Office/Unit/Project:</strong></span><br>
											<span style="font-size:15px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_unit_code) }}</strong></span>
										</div>
										<div class="col-sm-6" style="border-style:solid; border-left-style: none; border-bottom-style: none; border-right-style: none; padding:5px;">
											<span style="font-size:13px;"><strong>Code:</strong></span><br>
											<span style="font-size:15px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_proj_code) }}</strong></span>
										</div>
									</div>
								</div>


								<div class="col-sm-9" style="border-style:solid; border-top-style: none; padding:3px;">
									<center><span style="font-size:20px;"><strong>EXPLANATION</strong></span></center>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none; padding:3px;">
									<center><span style="font-size:20px;"><strong>AMOUNT</strong></span></center>
								</div>


								<div class="col-sm-9" style="border-style:solid; border-top-style: none; height:30em;">
									<div class="row" style="padding-left:10px; padding-top:10px;">
										<pre style="font-family:Arial; font-size:16px; white-space: pre-wrap; white-space: -moz-pre-wrap;  white-space: -pre-wrap; white-space: -o-pre-wrap; word-wrap: break-word;">{!! $dv->dv_explanation !!}</pre>
									</div>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none; height:30em;">
									<div class="row" style="padding-left:10px; padding-top:10px;">
										<span style="font-size:20px;  position: static; padding-left:60px;"><strong>{{ SanitizeHelper::stringOutputSanitize(number_format($dv->dv_amount, 2)) }}</strong></span>
									</div>
								</div>


								<div class="col-sm-6" style="border-style:solid; border-top-style: none; padding-bottom:22px;">
									<div class="row">
										<span style="border:solid; border-top-style: none; border-left-style: none;"><strong>&nbsp;A&nbsp;</strong></span>
										<span style="padding-left:10px; padding-top:5px; font-size:16px;"><strong>Certified</strong></span>
									</div>
									<span style="padding-left:100px; font-size:17px;">Supporting documents complete</span>
								</div>
								<div class="col-sm-6" style="border-style:solid; border-top-style: none; border-left-style: none; padding-bottom:18px;">
									<div class="row">
										<span style="border:solid; border-top-style: none; border-left-style: none;"><strong>&nbsp;B&nbsp;</strong></span>
										<span style="padding-left:10px; padding-top:5px; font-size:16px;"><strong>Approved for Payment</strong></span>
									</div>
									<span style="padding-left:250px; font-size:25px;"><strong>{{ SanitizeHelper::stringOutputSanitize(number_format($dv->dv_amount, 2)) }}</strong></span>
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:7px;">
									<span><strong>Signature:</strong></span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none;">
								</div>
								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:7px;">
									<span><strong>Signature:</strong></span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none;" >
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:0px; padding-top:5px; padding-bottom:5px;">
									<span style="font-size:11px; font-weight:bold;">Printed Name:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none; padding:0px; margin-top:0px;">
									<center><span style="font-size:17px; font-weight:bold;">{{ SanitizeHelper::stringOutputSanitize($dv->dv_certified_by) }}</span></center>
								</div>
								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:0px; padding-top:5px; padding-bottom:5px;">
									<span style="font-size:11px; font-weight:bold;">Printed Name:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; padding:0px; margin-top:0px;">
									<center><span style="font-size:17px; font-weight:bold;">{{ SanitizeHelper::stringOutputSanitize($dv->dv_approved_by) }}</span></center>
								</div>


								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:2px; padding-bottom:25px;">
									<span style="font-size:13px; font-weight:bold;">Position:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-right-style: none; border-left-style: none;">
									<div class="row">
										<div class="col-sm-12" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none;">
											<center><span style="font-size:17px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_certified_by_position) }}</strong></span></center>
										</div>
										<div class="col-sm-12" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none; border-bottom-style: none;">
											<center><span style="font-size:12px; font-weight: bold;">Head, Accounting Unit/Authorized Representative</span></center>
										</div>
									</div>
								</div>
								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:2px; padding-bottom:30px;">
									<span style="font-size:13px; font-weight:bold;">Position:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none;">
									<div class="row">
										<div class="col-sm-12" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none; ">
											<center><span style="font-size:17px;"><strong>{{ SanitizeHelper::stringOutputSanitize($dv->dv_approved_by_position) }}</strong></span></center>
										</div>
										<div class="col-sm-12" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none; border-bottom-style: none;">
											<center><span style="font-size:12px; font-weight: bold;">Agency Head / Authorized Representative</span></center>
										</div>
									</div>
								</div>



								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:4px;">
									<span style="font-size:13px; font-weight: bold;">Date:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; border-right-style: none; margin-top: 4px;">
									<span style="font-size:15px; font-weight: bold;">{{ SanitizeHelper::stringOutputSanitize($dv->dv_certified_by_sig_date) }}</span>
								</div>
								<div class="col-sm-1" style="border-style:solid; border-top-style: none; padding:2px;">
									<span style="font-size:13px; font-weight: bold;">Date:</span>
								</div>
								<div class="col-sm-5" style="border-style:solid; border-top-style: none; border-left-style: none; padding-top:4px;">
									<span style="font-size:15px; font-weight: bold;">{{ SanitizeHelper::stringOutputSanitize($dv->dv_approved_by_sig_date) }}</span>
								</div>


								<div class="col-sm-9" style="border-style:solid; border-top-style: none;">
									<div class="row">
										<span style="border:solid; border-top-style: none; border-left-style: none;"><strong>&nbsp;C&nbsp;</strong></span>
										<span style="font-weight: bold; padding-left:5px; font-size:16px;">Received Payment:</span>
									</div>
									<div class="row">
										<div class="col-md-1" style="border:solid; padding:6px; border-left-style: none; border-bottom-style: none;" >
											<span style="font-size:12px; font-weight: bold;" >Check/ADA No.:</span>
										</div>
										<div class="col-md-4" style="border:solid; border-left-style: none; border-bottom-style: none;">
										</div>
										<div class="col-md-2" style="border:solid; border-left-style: none; border-bottom-style: none; padding:2px;">
											<span style="font-size:12px; font-weight: bold;">Date:</span>
										</div>
										<div class="col-md-5" style="border:solid; border-left-style: none; border-right-style: none; border-bottom-style: none; padding:2px;">
											<span style="font-size:12px; font-weight: bold;">Bank Name:</span>
										</div>
									</div>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none; padding-bottom:40px;">
									<span style="font-size:16px; font-weight:bold;">JEV No.</span>
								</div>



								<div class="col-sm-9" style="border-style:solid; border-top-style: none;">
									<div class="row">

										<div class="col-md-1" style="border:solid; padding-bottom:10px; border-left-style: none; border-top-style: none; padding:1px; padding-top:10px; padding-bottom:10px;">
											<span style="font-size:13px; font-weight: bold;">Signature:</span>
										</div>
										<div class="col-md-4" style="border:solid; border-left-style: none; border-top-style: none;"></div>
										<div class="col-md-2" style="border:solid; border-left-style: none; border-top-style: none; padding:2px;">
											<span style="font-size:12px; font-weight: bold;">Date:</span>
										</div>
										<div class="col-md-5" style="border:solid; border-left-style: none; border-right-style: none; border-top-style: none; padding:2px;">
											<span style="font-size:12px; font-weight: bold;">Printed Name:</span>
										</div>
									</div>
									<div class="row" style="padding-bottom:20px;">
										<span style="font-size:12px; font-weight: bold;">Official Receipt (OR)/Other Documents:</span>
									</div>
								</div>
								<div class="col-sm-3" style="border-style:solid; border-top-style: none; border-left-style: none; padding-bottom:40px;">
									<span style="font-size:16px; font-weight:bold;">Date:</span>
								</div>


								<div class="col-sm-12">
									<div class="row">
										<div class="col-md-9">
											<span style="font-size:11px; font-style:italic; margin-left:15px;">Username: {{ SanitizeHelper::stringOutputSanitize(Auth::user()->username) }} &nbsp;|&nbsp; IP Address: {{ SanitizeHelper::stringOutputSanitize($dv->ip_created) }} &nbsp;|&nbsp; Computer Name: {{ SanitizeHelper::stringOutputSanitize($dv->machine_created) }}</span>
										</div> 
										<div class="col-md-3">
											<span style="font-size:13px;">FM-AFD-ACC-001, Rev. 00</span>
										</div>
										<div class="col-md-9">
											<span style="font-size:12px; font-weight:bold; font-style:italic; margin-left:15px;">DOC NO: {{ SanitizeHelper::stringOutputSanitize($dv->doc_no) }}</span>
										</div>
										<div class="col-md-3">
											<span style="font-size:13px;">Effectivity Date: March 12, 2015</span>
										</div>
									</div>
								</div>
								

							</div>
						</div>
						<center>
							<button class="btn bg-success-600 text-auto fuse-ripple-ready" id="frontBtn">
								<span style="color:white;"> <i style="font-size:18px;" class="icon icon-printer"></i> Print</span>
							</button>
						</center>
				    </div>





				    <div class="tab-pane fade" id="back" role="tabpanel" aria-labelledby="back-tab" aria-expanded="false">
				        <div id="backDiv">
							<div class="row" style="padding:20px;">
								<div class="col-md-12" style="margin-top:60px;">
									<center>
					        			<h4>DISBURSEMENT VOUCHER (DV)</h4>
					        			<span style="font-style:italic; font-size: 18px;">INSTRUCTIONS</span>	
					        		</center>
				        		</div>
								<div class="col-md-12" style="margin-top:25px;"></div>
				        		<div class="col-md-6">
				        			<div class="row">
						        		<div class="col-md-2">
						        			<span style="float:right;">A.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p> The OV shall be printed in one whole sheet of <br>
						        			8 1/2 x 11 size bond paper. This shall be prepared <br>
						        		    in three copies to be distributed as follows:</p>

						        		    <span><span style="font-style: italic;">Original</span> - Accounting Unit</span><br>
						        		    <span><span style="font-style: italic;">Duplicate</span> - Cash Unit</span><br>
						        		    <span><span style="font-style: italic;">Triplicate</span> - Payee</span>
						        		</div>
						        		<div class="col-md-12" style="margin-top:10px;"></div>
						        		<div class="col-md-2">
						        			<span style="float:right;">B.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p> The Accounting Unit shall stamp the date of<br>
						        			receipt on the face of this form.</p>
						        		</div>

						        		<div class="col-md-12" style="margin-top:10px;"></div>
						        		 <div class="col-md-2">
						        			<span style="float:right;">c.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p> This form shall be accomplished in the following<br>
						        			manner:</p>
						        			<div class="row">
						        				<div class="col-md-1">
						        					<span style="float:right;">1.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>DV No./Date</strong> - number assigned to the DV <br>
					        						by the Accounting Unit and the date of DV <br>
					        						preparation. It shall be numbered as follows:</p>
					        						<u>0000</u> &nbsp;&nbsp;&nbsp; <u>00</u> &nbsp;&nbsp;&nbsp; <u>0000</u>
					        						<div class="row">
				        								<div style="border-left: 2px solid; width: 120px; border-bottom: 2px solid; height: 80px; margin-left:31px;">
				        									<div class="arrow" style="margin-top: 73px; margin-left: 108px;"></div>
				        								</div>

				        								<div style="border-left: 2px solid; width: 80px; border-bottom: 2px solid; height: 60px; margin-left:-80px;">
				        									<div class="arrow" style="margin-top: 53.2px; margin-left: 68px;"></div>
				        								</div>
				        								<div style="border-left: 2px solid; width: 40px; border-bottom: 2px solid; height: 25px; margin-left:-39px;">
				        									<div class="arrow" style="margin-top: 18.2px; margin-left: 28px;"></div>
				        								</div>
						        						<div class="row">	
						        							<p style="margin-left:30px; margin-top:10px; font-size:13px;">
						        								Serial number<br>
						        								(one series each year)<br>
						        								<span>Month</span><br>
						        								<span>Year</span>
						        							</p><br>
					        							</div>
					        						</div>
						        				</div>


						        				<div class="col-md-1">
						        					<span style="float:right;">2.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>Mode of Payment</strong> - put a check " . " mark in <br>
					        						the appropriate box opposite the mode of <br>
					        						payment.</p>
						        				</div>
						        				<div class="col-md-1">
						        					<span style="float:right;">3.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>Payee</strong> - name of the payee/creditor<br></p>
						        				</div>
						        				<div class="col-md-1">
						        					<span style="float:right;">4.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>TIN/Employee No.</strong> - Tax Identification<br>
						        					Number (TIN) of the claimant/Identification<br>
						        					Number assigned by the agency to the officer/<br>
						        					employee.
						        					</p>
						        				</div>
						        				<div class="col-md-1">
						        					<span style="float:right;">5.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>BUR No.</strong> - Number of the Budget Utilization<br>
						        					Request supporting the DV.
						        					</p>
						        				</div>
						        				<div class="col-md-1">
						        					<span style="float:right;">6.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>Address</strong> - address of the claimant</p>
						        				</div>
						        				<div class="col-md-1">
						        					<span style="float:right;">7.</span>
						        				</div>
						        				<div class="col-md-11">
						        					<p><strong>Responsibility Center (Office/Unit/Project and <br> 
						        					Code)</strong> - the office/unit/project and code assigned<br>
						        					to the cost center where the disbursement shall<br>
						        					be charged.</p>
						        				</div>

						        			</div>
						        		</div>

						        	</div>
						        </div>


						        <div class="col-md-6">
						        	<div class="row">
						        		<div class="col-md-2">
						        			<span style="float:right;">8.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>Explanation</strong> - brief description of the disbursement</p>
						        		</div>
						        		<div class="col-md-2">
						        			<span style="float:right;">9.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>Amount</strong> - amount of claim</p>
						        		</div>
						        		<div class="col-md-2">
						        			<span style="float:right;">10.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>Certfied (Box A)</strong> - certification by the Head of<br>
						        			Accounting Unit or his authorized representative<br>
						        			as to completeness of supporting documents.<br>
						        			The certifying officer shall affix his signature, print<br>
						        			his name, indicate his position, and the date of his<br>
						        			signing on the spaces provided. </p>
						        		</div>
						        		<div class="col-md-2">
						        			<span style="float:right;">11.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>Approved for Payment (Box B)</strong> - approval by the<br>
						        			Head of the Agency or his Authorized Representative<br>
						        			on the payment covered by the DV.<br>
						        			The approving officer shall affix his signature, print<br>
						        			his name, indicate his position, and the date of his<br>
						        			signing on the spaces provided.</p>
						        		</div>
						        		<div class="col-md-2">
						        			<span style="float:right;">12.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>Recieved Payment (Box C)</strong> - acknowledment by the<br>
						        			claimant or his duly authorized representative for<br>
						        			the receipt of the check/cash and the date of receipt.<br>
						        			The claimant/payee shall affix his signature on the<br>
						        			space provided and shall indicate the number and<br>
						        			date of the check, bank name and number and<br>
						        			date of OR/other relevant documents issued to<br>
						        			acknowledge the reciept of payment.</p>
						        		</div>
						        		<div class="col-md-2">
						        			<span style="float:right;">13.</span>
						        		</div>
						        		<div class="col-md-10">
						        			<p><strong>JEV No. and Date</strong> - number and date of the Journal<br>
						        			Entry VOucher<br></p>
						        		</div>
						        	</div>
						        </div>
							</div>
						</div>
						<br><br>
						<center>
							<button class="btn bg-success-600 text-auto fuse-ripple-ready" id="backBtn">
								<span style="color:white;"> <i style="font-size:18px;" class="icon icon-printer"></i> Print</span>
							</button>
						</center>
				    </div>

			    	</div>
				</div>
			</div>

		</div>
	</div>
</div>
</div>

@endsection

@section('scripts')
	{!! JSHelper::Print('frontBtn', 'frontDiv') !!}
	{!! JSHelper::Print('backBtn', 'backDiv') !!}
@endsection