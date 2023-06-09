<div class="sidebar p-2 py-md-3 @@cardClass">
    <div class="container-fluid">

      <div class="title-text d-flex align-items-center mb-4 mt-1">
        <h4 class="sidebar-title mb-0 flex-grow-1"><span class="sm-txt">L</span><span>UNO Admin</span></h4>
        <div class="dropdown morphing scale-left">
          <a class="dropdown-toggle more-icon" href="#" role="button" data-bs-toggle="dropdown"><i
              class="fa fa-ellipsis-h"></i></a>
          <ul class="dropdown-menu shadow border-0 p-2 mt-2" data-bs-popper="none">
            <li class="fw-bold px-2">Quick Actions</li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./landing/index.html" aria-current="page">Landing page</a></li>
            <li><a class="dropdown-item" href="./inventory/index.html">Inventory</a></li>
            <li><a class="dropdown-item" href="./ecommerce/index.html">eCommerce</a></li>
            <li><a class="dropdown-item" href="./hrms/index.html">HRMS</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="./account-invoices.html">Invoices List</a></li>
            <li><a class="dropdown-item" href="./account-create-invoices.html">Create Invoices</a></li>
          </ul>
        </div>
      </div>

      <div class="create-new py-3 mb-2">
        <div class="d-flex">
          <select class="form-select rounded-pill me-1">
            <option selected>Select Project</option>
            <option value="1">Luno University</option>
            <option value="2">Book Manager</option>
            <option value="3">Luno Sass App</option>
          </select>
          <button class="btn bg-primary text-white rounded-circle" data-bs-toggle="modal" data-bs-target="#CreateNew"
            type="button"><i class="fa fa-plus"></i></button>
        </div>
      </div>

      <div class="main-menu flex-grow-1">
        <ul class="menu-list">
          <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Unique dashboard
              designs </small></li>
          <li class="collapsed">
            <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#my_dashboard" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path class="var(--secondary-color)" fill-rule="evenodd"
                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg>
              <span class="ms-2">Brands <span class="badge bg-danger" > {{App\Models\brand::count()}}</span></span>
            </span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse show" id="my_dashboard">
              <li><a class="ms-link" href="{{route('create-brand')}}">Add brand</a></li>
              <li><a class="ms-link" href="{{route('show')}}">brands </a> </li>
              {{-- <li><a class="ms-link" href="index-iot.html">IOT</a></li> --}}
            </ul>
          </li>


          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Account" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M2 1C1.46957 1 0.960859 1.21071 0.585786 1.58579C0.210714 1.96086 0 2.46957 0 3L0 13C0 13.5304 0.210714 14.0391 0.585786 14.4142C0.960859 14.7893 1.46957 15 2 15H14C14.5304 15 15.0391 14.7893 15.4142 14.4142C15.7893 14.0391 16 13.5304 16 13V3C16 2.46957 15.7893 1.96086 15.4142 1.58579C15.0391 1.21071 14.5304 1 14 1H2ZM1 3C1 2.73478 1.10536 2.48043 1.29289 2.29289C1.48043 2.10536 1.73478 2 2 2H14C14.2652 2 14.5196 2.10536 14.7071 2.29289C14.8946 2.48043 15 2.73478 15 3V13C15 13.2652 14.8946 13.5196 14.7071 13.7071C14.5196 13.8946 14.2652 14 14 14H2C1.73478 14 1.48043 13.8946 1.29289 13.7071C1.10536 13.5196 1 13.2652 1 13V3ZM2 5.5C2 5.36739 2.05268 5.24021 2.14645 5.14645C2.24021 5.05268 2.36739 5 2.5 5H6C6.13261 5 6.25979 5.05268 6.35355 5.14645C6.44732 5.24021 6.5 5.36739 6.5 5.5C6.5 5.63261 6.44732 5.75979 6.35355 5.85355C6.25979 5.94732 6.13261 6 6 6H2.5C2.36739 6 2.24021 5.94732 2.14645 5.85355C2.05268 5.75979 2 5.63261 2 5.5ZM2 8.5C2 8.36739 2.05268 8.24021 2.14645 8.14645C2.24021 8.05268 2.36739 8 2.5 8H6C6.13261 8 6.25979 8.05268 6.35355 8.14645C6.44732 8.24021 6.5 8.36739 6.5 8.5C6.5 8.63261 6.44732 8.75979 6.35355 8.85355C6.25979 8.94732 6.13261 9 6 9H2.5C2.36739 9 2.24021 8.94732 2.14645 8.85355C2.05268 8.75979 2 8.63261 2 8.5ZM2 10.5C2 10.3674 2.05268 10.2402 2.14645 10.1464C2.24021 10.0527 2.36739 10 2.5 10H6C6.13261 10 6.25979 10.0527 6.35355 10.1464C6.44732 10.2402 6.5 10.3674 6.5 10.5C6.5 10.6326 6.44732 10.7598 6.35355 10.8536C6.25979 10.9473 6.13261 11 6 11H2.5C2.36739 11 2.24021 10.9473 2.14645 10.8536C2.05268 10.7598 2 10.6326 2 10.5Z" />
                <path class="fill-secondary"
                  d="M8.5 11C8.5 11 8 11 8 10.5C8 10 8.5 8.5 11 8.5C13.5 8.5 14 10 14 10.5C14 11 13.5 11 13.5 11H8.5ZM11 8C11.3978 8 11.7794 7.84196 12.0607 7.56066C12.342 7.27936 12.5 6.89782 12.5 6.5C12.5 6.10218 12.342 5.72064 12.0607 5.43934C11.7794 5.15804 11.3978 5 11 5C10.6022 5 10.2206 5.15804 9.93934 5.43934C9.65804 5.72064 9.5 6.10218 9.5 6.5C9.5 6.89782 9.65804 7.27936 9.93934 7.56066C10.2206 7.84196 10.6022 8 11 8V8Z" />
              </svg>
              <span class="ms-2">Slider <span class="badge bg-danger" > {{App\Models\slider::count()}}</span></span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu-Account">
              <li><a class="ms-link" href="{{route('create-slider')}}"> Add Slider</a></li>
              <li><a class="ms-link" href="{{route('show-slider')}}">Sliders</a></li>
              {{-- <li><a class="ms-link" href="account-create-invoice.html">Create Invoices</a></li>
              <li><a class="ms-link" href="account-billing.html">Billing</a></li> --}}
            </ul>
          </li>

          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_dashboard" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary"
                  d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                <path fill-rule="evenodd"
                  d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
              </svg>
              <span class="ms-2">category <span class="badge bg-danger" > {{App\Models\Category::count()}}</span> </span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu_dashboard">
              <li><a class="ms-link" href="{{route('create-category')}}">Add category</a></li>
              <li><a class="ms-link" href="{{route('category')}}">categories</a></li>
              {{-- <li><a class="ms-link" href="./ecommerce/index.html"></a></li> --}}
              {{-- <li><a class="ms-link" href="./event/index.html">Event Management</a></li>
              <li><a class="ms-link" href="./fitness/index.html">Fitness Analytics</a></li>
              <li><a class="ms-link" href="./hospital/index.html">Hospital Management</a></li>
              <li><a class="ms-link" href="./hrms/index.html">HR & Project</a></li>
              <li><a class="ms-link" href="./inventory/index.html">Inventory Management</a></li>
              <li><a class="ms-link" href="./job-portal/index.html">job Portal</a></li>
              <li><a class="ms-link" href="./music/index.html">Music Streaming</a></li>
              <li><a class="ms-link" href="./nft/index.html">NFT Dashboard (New)</a></li>
              <li><a class="ms-link" href="./real-estate/index.html">Real-Estate</a></li>
              <li><a class="ms-link" href="./restaurant/index.html">Restaurant & Cafe</a></li>
              <li><a class="ms-link" href="./server/index.html">Server Analysis</a></li>
              <li><a class="ms-link" href="./university/index.html">School / University</a></li> --}}
            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Applications" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path
                  d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
                <path class="fill-secondary" d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              </svg>
              <span class="ms-2">products <span class="badge bg-danger" > {{App\Models\product::count()}}</span></span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu-Applications">
              <li><a class="ms-link" href="{{route('create-product')}}">Add product</a></li>
               <li><a class="ms-link" href="{{route('product')}}">products</a></li>
              {{-- <li><a class="ms-link" href="app-email.html">Email App</a></li> --}}
            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu_pages" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary" fill-rule="evenodd"
                  d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708zm-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708z" />
                <path
                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                <path
                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
              </svg>
              <span class="ms-2">Crafted Pages</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu_pages">
              <li><a class="ms-link" href="{{route('profile')}}">My Profile</a></li>
              <li><a class="ms-link" href="page-bookmark.html">Bookmarks</a></li>
              <li><a class="ms-link" href="page-timeline.html">Timeline</a></li>
              <li><a class="ms-link" href="page-imagegallery.html">Image Gallery</a></li>
              <li><a class="ms-link" href="page-pricing.html">Pricing</a></li>
              <li><a class="ms-link" href="page-teamsboard.html">Teams Board</a></li>
              <li><a class="ms-link" href="page-support-ticket.html">Support Ticket</a></li>
              <li><a class="ms-link" href="page-faqs.html">FAQs</a></li>
              <li><a class="ms-link" href="page-search.html">Search Pages</a></li>
              <li><a class="ms-link" href="page-footers.html">Footers</a></li>
            </ul>
          </li>

          {{-- <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Authentication" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path
                  d="M5.33801 1.59C4.38559 1.85248 3.43965 2.1379 2.50101 2.446C2.41529 2.47376 2.3391 2.52504 2.28111 2.59399C2.22312 2.66295 2.18567 2.7468 2.17301 2.836C1.61901 6.993 2.89901 10.026 4.42601 12.024C5.07252 12.8784 5.84341 13.6311 6.71301 14.257C7.05901 14.501 7.36501 14.677 7.60601 14.79C7.72601 14.847 7.82401 14.885 7.89901 14.908C7.93181 14.9195 7.96562 14.9279 8.00001 14.933C8.03398 14.9275 8.06743 14.9191 8.10001 14.908C8.17601 14.885 8.27401 14.847 8.39401 14.79C8.63401 14.677 8.94101 14.5 9.28701 14.257C10.1566 13.6311 10.9275 12.8784 11.574 12.024C13.101 10.027 14.381 6.993 13.827 2.836C13.8145 2.74676 13.777 2.66285 13.719 2.59388C13.661 2.52491 13.5848 2.47366 13.499 2.446C12.848 2.233 11.749 1.886 10.662 1.591C9.55201 1.29 8.53101 1.067 8.00001 1.067C7.47001 1.067 6.44801 1.289 5.33801 1.59ZM5.07201 0.56C6.15701 0.265 7.31001 0 8.00001 0C8.69001 0 9.84301 0.265 10.928 0.56C12.038 0.86 13.157 1.215 13.815 1.43C14.0901 1.52085 14.334 1.68747 14.5187 1.9107C14.7034 2.13394 14.8213 2.40474 14.859 2.692C15.455 7.169 14.072 10.487 12.394 12.682C11.6824 13.621 10.834 14.4479 9.87701 15.135C9.5461 15.3728 9.19549 15.5819 8.82901 15.76C8.54901 15.892 8.24801 16 8.00001 16C7.75201 16 7.45201 15.892 7.17101 15.76C6.80452 15.5819 6.45391 15.3728 6.12301 15.135C5.16603 14.4478 4.31759 13.621 3.60601 12.682C1.92801 10.487 0.545005 7.169 1.14101 2.692C1.17869 2.40474 1.29665 2.13394 1.48132 1.9107C1.666 1.68747 1.9099 1.52085 2.18501 1.43C3.1402 1.11681 4.10281 0.826725 5.07201 0.56Z" />
                <path class="fill-secondary"
                  d="M8 5.38462C8.21217 5.38462 8.41566 5.46566 8.56569 5.60992C8.71571 5.75418 8.8 5.94983 8.8 6.15385V6.53846H7.2V6.15385C7.2 5.94983 7.28429 5.75418 7.43431 5.60992C7.58434 5.46566 7.78783 5.38462 8 5.38462ZM9.2 6.53846V6.15385C9.2 5.84783 9.07357 5.55434 8.84853 5.33795C8.62348 5.12157 8.31826 5 8 5C7.68174 5 7.37652 5.12157 7.15147 5.33795C6.92643 5.55434 6.8 5.84783 6.8 6.15385V6.53846C6.58783 6.53846 6.38434 6.61951 6.23431 6.76376C6.08429 6.90802 6 7.10368 6 7.30769V9.23077C6 9.43478 6.08429 9.63044 6.23431 9.7747C6.38434 9.91896 6.58783 10 6.8 10H9.2C9.41217 10 9.61566 9.91896 9.76569 9.7747C9.91571 9.63044 10 9.43478 10 9.23077V7.30769C10 7.10368 9.91571 6.90802 9.76569 6.76376C9.61566 6.61951 9.41217 6.53846 9.2 6.53846Z" />
              </svg>
              <span class="ms-2">Authentication</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu-Authentication">
              <li><a class="ms-link" href="auth-404.html">404</a></li>
              <li><a class="ms-link" href="auth-403.html">403</a></li>
              <li><a class="ms-link" href="auth-500.html">500</a></li>
              <li><a class="ms-link" href="auth-signin.html">Sign in</a></li>
              <li><a class="ms-link" href="auth-signup.html">Sign up</a></li>
              <li><a class="ms-link" href="auth-password-reset.html">Password reset</a></li>
              <li><a class="ms-link" href="auth-two-step.html">2-Step Authentication</a></li>
              <li><a class="ms-link" href="auth-lockscreen.html">Lockscreen</a></li>
              <li><a class="ms-link" href="auth-maintenance.html">Maintenance</a></li>
            </ul>
          </li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-level0" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M6 3.5C6 3.10218 6.15804 2.72064 6.43934 2.43934C6.72064 2.15804 7.10218 2 7.5 2H8.5C8.89782 2 9.27936 2.15804 9.56066 2.43934C9.84196 2.72064 10 3.10218 10 3.5V4.5C10 4.89782 9.84196 5.27936 9.56066 5.56066C9.27936 5.84196 8.89782 6 8.5 6V7H14C14.1326 7 14.2598 7.05268 14.3536 7.14645C14.4473 7.24021 14.5 7.36739 14.5 7.5V8.5C14.5 8.63261 14.4473 8.75979 14.3536 8.85355C14.2598 8.94732 14.1326 9 14 9C13.8674 9 13.7402 8.94732 13.6464 8.85355C13.5527 8.75979 13.5 8.63261 13.5 8.5V8H8.5V8.5C8.5 8.63261 8.44732 8.75979 8.35355 8.85355C8.25979 8.94732 8.13261 9 8 9C7.86739 9 7.74021 8.94732 7.64645 8.85355C7.55268 8.75979 7.5 8.63261 7.5 8.5V8H2.5V8.5C2.5 8.63261 2.44732 8.75979 2.35355 8.85355C2.25979 8.94732 2.13261 9 2 9C1.86739 9 1.74021 8.94732 1.64645 8.85355C1.55268 8.75979 1.5 8.63261 1.5 8.5V7.5C1.5 7.36739 1.55268 7.24021 1.64645 7.14645C1.74021 7.05268 1.86739 7 2 7H7.5V6C7.10218 6 6.72064 5.84196 6.43934 5.56066C6.15804 5.27936 6 4.89782 6 4.5V3.5Z" />
                <path class="fill-secondary"
                  d="M0.43934 10.4393C0.158035 10.7206 0 11.1022 0 11.5V12.5C0 12.8978 0.158035 13.2794 0.43934 13.5607C0.720644 13.842 1.10218 14 1.5 14H2.5C2.89782 14 3.27936 13.842 3.56066 13.5607C3.84196 13.2794 4 12.8978 4 12.5V11.5C4 11.1022 3.84196 10.7206 3.56066 10.4393C3.27936 10.158 2.89782 10 2.5 10H1.5C1.10218 10 0.720644 10.158 0.43934 10.4393Z" />
                <path class="fill-secondary"
                  d="M6.43934 10.4393C6.15804 10.7206 6 11.1022 6 11.5V12.5C6 12.8978 6.15804 13.2794 6.43934 13.5607C6.72064 13.842 7.10218 14 7.5 14H8.5C8.89782 14 9.27936 13.842 9.56066 13.5607C9.84196 13.2794 10 12.8978 10 12.5V11.5C10 11.1022 9.84196 10.7206 9.56066 10.4393C9.27936 10.158 8.89782 10 8.5 10H7.5C7.10218 10 6.72064 10.158 6.43934 10.4393Z" />
                <path class="fill-secondary"
                  d="M12.4393 10.4393C12.158 10.7206 12 11.1022 12 11.5V12.5C12 12.8978 12.158 13.2794 12.4393 13.5607C12.7206 13.842 13.1022 14 13.5 14H14.5C14.8978 14 15.2794 13.842 15.5607 13.5607C15.842 13.2794 16 12.8978 16 12.5V11.5C16 11.1022 15.842 10.7206 15.5607 10.4393C15.2794 10.158 14.8978 10 14.5 10H13.5C13.1022 10 12.7206 10.158 12.4393 10.4393Z" />
              </svg>
              <span class="ms-2">Menu Level 0</span>
              <span class="arrow fa fa-angle-right ms-auto text-end"></span>
            </a>

            <ul class="sub-menu collapse" id="menu-level0">
              <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-level1" href="#"><span>Menu Level
                    1</span> <span class="arrow fa fa-angle-right ms-auto text-end"></span></a>

                <ul class="sub-menu collapse" id="menu-level1">
                  <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-level2" href="#"><span>Menu Level
                        2</span> <span class="arrow fa fa-angle-right ms-auto text-end"></span></a>

                    <ul class="sub-menu collapse" id="menu-level2">
                      <li><a class="ms-link" href="#">Menu Level 3</a></li>
                    </ul>
                  </li>
                  <li><a class="ms-link" href="#">Menu Level 2</a></li>
                </ul>
              </li>
              <li><a class="ms-link" href="#">Menu Level 1</a></li>
            </ul>
          </li>
        </ul>
        <ul class="menu-list">
          <li class="divider py-2 lh-sm"><span class="small">RESOURCES</span><br> <small class="text-muted">you need to
              know about LUNO</small></li>
          <li>
            <a class="m-link" href="layouts.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path
                  d="M14 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                <path class="fill-secondary"
                  d="M3 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
              </svg>
              <span class="ms-2">Layouts</span>
            </a>
          </li>
          <li>
            <a class="m-link" href="modals.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary"
                  d="M2 3C2 3.13261 2.05268 3.25979 2.14645 3.35355C2.24021 3.44732 2.36739 3.5 2.5 3.5H13.5C13.6326 3.5 13.7598 3.44732 13.8536 3.35355C13.9473 3.25979 14 3.13261 14 3C14 2.86739 13.9473 2.74021 13.8536 2.64645C13.7598 2.55268 13.6326 2.5 13.5 2.5H2.5C2.36739 2.5 2.24021 2.55268 2.14645 2.64645C2.05268 2.74021 2 2.86739 2 3ZM4 1C4 1.13261 4.05268 1.25979 4.14645 1.35355C4.24021 1.44732 4.36739 1.5 4.5 1.5H11.5C11.6326 1.5 11.7598 1.44732 11.8536 1.35355C11.9473 1.25979 12 1.13261 12 1C12 0.867392 11.9473 0.740215 11.8536 0.646447C11.7598 0.552678 11.6326 0.5 11.5 0.5H4.5C4.36739 0.5 4.24021 0.552678 4.14645 0.646447C4.05268 0.740215 4 0.867392 4 1Z" />
                <path
                  d="M13.991 7L14.015 7.001C14.2018 7.01372 14.3845 7.06227 14.553 7.144C14.6744 7.20048 14.7786 7.28812 14.855 7.398C14.922 7.498 15 7.675 15 8V13.991L14.999 14.015C14.9862 14.2018 14.9376 14.3845 14.856 14.553C14.7995 14.6743 14.7118 14.7785 14.602 14.855C14.502 14.922 14.325 15 14 15H2.009L1.985 14.999C1.79817 14.9862 1.61554 14.9376 1.447 14.856C1.32567 14.7995 1.22148 14.7118 1.145 14.602C1.078 14.502 1 14.325 1 14V8.009L1.001 7.985C1.01372 7.79815 1.06227 7.6155 1.144 7.447C1.20052 7.32567 1.28816 7.22148 1.398 7.145C1.498 7.078 1.675 7 2 7H13.991ZM14 6H2C0 6 0 8 0 8V14C0 16 2 16 2 16H14C16 16 16 14 16 14V8C16 6 14 6 14 6Z" />
              </svg>
              <span class="ms-2">Modals Popups</span>
            </a>
          </li>
          <li>
            <a class="m-link" href="docs/w-cards.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path
                  d="M4 1.5H3C2.46957 1.5 1.96086 1.71071 1.58579 2.08579C1.21071 2.46086 1 2.96957 1 3.5V14C1 14.5304 1.21071 15.0391 1.58579 15.4142C1.96086 15.7893 2.46957 16 3 16H13C13.5304 16 14.0391 15.7893 14.4142 15.4142C14.7893 15.0391 15 14.5304 15 14V3.5C15 2.96957 14.7893 2.46086 14.4142 2.08579C14.0391 1.71071 13.5304 1.5 13 1.5H12V2.5H13C13.2652 2.5 13.5196 2.60536 13.7071 2.79289C13.8946 2.98043 14 3.23478 14 3.5V14C14 14.2652 13.8946 14.5196 13.7071 14.7071C13.5196 14.8946 13.2652 15 13 15H3C2.73478 15 2.48043 14.8946 2.29289 14.7071C2.10536 14.5196 2 14.2652 2 14V3.5C2 3.23478 2.10536 2.98043 2.29289 2.79289C2.48043 2.60536 2.73478 2.5 3 2.5H4V1.5Z" />
                <path
                  d="M9.5 1C9.63261 1 9.75979 1.05268 9.85355 1.14645C9.94732 1.24021 10 1.36739 10 1.5V2.5C10 2.63261 9.94732 2.75979 9.85355 2.85355C9.75979 2.94732 9.63261 3 9.5 3H6.5C6.36739 3 6.24021 2.94732 6.14645 2.85355C6.05268 2.75979 6 2.63261 6 2.5V1.5C6 1.36739 6.05268 1.24021 6.14645 1.14645C6.24021 1.05268 6.36739 1 6.5 1H9.5ZM6.5 0C6.10218 0 5.72064 0.158035 5.43934 0.43934C5.15804 0.720644 5 1.10218 5 1.5V2.5C5 2.89782 5.15804 3.27936 5.43934 3.56066C5.72064 3.84196 6.10218 4 6.5 4H9.5C9.89782 4 10.2794 3.84196 10.5607 3.56066C10.842 3.27936 11 2.89782 11 2.5V1.5C11 1.10218 10.842 0.720644 10.5607 0.43934C10.2794 0.158035 9.89782 0 9.5 0L6.5 0Z" />
                <path class="fill-secondary"
                  d="M5.556 7.8225C5.54589 7.71838 5.55767 7.6133 5.59058 7.51401C5.6235 7.41472 5.67682 7.32341 5.74712 7.24595C5.81742 7.16849 5.90315 7.10659 5.9988 7.06424C6.09444 7.02188 6.19789 7 6.3025 7H7.5C7.5663 7 7.62989 7.02634 7.67678 7.07322C7.72366 7.12011 7.75 7.1837 7.75 7.25V7.441C7.75 7.789 7.5015 8.032 7.314 8.1755C7.29143 8.19154 7.27195 8.21153 7.2565 8.2345C7.25399 8.2384 7.25198 8.2426 7.2505 8.247L7.25 8.25V8.2515L7.2515 8.2565C7.2535 8.2615 7.2585 8.2705 7.2695 8.283C7.30776 8.32381 7.35362 8.35676 7.4045 8.38C7.545 8.45 7.755 8.5 8 8.5C8.246 8.5 8.456 8.45 8.595 8.38C8.64606 8.35681 8.69209 8.32386 8.7305 8.283C8.73784 8.27497 8.74391 8.26587 8.7485 8.256L8.75 8.251V8.247C8.74853 8.2426 8.74651 8.2384 8.744 8.2345C8.72855 8.21153 8.70907 8.19154 8.6865 8.1755C8.499 8.032 8.2505 7.789 8.2505 7.441V7.25C8.2505 7.18378 8.27677 7.12027 8.32355 7.0734C8.37032 7.02653 8.43378 7.00013 8.5 7H9.6975C9.80211 7 9.90556 7.02188 10.0012 7.06424C10.0968 7.10659 10.1826 7.16849 10.2529 7.24595C10.3232 7.32341 10.3765 7.41472 10.4094 7.51401C10.4423 7.6133 10.4541 7.71838 10.444 7.8225L10.3225 9.25H10.441C10.5385 9.25 10.651 9.1765 10.7785 9.01C10.8835 8.873 11.0425 8.75 11.25 8.75C11.534 8.75 11.7235 8.9735 11.827 9.181C11.9385 9.4035 12 9.6935 12 10C12 10.3065 11.9385 10.5965 11.827 10.819C11.7235 11.0265 11.534 11.25 11.25 11.25C11.0425 11.25 10.8835 11.127 10.7785 10.99C10.651 10.8235 10.5385 10.75 10.441 10.75H10.3225L10.444 12.1775C10.4541 12.2816 10.4423 12.3867 10.4094 12.486C10.3765 12.5853 10.3232 12.6766 10.2529 12.7541C10.1826 12.8315 10.0968 12.8934 10.0012 12.9358C9.90556 12.9781 9.80211 13 9.6975 13H8.5C8.4337 13 8.37011 12.9737 8.32322 12.9268C8.27634 12.8799 8.25 12.8163 8.25 12.75V12.559C8.25 12.211 8.4985 11.968 8.686 11.8245C8.70857 11.8085 8.72805 11.7885 8.7435 11.7655C8.74601 11.7616 8.74802 11.7574 8.7495 11.753L8.75 11.75V11.7485L8.7485 11.7435C8.74386 11.7338 8.7378 11.7249 8.7305 11.717C8.69225 11.6762 8.64639 11.6432 8.5955 11.62C8.455 11.55 8.245 11.5 8 11.5C7.7545 11.5 7.544 11.55 7.405 11.62C7.35393 11.6432 7.3079 11.6761 7.2695 11.717C7.26216 11.725 7.25609 11.7341 7.2515 11.744L7.25 11.749V11.75L7.2505 11.753C7.25198 11.7574 7.25399 11.7616 7.2565 11.7655C7.2645 11.779 7.2815 11.7995 7.314 11.8245C7.5015 11.968 7.75 12.211 7.75 12.559V12.75C7.75 12.8163 7.72366 12.8799 7.67678 12.9268C7.62989 12.9737 7.5663 13 7.5 13H6.3025C6.19789 13 6.09444 12.9781 5.9988 12.9358C5.90315 12.8934 5.81742 12.8315 5.74712 12.7541C5.67682 12.6766 5.6235 12.5853 5.59058 12.486C5.55767 12.3867 5.54589 12.2816 5.556 12.1775L5.678 10.75H5.559C5.4615 10.75 5.349 10.8235 5.2215 10.99C5.1165 11.127 4.9575 11.25 4.75 11.25C4.466 11.25 4.2765 11.0265 4.173 10.819C4.0615 10.5965 4 10.3065 4 10C4 9.6935 4.0615 9.4035 4.173 9.181C4.2765 8.9735 4.466 8.75 4.75 8.75C4.9575 8.75 5.1165 8.873 5.2215 9.01C5.349 9.1765 5.4615 9.25 5.559 9.25H5.678L5.556 7.8225Z" />
              </svg>
              <span class="ms-2">Widget's</span>
            </a>
          </li>
          <li>
            <a class="m-link" href="./docs/index.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary"
                  d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                <path
                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                <path
                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
              </svg>
              <span class="ms-2">Documentation</span>
            </a>
          </li>
          <li>
            <a class="m-link" href="./docs/doc-changelog.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                <path class="fill-secondary"
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
              </svg>
              <span class="ms-2">Changelog</span>
              <span id="Changelog"></span>
            </a>
          </li>
        </ul> --}}
      </div>


      <ul class="menu-list nav navbar-nav flex-row text-center menu-footer-link">
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#ScheduleModal"
            title="My Schedule">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path class="fill-secondary"
                d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path
                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z" />
              <path class="fill-secondary"
                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#MynotesModal"
            title="My notes">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path class="fill-secondary"
                d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
              <path
                d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="#" data-bs-toggle="modal" data-bs-target="#RecentChat">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
              <path class="fill-secondary"
                d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
            </svg>
          </a>
        </li>
        <li class="nav-item flex-fill p-2">
          <a class="d-inline-block w-100 color-400" href="./auth-signin.html" title="sign-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
              <path d="M7.5 1v7h1V1h-1z" />
              <path class="fill-secondary"
                d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
