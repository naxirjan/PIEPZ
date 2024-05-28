<div>
   
  <!-- User Card -->
  <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            <img class="img-fluid rounded mb-3 pt-1 mt-4" src="{{ asset('assets/img/avatars/15.png') }}" height="100" width="100" alt="User avatar" />
            <div class="user-info text-center">
              <h4 class="mb-2">Name</h4>
              <span class="badge bg-label-secondary mt-1">Author</span>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
          <div class="d-flex align-items-start me-4 mt-3 gap-2">
            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
            <div>
              <p class="mb-0 fw-semibold">1.23k</p>
              <small>Tasks Done</small>
            </div>
          </div>
          <div class="d-flex align-items-start mt-3 gap-2">
            <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
            <div>
              <p class="mb-0 fw-semibold">568</p>
              <small>Projects Done</small>
            </div>
          </div>
        </div>
        <p class="mt-4 small text-uppercase text-muted">Details</p>
        <div class="info-container">
          <ul class="list-unstyled">
            <li class="mb-2">
              <span class="fw-semibold me-1">Username:</span>
              <span>violet.dev</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Email:</span>
              <span>vafgot@vultukir.org</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Status:</span>
              <span class="badge bg-label-success">Active</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Role:</span>
              <span>Author</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Tax id:</span>
              <span>Tax-8965</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Contact:</span>
              <span>(123) 456-7890</span>
            </li>
            <li class="mb-2 pt-1">
              <span class="fw-semibold me-1">Languages:</span>
              <span>French</span>
            </li>
            <li class="pt-1">
              <span class="fw-semibold me-1">Country:</span>
              <span>England</span>
            </li>
          </ul>
          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
            <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /User Card -->
    <!-- Plan Card -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-start">
          <span class="badge bg-label-primary">Standard</span>
          <div class="d-flex justify-content-center">
            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary fw-normal">$</sup>
            <h1 class="fw-semibold mb-0 text-primary">99</h1>
            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
          </div>
        </div>
        <ul class="ps-3 g-2 my-3">
          <li class="mb-2">10 Users</li>
          <li class="mb-2">Up to 10 GB storage</li>
          <li>Basic Support</li>
        </ul>
        <div class="d-flex justify-content-between align-items-center mb-1 fw-semibold text-heading">
          <span>Days</span>
          <span>65% Completed</span>
        </div>
        <div class="progress mb-1" style="height: 8px;">
          <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span>4 days remaining</span>
        <div class="d-grid w-100 mt-4">
          <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Upgrade Plan</button>
        </div>
      </div>
    </div>
    <!-- /Plan Card -->
</div>