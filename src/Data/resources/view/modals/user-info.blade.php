<div class="modal-header">
			            <h3 class="modal-title" id="modal-title">Create User</h3>
			        </div>
			        <div class="modal-body" id="modal-body">
			            <div class="row">
			            	<div class="col-lg-12" ng-show="errors.length">
			            		<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									There was an error registering new user.
									<ul>
										<li ng-repeat="error in errors">@{{ error }}</li>
									</ul>
								</div>
			            	</div>
			            	<div class="col-lg-6">
			            	
		            			<div class="form-group">
								    <label for="username">Username</label>
								    <input type="text" ng-model="user.username" class="form-control" id="username" placeholder="Username">
							  	</div>

							  	<div class="form-group">
								    <label for="email">Email</label>
								    <input type="text" ng-model="user.email" class="form-control" id="email" placeholder="Email">
							  	</div>

							  	<div class="form-group">
								    <label for="password">Password</label>
								    <input type="password" ng-model="user.password" class="form-control" id="password" placeholder="Password">
							  	</div>
			            	</div>

			            	<div class="col-lg-6">
		            			<div class="form-group">
								    <label for="firstname">First Name</label>
								    <input type="text" ng-model="user.first_name" class="form-control" id="firstname" placeholder="First Name">
							  	</div>
							  	<div class="form-group">
								    <label for="lastname">Last Name</label>
								    <input type="text" ng-model="user.last_name" class="form-control" id="lastname" placeholder="Last Name">
							  	</div>
							  	
							  	<div class="row">
							  		<div class="col-lg-4">
							  			<div class="form-group">
										    <label for="permission">Role</label>
										    <ui-select multiple ng-model="user.permit_codes.role" theme="bootstrap" close-on-select="false" title="Choose a role">
		    									<ui-select-match placeholder="Select role...">
		    										@{{ $item.role_name ? $item.role_name : $item }}
		    									</ui-select-match>
												<ui-select-choices repeat="role.role_name as role in roles">
		  											<div ng-bind-html="role.role_name | highlight: $select.search"></div>
												</ui-select-choices>
											</ui-select>
							  			</div>
							  		</div>
							  		
							  		<div class="col-lg-4">
							  			<div class="form-group">
										    <label for="permission">Permit</label>
										    <ui-select multiple ng-model="user.permit_codes.permit" theme="bootstrap" close-on-select="false" title="Choose a permit">
		    									<ui-select-match placeholder="Select permit...">
		    										@{{ $item.permit_code ? $item.permit_code : $item }}
		    									</ui-select-match>
												<ui-select-choices repeat="permit in permissions">
		  											<div ng-bind-html="permit.permit_name | highlight: $select.search"></div>
											      	<small>
											        	Permit Code: <span ng-bind-html="''+permit.permit_code | highlight: $select.search"></span>
											      	</small>
												</ui-select-choices>
											</ui-select>
									  	</div>
							  		</div>

							  		<div class="col-lg-4">
							  			<div class="form-group">
										    <label for="permission">Ban</label>
										    <ui-select multiple ng-model="user.permit_codes.ban" theme="bootstrap" close-on-select="false" title="Choose a permit">
		    									<ui-select-match placeholder="Select permit...">
		    										@{{ $item.permit_code ? $item.permit_code : $item }}
		    									</ui-select-match>
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
			            	<div class="clear"></div>
			            </div
			        </div>
			        <div class="modal-footer">
			            <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
			            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
			        </div>