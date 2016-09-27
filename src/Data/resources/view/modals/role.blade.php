<div class="modal-header">
			            <h3 class="modal-title" id="modal-title">Add Role</h3>
			        </div>
			        <div class="modal-body" id="modal-body">
			            <div class="row">
			            	<div class="col-lg-12" ng-show="errors.length">
			            		<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									There was an error registering new role.
									<ul>
										<li ng-repeat="error in errors">@{{ error }}</li>
									</ul>
								</div>
			            	</div>

			            	<div class="col-lg-12">
		            			<div class="form-group">
								    <label for="username">Role</label>
								    <input type="text" ng-model="role.role_name" class="form-control" id="username" placeholder="Role">
							  	</div>

							  	<div class="form-group">
								    <label for="permission">Permission</label>
								    <ui-select multiple ng-model="role.permit_codes.permit" theme="bootstrap" close-on-select="false" title="Choose a permit">
    									<ui-select-match placeholder="Select permit...">@{{ $item.permit_code ? $item.permit_code : $item }}</ui-select-match>
										<ui-select-choices repeat="permit in permissions">
  											<div ng-bind-html="permit.permit_name | highlight: $select.search"></div>
									      	<small>
									        	Permit Code: <span ng-bind-html="''+permit.permit_code | highlight: $select.search"></span>
									      	</small>
										</ui-select-choices>
									</ui-select>
							  	</div>
						  	</div>
			            </div>
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-primary" type="button" ng-click="ok()">Submit</button>
			            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
			        </div>