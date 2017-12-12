<table>
<tr>
	<th>Username</th>
	<th>Password</th>
	<th>Email</th>
</tr>
@foreach ($allusers as $user)
<tr>
	<td>{{$user->username}}</td>
	<td>{{$user->password}}</td>
	<td>{{$user->email}}</td>
</tr>
@endforeach
</table>
