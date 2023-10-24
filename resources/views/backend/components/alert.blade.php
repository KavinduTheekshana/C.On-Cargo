@if (count($errors) > 0)


<div class="alert alert-danger alert-dismissible" role="alert">
    <h4 class="alert-heading d-flex align-items-center">
      <i class="mdi mdi-alert-circle-outline mdi-24px me-2"></i>Error!!
    </h4>
    <p>
        <strong>Whoops!</strong> There were some problems with
        your input.
    </p>
    <hr />
    <p class="mb-0">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    <h4 class="alert-heading d-flex align-items-center">
      <i class="mdi mdi-check-circle-outline mdi-24px me-2"></i>Well done :)
    </h4>
    <hr />
    <p class="mb-0">
        {{ session('status') }}
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

@endif