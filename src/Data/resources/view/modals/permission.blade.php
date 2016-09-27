<div class="modal-header">
			            <h3 class="modal-title" id="modal-title">Add Permission</h3>
			        </div>
			        <div class="modal-body" id="modal-body">
			            <div class="row">
			            	<div class="col-lg-12" ng-show="errors.length">
			            		<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									There was an error registering new permission.
									<ul>
										<li ng-repeat="error in errors">@{{ error }}</li>
									</ul>
								</div>
			            	</div>

			            	<div class="col-lg-12">
		            			<div class="form-group">
								    <label for="permitname">Permit Name</label>
								    <input type="text" ng-model="permission.permit_name" class="form-control" id="permitname" placeholder="Permit Name">
							  	</div>

							  	<div class="form-group">
								    <label for="permitcode">Permit Code</label>
								    <input type="text" ng-model="permission.permit_code" class="form-control" id="permitcode" placeholder="Permit Code">
							  	</div>
						  	</div>
			            </div>
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-primary" type="button" ng-click="ok()">Submit</button>
			            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
			        </div>