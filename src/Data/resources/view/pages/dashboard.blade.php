<div class="row content">
                    <div class="col-lg-12">
                        <div class="box">
                        	<div class="box-header">
                        		<div class="pull-right box-header-nav">
                        			<a href="#" ng-click="addUser()"><i class="fa fa-plus"></i> Add User</a>
                        		</div>
                        		<h3>Users</h3>
                        		<small>List of user register in cactus</small>
                    		</div>

                    		<div class="box-body">
                    			<table class="table table-striped">
								    <thead>
								      	<tr>
								        	<th>#</th>
									        <th>First Name</th>
									        <th>Last Name</th>
									        <th>Username</th>
									        <th>Email</th>
									        <th>Action</th>
								      	</tr>
								    </thead>
								    <tbody>
								    	<tr ng-repeat="user in users.data | limitTo:users.per_page">
								    		<td>@{{ $index + 1 }}</td>
								    		<td>@{{ user.first_name }}</td>
								    		<td>@{{ user.last_name }}</td>
								    		<td>@{{ user.username }}</td>
								    		<td>@{{ user.email }}</td>
								    		<td class="table-btn">
								    			<button type="button" class="btn btn-sm" ng-click="editUser(user)"><i class="fa fa-pencil"></i></button> 
								    			<button type="button" class="btn btn-sm" ng-click="deleteUser(user)"><i class="fa fa-close"></i></button>
								    		</td>
								    	</tr>
								    </tbody>
							  	</table>

							  	<div>
							        <cactus-pagination page-item="users" factory="userData"></cactus-pagination>
						      	</div>
                    		</div>		
                        </div>
                    </div>
                </div>
