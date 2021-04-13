
<div class="col-sm-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">My Profile</h5>

        </div>
        <ul class="list-group list-group-flush">
          <a style="background: #7fad39" href="{{ route('user.profile') }}" class="btn btn-small btn-block text-white">Home</a>
          <a style="background: #7fad39" href="{{ route('user.order') }}" class="btn btn-small btn-block text-white">My Orders</a>
          <a href="{{ url('/logout') }}" class="btn btn-danger btn-small btn-block">Logout</a>
        </ul>
      </div>
</div>
