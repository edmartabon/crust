<div class="row content">
					<div class="col-sm-6">
                    	<div class="box">
                        	<div class="box-header">
                        		<div class="pull-right box-header-nav">
                        			<a ng-click="addRole()"><i class="fa fa-plus"></i> Add Role</a>
                        		</div>
                        		<h3>Roles</h3>
                        		<small>List of role register in cactus</small>
                    		</div>

                    		<div class="box-body">
                    			<table class="table table-striped">
								    <thead>
								      	<tr>
								        	<th>#</th>
									        <th>Role Name</th>
									        <th>Bind Permission</th>
									        <th>Action</th>
								      	</tr>
								    </thead>
								    <tbody>
								    	<tr ng-repeat="role in roles.data | limitTo:roles.per_page">
								    		<td>@{{ $index + 1 }}</td>
								    		<td>@{{ role.role_name }}</td>
								    		<td>Role</td>
								    		<td class="table-btn">
								    			<button type="button" class="btn btn-sm" ng-click="editRole(role)"><i class="fa fa-pencil"></i></button> 
								    			<button type="button" class="btn btn-sm" ng-click="deleteRole(role)"><i class="fa fa-close"></i></button>
								    		</td>
								    	</tr>
								    </tbody>
							  	</table>
							  	
							  	<div>
							        <cactus-pagination page-item="roles" factory="roleData"></cactus-pagination>
						      	</div>
                    		</div>		
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="box">
                        	<div class="box-header">
                        		<div class="pull-right box-header-nav">
                        			<a ng-click="addPermission()"><i class="fa fa-plus"></i> Add Permission</a>
                        		</div>
                        		<h3>Permission</h3>
                        		<small>List of permission register in cactus</small>
                    		</div>

                    		<div class="box-body">
                    			<table class="table table-striped">
								    <thead>
								      	<tr>
								        	<th>#</th>
									        <th>Permission Name</th>
									        <th>Permission Code</th>
									        <th>Action</th>
								      	</tr>
								    </thead>
								    <tbody>
							    		<tr ng-repeat="permit in permits.data | limitTo:permits.per_page">
							    			<td>@{{ $index + 1 }}</td>
								    		<td>@{{ permit.permit_name }}</td>
								    		<td>@{{ permit.permit_code }}</td>
								    		<td class="table-btn">
								    			<button type="button" class="btn btn-sm" ng-click="editPermission(permit)"><i class="fa fa-pencil"></i></button> 
								    			<button type="button" class="btn btn-sm" ng-click="deletePermission(permit)"><i class="fa fa-close"></i></button>
								    		</td>
							    		</tr>
								    </tbody>
							  	</table>

							  	<div>
							        <cactus-pagination page-item="permits" factory="permitData"></cactus-pagination>
						      	</div>
                    		</div>		
                        </div>                    	
                    </div>
                </div>
